<template>
    <div class="chat-wrapper d-lg-flex gap-1 mx-n4 mt-n4 p-1">
        <div class="chat-leftsidebar">
            <div class="px-4 pt-3 mb-2">
                <div class="d-flex align-items-start">
                    <div class="flex-grow-1">
                        <h5 class="mb-2">Chats </h5>
                    </div>
                    <div class="flex-shrink-0">
                        <!-- <div v-b-tooltip.hover title="Add Contact">
                           <span class="text-muted fs-12">({{online.length}} online)</span>
                        </div> -->
                    </div>
                </div>
                <div class="search-box">
                    <input type="text" class="form-control bg-light border-light" placeholder="Search here..." />
                    <i class="ri-search-2-line search-icon"></i>
                </div>
            </div>

            <ul class="nav nav-tabs nav-tabs-custom nav-success nav-justified" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active fs-12" data-bs-toggle="tab" href="#chats" role="tab">
                        Chats
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fs-12" data-bs-toggle="tab" href="#contacts" role="tab">
                        Contacts
                    </a>
                </li>
            </ul>

            <div class="tab-content text-muted">
                <div class="tab-pane active" id="chats" role="tabpanel">
                    <div class="d-flex align-items-center px-4 mt-0 pt-3 mb-2">
                        <div class="flex-grow-1">
                            <h4 class="mb-0 fs-11 text-muted text-uppercase">
                                Nationwide
                            </h4>
                        </div>
                    </div>
                    <div class="chat-message-list">
                        <ul class="list-unstyled chat-list chat-user-list">
                            <li class="">
                                <BLink href="javascript: void(0);">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0 chat-user-img online align-self-center me-2 ms-0">
                                        <div class="avatar-xxs">
                                            <div class="avatar-title rounded-circle bg-primary userprofile">#</div>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 overflow-hidden">
                                        <p class="text-truncate mb-1">Referral System</p>
                                    </div>

                                    <div class="flex-shrink-0">
                                    <!-- <BBadge variant="dark-subtle" class="bg-dark-subtle text-body rounded p-1">2</BBadge> -->
                                    </div>
                                </div>
                                </BLink>
                            </li>
                            <li class="mb-3">
                                <BLink href="javascript: void(0);">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0 chat-user-img online align-self-center me-2 ms-0">
                                        <div class="avatar-xxs">
                                            <div class="avatar-title rounded-circle bg-warning userprofile">#</div>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 overflow-hidden">
                                        <p class="text-truncate mb-1">Helpdesk Support</p>
                                    </div>

                                    <div class="flex-shrink-0">
                                    <!-- <BBadge variant="dark-subtle" class="bg-dark-subtle text-body rounded p-1">2</BBadge> -->
                                    </div>
                                </div>
                                </BLink>
                            </li>
                        </ul>
                    </div>
                    <div class="d-flex align-items-center px-4 mb-2">
                        <div class="flex-grow-1">
                            <h4 class="mb-0 fs-11 text-muted text-uppercase">
                                Laboratories
                            </h4>
                        </div>
                        <div class="flex-shrink-0">
                            <h4 class="mb-0 fs-11 text-muted text-uppercase">({{dropdowns.laboratories.length}})</h4>
                        </div>
                    </div>
                    <simplebar class="chat-room-list" style="max-height: 120px;" data-simplebar>
                        <div class="chat-message-list">
                            <SimpleBar class="list-unstyled chat-list chat-user-list">
                                <li class v-for="(list,index) in dropdowns.laboratories" v-bind:key="index" @click="chatLaboratory(list,'laboratory')" :class="{ active: active == list.id+'laboratory' }">
                                    <BLink href="javascript: void(0);">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-shrink-0 chat-user-img online align-self-center me-2 ms-0">
                                            <div class="avatar-xxs">
                                                <div class="avatar-title rounded-circle bg-info userprofile">
                                                {{ list.name.charAt(0) }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 overflow-hidden">
                                            <p class="text-truncate mb-1">{{ list.name }}</p>
                                        </div>

                                        <div class="flex-shrink-0">
                                        <!-- <BBadge variant="dark-subtle" class="bg-dark-subtle text-body rounded p-1">2</BBadge> -->
                                        </div>
                                    </div>
                                    </BLink>
                                </li>
                            </SimpleBar>
                        </div>
                    </simplebar>
                    <div class="d-flex align-items-center px-4 mb-2 mt-3">
                        <div class="flex-grow-1">
                            <h4 class="mb-0 fs-11 text-muted text-uppercase">
                                Conversations
                            </h4>
                        </div>
                        <div class="flex-shrink-0">
                            <h4 class="mb-0 fs-11 text-muted text-uppercase">({{dropdowns.conversations.data.length}})</h4>
                        </div>
                    </div>
                    <simplebar class="chat-room-list mb-3" style="max-height: calc(100vh - 590px);" data-simplebar>
                        <div class="chat-message-list">
                            <SimpleBar class="list-unstyled chat-list chat-user-list">
                                <li class v-for="(list,index) in conversations" v-bind:key="index" @click="chatPersonnel(list,index)" :class="{ active: active == list.user_id+'personnel'}">
                                    <BLink href="javascript: void(0);">
                                    <div class="d-flex align-items-center">
                                        <!-- <div class="flex-shrink-0 chat-user-img online align-self-center me-2 ms-0">
                                            <div class="avatar-xxs">
                                                <div class="avatar-title rounded-circle bg-danger userprofile">{{ list.name.charAt(0) }}</div>
                                            </div>
                                        </div> -->
                                        <div class="flex-shrink-0 chat-user-img user-own-img align-self-center me-3 ms-0" :class="(isUserOnline(list.user_id) ? 'online' : '')">
                                            <img v-if="list.avatar" :src="'/storage/'+list.avatar" @error="setAlternateImage" class="rounded-circle avatar-xs" alt=""/>
                                            <div v-else class="avatar-xs">
                                                <div class="avatar-title rounded-circle bg-primary userprofile">
                                                {{ list.name.charAt(0) }}
                                                </div>
                                            </div>
                                            <span class="user-status"></span>
                                        </div>
                                        <!-- <div class="flex-grow-1 overflow-hidden">
                                            <p class="text-truncate mt-1" :class="(list.count > 0) ? 'fw-bold' : ''"> {{ list.name }} </p>
                                            <span class="mt-0 text-muted">testing</span>
                                        </div> -->
                                        <div class="flex-grow-1 ms-n2 overflow-hidden">
                                            <h5 class="list-title fs-base fw-semibold fs-12 mb-0">{{list.name}}</h5>
                                            <p class="text-truncate mb-0 width-100 fs-11" :class="(list.is_read) ? 'text-muted' : ''">{{list.message}}</p>
                                        </div>
                                        <div class="flex-shrink-0">
                                        <BBadge v-if="list.count > 0" variant="dark-subtle" class="bg-dark-subtle text-body rounded p-1">{{list.count}}</BBadge>
                                        </div>
                                    </div>
                                    </BLink>
                                </li>
                            </SimpleBar>
                        </div>
                    </simplebar>
                </div>

                <div class="tab-pane" id="contacts" role="tabpanel">
                    <div class="d-flex align-items-center px-4 mt-2 pt-3 mb-2">
                        <div class="flex-grow-1">
                            <h4 class="mb-0 fs-11 text-muted text-uppercase">Personnels</h4>
                        </div>
                        <div class="flex-shrink-0">
                            <h4 class="mb-0 fs-11 text-muted">({{online.length}} online)</h4>
                        </div>
                    </div>
                    <simplebar class="chat-room-list mb-3" style="max-height: calc(100vh - 340px);" data-simplebar>
                        <div class="chat-message-list">
                            <SimpleBar class="list-unstyled chat-list chat-user-list">
                                <li class v-for="(list,index) in sortedUsers" v-bind:key="index" @click="chatPersonnel(list,index)" :class="{ active: active == list.id+'personnel'}">
                                    <BLink href="javascript: void(0);">
                                    <div class="d-flex align-items-center">
                                        <!-- <div class="flex-shrink-0 chat-user-img online align-self-center me-2 ms-0">
                                            <div class="avatar-xxs">
                                                <div class="avatar-title rounded-circle bg-danger userprofile">{{ list.name.charAt(0) }}</div>
                                            </div>
                                        </div> -->
                                        <div class="flex-shrink-0 chat-user-img user-own-img align-self-center me-3 ms-0" :class="(isUserOnline(list.user_id) ? 'online' : '')">
                                            <img v-if="list.avatar" :src="'/storage/'+list.avatar" @error="setAlternateImage" class="rounded-circle avatar-xxs" alt=""/>
                                            <div v-else class="avatar-xxs">
                                                <div class="avatar-title rounded-circle bg-primary userprofile">
                                                {{ list.name.charAt(0) }}
                                                </div>
                                            </div>
                                            <span class="user-status"></span>
                                        </div>
                                        <div class="flex-grow-1 overflow-hidden">
                                            <p class="text-truncate mb-1 mt-1" :class="(list.count > 0) ? 'fw-bold' : ''"> {{ list.name }} </p>
                                        </div>
                                        <div class="flex-shrink-0">
                                        <BBadge v-if="list.count > 0" variant="dark-subtle" class="bg-dark-subtle text-body rounded p-1">{{list.count}}</BBadge>
                                        </div>
                                    </div>
                                    </BLink>
                                </li>
                            </SimpleBar>
                        </div>
                    </simplebar>
                </div>
            </div>  
        </div>

        <div class="user-chat w-100 overflow-hidden">
            <div class="chat-content d-lg-flex">
                <div class="w-100 overflow-hidden position-relative">

                    <div class="p-3 user-chat-topbar" v-if="selected">
                        <BRow class="align-items-center">
                            <BCol sm="4" cols="8">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0 chat-user-img online user-own-img align-self-center me-3 ms-0">
                                        <img v-if="selected.avatar" :src="'/storage/'+selected.avatar" @error="setAlternateImage" class="rounded-circle avatar-xs" alt=""/>
                                        <div v-else class="avatar-xs">
                                            <div class="avatar-title rounded-circle bg-primary userprofile">
                                            {{ selected.name.charAt(0) }} 
                                            </div>
                                        </div>
                                        <span class="user-status"></span>
                                    </div>
                                    <div class="flex-grow-1 overflow-hidden">
                                        <h5 class="text-truncate mb-0 fs-16">
                                            <BLink class="text-reset username">{{selected.name }}</BLink>
                                        </h5>
                                        <p class="text-truncate text-muted fs-14 mb-0 userStatus">
                                        <small>Online</small>
                                        </p>
                                    </div>
                                </div>
                            </BCol>
                            <BCol sm="8" cols="4">

                            </BCol>
                        </BRow>
                    </div>

                    <div class="position-relative" id="users-chat">
                        <simplebar class="chat-conversation p-3 p-lg-4" id="chat-conversation" data-simplebar ref="current">
                            <ul class="list-unstyled chat-conversation-list">
                                <li v-for="(list,index) in messages" v-bind:key="index" :class="(list.sender_id == $page.props.user.data.id) ? 'right' : 'left'" class="chat-list">
                                    <div class="conversation-list">
                                        <div class="chat-avatar" v-if="list.sender_id !== $page.props.user.data.id">
                                            <img :src="'/storage/'+list.avatar" @error="setAlternateImage" alt="" />
                                        </div>
                                        <div class="user-chat-content">
                                            <div class="ctext-wrap">
                                                <div class="ctext-wrap-content">
                                                    <p class="mb-0 ctext-content">
                                                        <span class="fw-semibold text-primary" v-if="list.sender_id !== $page.props.user.data.id">{{list.name}}</span> <br v-if="list.sender_id !== $page.props.user.data.id"/> <span class="">{{ list.message }}</span>
                                                    </p>
                                                </div>
                                                <BDropdown variant="link" class="dropdown align-self-start message-box-drop" toggle-class=" arrow-none" menu-class="dropdown-menu" aria-haspopup="true">
                                                    <template #button-content> <i class="ri-more-2-fill"></i></template>
                                                    <BDropdownItem> <i class="ri-reply-line me-2 text-muted align-bottom"></i> Reply</BDropdownItem>
                                                    <BDropdownItem><i class="ri-bookmark-line me-2 text-muted align-bottom"></i>Bookmark</BDropdownItem>
                                                    <BDropdownItem><i class="ri-delete-bin-5-line me-2 text-muted align-bottom"></i>Delete</BDropdownItem>
                                                </BDropdown>
                                            </div>
                                            <div class="conversation-name">
                                                <small class="fs-10 text-muted time">{{list.time}}</small>
                                                <span class="text-success check-message-icon"><i class="ri-check-double-line align-bottom"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </simplebar>
                    </div>


                    <div class="chat-input-section p-3 p-lg-4">
                        <form @submit.prevent="formSubmit">
                            <BRow class="g-0 align-items-center">
                                <BCol cols="auto">
                                    <div class="chat-input-links me-2">
                                        <div class="links-list-item">
                                        <BButton type="button" variant="link" class="text-decoration-none emoji-btn" id="emoji-btn">
                                            <i class="bx bx-smile align-middle"></i>
                                        </BButton>
                                        </div>
                                    </div>
                                </BCol>
                                <BCol>
                                    <div class="chat-input-feedback">
                                        Please Enter a Message
                                    </div>

                                    <input type="text" v-model="form.message"
                                        @keyup.enter="submit"
                                         class="form-control chat-input bg-light border-light"
                                        placeholder="Enter Message..." :class="{
                                        'is-invalid': submitted && v$.form.message.$error,
                                        }" />
                                    <div v-if="submitted && v$.form.message.$error" class="invalid-feedback">
                                        <span v-if="v$.form.message.required.$message">{{
                                        v$.form.message.required.$message
                                        }}</span>
                                    </div>
                                </BCol>
                                <BCol cols="auto">
                                    <div class="chat-input-links ms-2">
                                        <div class="links-list-item">
                                            <BButton @click="submit" variant="success" type="button" class="chat-send">
                                                <i class="ri-send-plane-2-fill align-bottom"></i>
                                            </BButton>
                                        </div>
                                    </div>
                                </BCol>
                            </BRow>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <Confirm @response="updateId()" ref="confirm"/>
