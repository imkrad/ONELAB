<template>
    <b-modal v-if="selected" v-model="showModal" hide-footer hide-header title="Cancel Request" class="v-modal-custom" modal-class="zoomIn" centered no-close-on-backdrop>
        <div class="text-center">
            <div class="mt-3">
                <h5 class="mb-3">Start Conversation</h5>
                <p class="text-muted mb-4">Are you sure you want to start conversation with  <span class="text-dark fw-semibold">{{ selected.name }}</span>?</p>
                <div class="hstack gap-2 justify-content-center mb-2">
                    <button @click="hide()" class="btn btn-light" type="button">
                        <div class="btn-content"> Close</div>
                    </button>
                    <a @click="submit()" class="btn btn-primary" href="javascript:void(0);" target="_self">Confirm</a>
                </div>
            </div>
        </div>
    </b-modal>
</template>
<script>
import { useForm } from '@inertiajs/vue3';
export default {
    data(){
        return {
            currentUrl: window.location.origin,
            form: useForm({
               id: null
            }),
            selected: null,
            showModal: false
        }
    },
    methods: { 
        show(data){
            this.selected = data;
            this.form.id = data.user_id;
            this.showModal = true;
        },
        submit(){
            this.form.put('/chatbox/update',{
                preserveScroll: true,
                onSuccess: (response) => {
                    // this.$emit('success',true);
                    this.hide();
                },
            });
        },
        hide(){
            this.showModal = false;
        }
    }
}
</script>