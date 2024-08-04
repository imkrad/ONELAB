<template>
    <b-modal v-model="showModal" style="--vz-modal-width: 600px;"  header-class="p-3 bg-light" title="Create Deposit" class="v-modal-custom" modal-class="zoomIn" centered no-close-on-backdrop>
        <form class="customform">
            <BRow>
                <BCol lg="12">
                    <div>
                        <h6 class="mb-1">General Information</h6>
                        <p class="text-muted fs-11 mt-n1">A role defines the tasks and responsibilities allowed for a user.</p>
                    </div>
                    <div>
                        <BRow class="g-3">
                            <BCol lg="12"><hr class="text-muted mt-n1 mb-n4"/></BCol>
                            <BCol lg="6 mt-1">
                                <InputLabel for="deposit" value="Deposit Type" :message="form.errors.deposit_id"/>
                                <Multiselect 
                                :options="deposits" 
                                v-model="form.deposit_id" 
                                label="name"
                                @input="handleInput('deposit_id')"
                                placeholder="Select Deposit type"/>
                            </BCol>
                            <BCol lg="6 mt-1">
                                <InputLabel for="orseries" value="O.R Series" :message="form.errors.orseries"/>
                                <Multiselect 
                                :options="orseries" 
                                v-model="form.orseries" 
                                object
                                label="name"
                                @input="handleInput('orseries')"
                                placeholder="Select OR"/>
                            </BCol>
                            <BCol lg="6 mt-1">
                                <InputLabel for="orseries" value="Start O.R" :message="form.errors.orseries"/>
                                <Multiselect 
                                :options="ornumbers" 
                                v-model="form.start" 
                                @input="handleInput('start')"
                                placeholder="Select Start"/>
                            </BCol>
                            <BCol lg="6 mt-1">
                                <InputLabel for="orseries" value="End O.R" :message="form.errors.orseries"/>
                                <Multiselect 
                                :options="ornumbers" 
                                v-model="form.end" 
                                @input="handleInput('end')"
                                placeholder="Select End"/>
                            </BCol>
                            <BCol lg="6" class="mt-1">
                                <InputLabel for="name" value="Total" :message="form.errors.total"/>
                                <Amount @amount="amount" ref="testing" :readonly="false"/>
                            </BCol>
                            <BCol lg="6" class="mt-1">
                                <InputLabel for="name" value="Date" :message="form.errors.date"/>
                                <TextInput id="name" v-model="form.date" type="date" class="form-control" autofocus placeholder="Please enter date" @input="handleInput('date')" :light="true"/>
                            </BCol>
                        </BRow>
                    </div>    
                </BCol>
            </BRow>
        </form>
          <template v-slot:footer>
            <b-button @click="hide()" variant="light" block>Cancel</b-button>
            <b-button @click="submit('ok')" variant="primary" :disabled="form.processing" block>Submit</b-button>
        </template>
    </b-modal>
</template>
<script>
import { useForm } from '@inertiajs/vue3';
import Multiselect from "@vueform/multiselect";
import Amount from '@/Shared/Components/Forms/Amount.vue';
import InputLabel from '@/Shared/Components/Forms/InputLabel.vue';
import TextInput from '@/Shared/Components/Forms/TextInput.vue';
export default {
    components: { InputLabel, TextInput, Multiselect, Amount },
    props:['deposits','orseries'],
    data(){
        return {
            currentUrl: window.location.origin,
            form: useForm({
                id: null,
                deposit_id: null,
                orseries: null,
                start: null,
                end: null,
                total: null,
                date: null,
                option: 'deposits'
            }),
            ornumbers: [],
            showModal: false,
            editable: false
        }
    },
    watch: {
        "form.orseries"(newVal){
            this.fetchNumbers(newVal.value);
        }
    },
    methods: { 
        show(){
            this.form.reset();
            this.editable = false;
            this.showModal = true;
        },
        fetchNumbers(data){
            axios.get('/finance',{
                params : {
                    orseries_id: data,
                    deposit_id: this.form.deposit_id,
                    option: 'ornumbers'
                }
            })
            .then(response => {
                this.ornumbers = response.data;
            })
            .catch(err => console.log(err));
        },
        edit(data){
            this.form.id = data.id
            this.form.name = data.name;
            this.form.type = data.type;
            this.editable = true;
            this.showModal = true;
        },
        submit(){
            if(!this.editable){
                this.form.post('/finance',{
                    preserveScroll: true,
                    onSuccess: (response) => {
                        this.$emit('update',true);
                        this.hide();
                    },
                });
            }else{
                this.form.put('/finance/update',{
                    preserveScroll: true,
                    onSuccess: (response) => {
                        this.hide();
                    },
                });
            }
        },
        amount(val){
            this.form.total = val;
        },
        handleInput(field) {
            this.form.errors[field] = false;
        },
        hide(){
            this.form.reset();
            this.form.clearErrors();
            this.editable = false;
            this.showModal = false;
        }
    }
}
</script>