</template>
<script>
import Confirm from './Modals/Confirm.vue'
import simplebar from 'simplebar-vue';
export default {
    components: { simplebar, Confirm },
    props: ['dropdowns'],
    data(){
        return {
            form: {
                message: null,
                type: null,
                id: null
            },
            channel: null,
            messages: [],
            online: [],
            active: null,
            selected: null,
            type: null,
            index: null,
            conversations: []
        }
    },
    created(){
        this.onlineChannel();
        this.myChannel();
        if(this.$page.props.user.data.assigned_type != 'n/a'){
            const d = this.dropdowns.laboratories.find(obj => obj.name == this.$page.props.user.data.assigned_type);
            this.chatLaboratory(d,'laboratory');
        }
        this.sortConversation();
    },
    beforeDestroy() {
        window.removeEventListener('beforeunload', this.isUserLeaving);
    },
    computed: {
        sortedUsers() {
            return this.dropdowns.personnels.slice().sort((a, b) => a.name.localeCompare(b.name));
        },
    },
    methods: {
        fetch(page_url){
            page_url = page_url || '/chatbox';
            axios.get(page_url,{
                params : {
                    id: this.selected.id,
                    type: this.type,
                    option: 'lists'
                }
            })
            .then(response => {
                if(response){
                    this.messages = response.data.data; 
                    this.updateRead(this.selected.id);
                    this.scrollToBottom('users-chat');
                }
            })
            .catch(err => console.log(err));
        },
        sortConversation(){
            this.conversations = this.dropdowns.conversations.data.slice().sort((a, b) => {
                return new Date(b.created) - new Date(a.created);
            });
        },
        chatLaboratory(data,type){
            this.messages = [];
            this.active = data.id+type;
            this.type = type;
            this.selected = data;
            this.fetch();
            (this.channel) ? window.Echo.leave(this.channel) : '';
            this.conversationChannel('chat-room-'+data.id);
        },
        chatPersonnel(data,index){
            this.messages = [];
            this.active = data.user_id+'personnel';
            this.type = 'personnel';
            this.selected = data;
            if(data.has_convo){
                this.fetch();
                (this.channel) ? window.Echo.leave(this.channel) : '';
                this.conversationChannel('chat-room-'+data.id);
            }else{
                this.channel = null;
                this.index = index;
                this.$refs.confirm.show(data);
            }
        },
        onlineChannel(){
            window.Echo.join('online')
            .here((users) => {
                this.online = users;
            })
            .joining((user) => {
                if (!this.online.some(onlineUser => onlineUser.id === user.id)) {
                    this.online.push(user);
                }
            })
            .leaving((user) => {
                this.online = this.online.filter(onlineUser => onlineUser.id !== user.id);
            });
        },
        conversationChannel(channel) {
            this.channel = channel;
            window.Echo.private(this.channel)
            .listen('ConversationEvent', (event) => {
                this.messages.push(event.message);
                this.scrollToBottom('users-chat');
            });
        },
        myChannel() {
            window.Echo.private('user-room-'+this.$page.props.user.data.id)
            .listen('UpdateMessageEvent', (event) => {
                const index = this.dropdowns.conversations.data.findIndex(convo => convo.id === event.message.id);
                this.dropdowns.conversations.data[index] = event.message;
                this.sortConversation();
            });
        },
        submit(){
            this.form.type = this.type;
            this.form.id = this.selected.id;
            axios.post('/chatbox', this.form)
            .then((response) => {
                this.form.message = null;   
                var currentChatId = "users-chat";
                this.scrollToBottom(currentChatId);  
            }).catch(error => {
                if (error.response.status === 422) {
                    console.log(error);
                }
            });
        },
        isUserOnline(userId) {
            return this.online.some(user => user.id === userId);
        },
        isUserLeaving(event) {
            window.Echo.leave('online');
        },
        updateId(){
            this.sortedUsers[this.index].id = this.$page.props.flash.data;
            this.sortedUsers[this.index].has_convo = true;
            this.chatPersonnel(this.sortedUsers[this.index],this.index);
        },
        updateRead(id){
            const basicForm = {
                id: this.selected.id,
                is_read: 1,
                option: 'read'
            };
            axios.post('/chatbox', basicForm)
            .then((response) => {
                console.log(response);
            }).catch(error => {
                if (error.response.status === 422) {
                    console.log(error);
                }
            });
        },
        scrollToBottom(id) {
            setTimeout(function () {
                var simpleBar = document.getElementById(id).querySelector(
                "#chat-conversation .simplebar-content-wrapper") ?
                document.getElementById(id).querySelector(
                    "#chat-conversation .simplebar-content-wrapper") : '';
                var offsetHeight = document.getElementsByClassName("chat-conversation-list")[0] ?
                document.getElementById(id).getElementsByClassName("chat-conversation-list")[0]
                    .scrollHeight - window.innerHeight + 600 : 0;
                if (offsetHeight)
                simpleBar.scrollTo({
                    top: offsetHeight,
                    behavior: "smooth"
                });
            }, 300);
        },
        setAlternateImage(event) {
            event.target.src = 'images/avatars/avatar.jpg'
        }
    }
}
</script>