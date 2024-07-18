<template>
    <b-modal v-model="showModal" header-class="p-3 bg-light" :title="(fee) ? 'View Fee' : 'Add Fee'" class="v-modal-custom" modal-class="zoomIn" centered no-close-on-backdrop>
        <form class="customform" v-if="!fee">
            <BRow>
                <BCol lg="12">
                    <InputLabel for="name" value="Description" :message="form.errors.name"/>
                    <TextInput id="name" v-model="form.name" type="text" class="form-control" autofocus placeholder="Please enter name" autocomplete="name" required :class="{ 'is-invalid': form.errors.name }" :light="true"/>
                </BCol>   
                <BCol lg="12">
                    <InputLabel for="short" value="Fee" :message="form.errors.fee"/>
                    <Amount @amount="amount" ref="testing" :readonly="false"/>
                </BCol> 
            </BRow>     
        </form>      
        <form class="" v-else>
            <div class="row g-2 mt-n2">
                <div class="col-md-12">
                    <div class="form-floating">
                        <input type="text" :value="fee.name" class="form-control" readonly>
                        <label>Description</label>
                    </div>
                </div> 
                <div class="col-md-12">
                    <div class="form-floating">
                        <input type="text" :value="fee.fee" class="form-control" readonly>
                        <label>Fee</label>
                    </div>
                </div>
            </div>
        </form>
        <template v-slot:footer>
            <b-button @click="hide()" variant="light" block>Cancel</b-button>
            <b-button v-if="!fee" @click="submit('ok')" variant="primary" :disabled="form.processing" block>Submit</b-button>
        </template>
    </b-modal>
</template>
<script>
import { useForm } from '@inertiajs/vue3';
import Amount from '@/Shared/Components/Forms/Amount.vue';
import InputLabel from '@/Shared/Components/Forms/InputLabel.vue';
import TextInput from '@/Shared/Components/Forms/TextInput.vue';
export default {
    components: { InputLabel, TextInput, Amount },
    data(){
        return {
            currentUrl: window.location.origin,
            form: useForm({
                id: null,
                name: null,
                fee: null,
                is_additional: true,
                option: 'fee'
            }),
            fee: null,
            showModal: false
        }
    },
    methods: { 
        show(id,fee){
            this.form.id = id;
            this.fee = fee;
            this.showModal = true;
        },
        amount(val){
            this.form.fee = val;
        },
        submit(){
            this.form.post('/services/testservices',{
                preserveScroll: true,
                onSuccess: (response) => {
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