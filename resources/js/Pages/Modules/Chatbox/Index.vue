<template>
    <div class="chat-wrapper d-lg-flex gap-1 mx-n4 mt-n4 p-1">
        <div class="chat-leftsidebar">
            <div class="px-4 pt-3 mb-4">
                <div class="d-flex align-items-start">
                    <div class="flex-grow-1">
                        <h5 class="mb-2">Chats</h5>
                    </div>
                    <div class="flex-shrink-0">
                        <!-- <div v-b-tooltip.hover title="Add Contact">
                            <BButton type="button" variant="soft-success" size="sm">
                            <i class="ri-add-line align-bottom"></i>
                            </BButton>
                        </div> -->
                    </div>
                </div>
                <div class="search-box">
                    <input type="text" class="form-control bg-light border-light" placeholder="Search here..." />
                    <i class="ri-search-2-line search-icon"></i>
                </div>
            </div>

            <div class="d-flex align-items-center px-4 mb-2">
                <div class="flex-grow-1">
                    <h4 class="mb-0 fs-11 text-muted text-uppercase">
                        Nationwide
                    </h4>
                </div>
            </div>
            <div class="chat-message-list">
                <ul class="list-unstyled chat-list chat-user-list">
                    <li class="mb-3">
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
            <div class="d-flex align-items-center px-4 mt-2 pt-3 mb-2">
                <div class="flex-grow-1">
                    <h4 class="mb-0 fs-11 text-muted text-uppercase">Personnels</h4>
                </div>
                <div class="flex-shrink-0">
                    <h4 class="mb-0 fs-11 text-muted text-uppercase">({{dropdowns.personnels.length}})</h4>
                </div>
            </div>
            <simplebar class="chat-room-list mb-3" style="max-height: calc(100vh - 595px);" data-simplebar>
                <div class="chat-message-list">
                    <SimpleBar class="list-unstyled chat-list chat-user-list">
                        <li class v-for="(list,index) in dropdowns.personnels" v-bind:key="index" @click="chatPersonnel(list)" :class="{ active: active == list.id+'personnel'}">
                            <BLink href="javascript: void(0);">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0 chat-user-img online align-self-center me-2 ms-0">
                                    <div class="avatar-xxs">
                                        <div class="avatar-title rounded-circle bg-danger userprofile">{{ list.name.charAt(0) }}</div>
                                    </div>
                                </div>
                                <div class="flex-grow-1 overflow-hidden">
                                    <p class="text-truncate mb-1"> {{ list.name }} </p>
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
            <div class="d-flex align-items-center px-4 mb-2">
                <div class="flex-grow-1">
                    <h4 class="mb-0 fs-11 text-muted text-uppercase">
                        Support
                    </h4>
                </div>
            </div>
            <div class="chat-message-list">
                <ul class="list-unstyled chat-list chat-user-list">
                    <li class="mb-3">
                        <BLink href="javascript: void(0);">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0 chat-user-img online align-self-center me-2 ms-0">
                                <div class="avatar-xxs">
                                    <div class="avatar-title rounded-circle bg-warning userprofile">#</div>
                                </div>
                            </div>
                            <div class="flex-grow-1 overflow-hidden">
                                <p class="text-truncate mb-1">Helpdesk</p>
                            </div>

                            <div class="flex-shrink-0">
                            <!-- <BBadge variant="dark-subtle" class="bg-dark-subtle text-body rounded p-1">2</BBadge> -->
                            </div>
                        </div>
                        </BLink>
                    </li>
                </ul>
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
    <Confirm ref="confirm"/>
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
            active: null,
            selected: null,
            type: null
        }
    },
    created(){
        if(this.$page.props.user.data.assigned_type != 'n/a'){
            const d = this.dropdowns.laboratories.find(obj => obj.name == this.$page.props.user.data.assigned_type);
            this.chatLaboratory(d,'laboratory');
        }
    },
    methods: {
        chatLaboratory(data,type){
            this.messages = [];
            this.active = data.id+type;
            this.type = type;
            this.selected = data;
            this.fetch();
            (this.channel) ? window.Echo.leave(this.channel) : '';
            this.setupEchoListener('chat-room-'+data.id);
        },
        chatPersonnel(data){
            this.messages = [];
            this.active = data.user_id+'personnel';
            this.type = 'personnel';
            this.selected = data;
            if(data.has_convo){
                this.fetch();
                (this.channel) ? window.Echo.leave(this.channel) : '';
                this.setupEchoListener('chat-room-'+data.id);
            }else{
                this.channel = null;
                this.$refs.confirm.show(data);
            }
        },
        setupEchoListener(channel) {
            this.channel = channel;
            window.Echo.private(this.channel)
            .listen('ConversationEvent', (event) => {
                console.log(event);
                this.messages.push(event.message);
                this.scrollToBottom('users-chat');
            });
        },
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
                    this.scrollToBottom('users-chat');
                }
            })
            .catch(err => console.log(err));
        },
        submit(){
            this.form.type = this.type;
            this.form.id = this.selected.id;
            axios.post('/chatbox', this.form)
            .then((response) => {
                this.form.message = null;   
                // this.messages.push(response.data);
                var currentChatId = "users-chat";
                this.scrollToBottom(currentChatId);  
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