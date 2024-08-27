<template>
    <b-modal v-if="selected" v-model="showModal" header-class="p-3 bg-light" title="Generate TSR" class="v-modal-custom" modal-class="zoomIn" centered no-close-on-backdrop>
        <form class="customform">
            <BRow class="g-3">
                <BCol lg="12" class="mt-1">
                    <InputLabel for="days" value="Customer"/>
                    <TextInput v-model="form.customer" type="text" class="form-control" :light="true" :readonly="true"/>
                </BCol>
                 <BCol lg="12" class="mt-1">
                    <div class="d-flex">
                        <div style="width: 100%;">
                            <InputLabel for="conforme" value="Conforme" :message="form.errors.conforme"/>
                            <Multiselect 
                            :options="conformes" 
                            v-model="form.conforme" 
                            label="name"
                            object
                            @input="handleInput('conforme')"
                            :searchable="true" 
                            placeholder="Select Conforme"/>
                        </div>
                        <div class="flex-shrink-0">
                            <b-button @click="openAdd()" style="margin-top: 20px;" variant="light" class="waves-effect waves-light ms-1"><i class="ri-add-circle-fill"></i></b-button>
                        </div>
                    </div>
                </BCol>
                <BCol lg="12" class="mt-1">
                    <InputLabel for="days" value="Customer"/>
                    <TextInput v-model="form.laboratory" type="text" class="form-control" :light="true" :readonly="true"/>
                </BCol>
                <BCol lg="12" class="mt-0"><hr class="text-muted"/></BCol>
            </BRow>
        </form> 

        {{selected}}
    
        <template v-slot:footer>
            <b-button @click="hide()" variant="light" block>Cancel</b-button>
            <b-button @click="submit('ok')" variant="primary" block>Submit</b-button>
        </template>
    </b-modal>
    <Add @selected="set" ref="conforme"/>
    <Testservice :laboratories="laboratories" @success="addItems" ref="testservice"/>
</template>
<script>
import _ from 'lodash';
import { useForm } from '@inertiajs/vue3';
import Testservice from './Testservice.vue';
import Add from '../../Modals/Add.vue';
import TextInput from '@/Shared/Components/Forms/TextInput.vue';
import Multiselect from "@vueform/multiselect";
import InputLabel from '@/Shared/Components/Forms/InputLabel.vue';
export default {
    components: { InputLabel, Multiselect, TextInput, Testservice, Add },
    props: ['laboratories'],
    data(){
        return {
            currentUrl: window.location.origin,
            selected: {},
            form: useForm({
                conforme: null,
                customer_id: null,
                customer: null,
                laboratory: null,
                laboratory_type: null,
                status_id: 3,
                lists: [],
                option: 'group'
            }),
            selected: null,
            showModal: false
        }
    },
    computed: {
        conformes() {
            return this.selected.conformes.map(item => {
            return {
                value: item.id,
                name: item.name
            };
            });
        }
    },
    methods: { 
        show(data){
            this.form.customer = data.customer;
            this.form.customer_id = data.customer_id;
            this.form.conforme = data.conforme;
            this.form.laboratory = data.typeName;
            this.form.laboratory_type = data.typeId;
            this.form.lists = data.items;
            this.selected = data;
            this.showModal = true;
        }, 
        submit(){
            this.form.post('/requests',{
                preserveScroll: true,
                onSuccess: (response) => {
                    this.$emit('success',true);
                    this.hide();
                },
            });
        },
        addItems(data){
            this.form.lists.push(...data);
        },
        openTestservice(){
            this.$refs.testservice.show();
        },
        openAdd(){
            this.$refs.conforme.show(this.customer);
        },
        set(data){
            this.customer.conformes.push(data);
            this.form.conforme = data;
        },
        handleInput(field) {
            this.form.errors[field] = false;
        },
        formatMoney(value) {
            let val = (value/1).toFixed(2).replace(',', '.')
            return '₱'+val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")
        },
        hide(){
            this.form.reset();
            this.showModal = false;
        }
    }
}
</script>