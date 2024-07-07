<?php

namespace App\Http\Controllers;

use Hashids\Hashids;
use App\Models\User;
use App\Models\ListDropdown;
use App\Models\ChatConversation;
use Illuminate\Http\Request;
use App\Services\Chatbox\ListClass;
use App\Http\Resources\ChatboxResource;
use App\Events\ConversationEvent;

class ChatboxController extends Controller
{
    public function __construct(ListClass $list){
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
                        'personnels' => $this->list->personnels()
                    ],
                ]); 
        }   
    }

    public function lists($request){
        $hashids = new Hashids('krad',10);
        $id = $hashids->decode($request->id);
        $id = $id[0];
        $data = ChatConversation::with('sender.profile')->where('receivable_id',$id)
        ->orderBy('created_at','DESC')
        ->take(10)->get();
        return ChatboxResource::collection($data);
    }

    public function store(Request $request){
        $hashids = new Hashids('krad',10);
        $id = $hashids->decode($request->id);
        $id = $id[0];
        if($request->type === 'laboratory'){
            $data = ListDropdown::find($id);
        }else{
            $data = User::find($id);
        }
        $channel = 'chat-room-'.$request->id;
        $message = $data->messages()->create([
            'message' => $request->message,
            'is_group' => ($request->type === 'laboratory') ? 1 : 0,
            'is_reply' => 0,
            'sender_id' => \Auth::user()->id
        ]);

        // $message = [
        //     'message' => $request->message,
        //     'sender_id' => \Auth::user()->id,
        //     'time' => date('M d, Y g:i a')
        // ];
         broadcast(new ConversationEvent(new ChatboxResource($message), $channel));
        
    }

}
