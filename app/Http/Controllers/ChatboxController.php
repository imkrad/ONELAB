<?php

namespace App\Http\Controllers;

use Hashids\Hashids;
use App\Models\User;
use App\Models\ListDropdown;
use App\Models\ListLaboratory;
use App\Models\ChatConversation;
use App\Models\ChatMessage;
use Illuminate\Http\Request;
use App\Services\Chatbox\ListClass;
use App\Services\Chatbox\ChatboxClass;
use App\Http\Resources\ChatboxResource;
use App\Http\Resources\ConversationResource;
use App\Http\Resources\Conversation2Resource;
use App\Events\ConversationEvent;
use App\Events\UpdateMessageEvent;

class ChatboxController extends Controller
{
    public function __construct(ListClass $list, ChatboxClass $chatbox){
        $this->list = $list;
    }

    public function index(Request $request){
        switch($request->option){
            case 'lists':
                return $this->lists($request);    
            break;
            default:
                return inertia('Modules/Chatbox/Index',[
                    'dropdowns' => [
                        'laboratories' => $this->list->laboratory_types(),
                        'personnels' => $this->list->personnels(),
                        'conversations' => $this->list->conversations()
                    ],
                ]); 
        }   
    }

    public function lists($request){
        $hashids = new Hashids('krad',10);
        $id = $hashids->decode($request->id);
        $id = $id[0];
        $data = ChatMessage::with('sender.profile')->where('receivable_id',$id)
        ->orderBy('created_at','DESC')
        ->take(10)->get()->reverse();
        return ChatboxResource::collection($data);
    }

    public function store(Request $request){
      
        $hashids = new Hashids('krad',10);
        $id = $hashids->decode($request->id);
        $id = $id[0];
        if($request->type === 'laboratory'){
            $data = ListLaboratory::find($id);
        }else{
            $data = ChatConversation::find($id);
        }
        $message = $data->messages()->create([
            'message' => $request->message,
            'is_group' => ($request->type === 'laboratory') ? 1 : 0,
            'is_reply' => 0,
            'sender_id' => \Auth::user()->id
        ]);
        $channel = 'chat-room-'.$request->id;
        broadcast(new ConversationEvent(new ChatboxResource($message), $channel));
        if($request->type != 'laboratory'){
            $user_id = (\Auth::user()->id == $data->first_id) ? $data->second_id : $data->first_id;
            $channel = 'user-room-'.$user_id;
            $convo = ChatConversation::with(['first:id','first.profile:user_id,firstname,lastname,avatar',
                'second:id','second.profile:user_id,firstname,lastname,avatar',
                'messages' => function ($query) {
                    $query->select('receivable_id','message','created_at','is_read')->orderBy('created_at','desc')->limit(1); 
                }
            ])->where('id',$id)->first();
            broadcast(new UpdateMessageEvent(new Conversation2Resource($convo), $channel));
        }
    }

    public function update(Request $request){
        $hashids = new Hashids('krad',10);
        $id = $hashids->decode($request->id);
        $id = $id[0];
        $conversation = ChatConversation::where(function($query) use ($id) {
            $query->where('first_id', \Auth::user()->id)
                  ->where('second_id', $id);
        })->orWhere(function($query) use ($id) {
            $query->where('first_id', $id)
                  ->where('second_id', \Auth::user()->id);
        })
        ->first();
        if($conversation){
            $data = $conversation;
        }else{
            $data = new ChatConversation;
            $data->first_id = \Auth::user()->id;
            $data->second_id = $id;
            $data->save();
        }

        return back()->with([
            'data' => $hashids->encode($data->id),
            'message' => 'You can now have a chat',
            'info' => "You've successfully created a conversation.",
            'status' => true,
        ]);
    }

}
