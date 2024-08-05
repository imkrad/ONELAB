<template>
    <b-modal v-model="showModal" style="--vz-modal-width: 700px;" header-class="p-3 bg-light" title="Set Targets" class="v-modal-custom" modal-class="zoomIn" centered no-close-on-backdrop>
        <form class="customform">
            <BRow class="g-3">
                <BCol lg="12">
                    <InputLabel value="Year" :message="form.errors.year"/>
                    <TextInput v-model="form.year" :value="new Date().getFullYear()" v-maska data-maska="####" type="text" class="form-control" @input="handleInput('year')" :light="true"/>
                </BCol>
                <BCol lg="12" class="mt-n2"><hr class="text-muted"/></BCol>
            </BRow>
            <BRow class="g-1" v-for="(list,index) in form.items" v-bind:key="index">
                <BCol lg="9">
                    <TextInput v-model="list.name" type="text" class="form-control" :readonly="true" @input="handleInput('date')" :light="true"/>
                </BCol>
                <BCol lg="3">
                    <TextInput v-model="list.target" type="text" v-maska data-maska="####" class="form-control" @input="handleInput('date')" :light="true"/>
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
import _ from 'lodash';
import { vMaska } from "maska"
import { useForm } from '@inertiajs/vue3';
import Multiselect from "@vueform/multiselect";
import InputLabel from '@/Shared/Components/Forms/InputLabel.vue';
import TextInput from '@/Shared/Components/Forms/TextInput.vue';
export default {
    directives: { maska: vMaska },
    components: { Multiselect, InputLabel, TextInput },
    data(){
        return {
            currentUrl: window.location.origin,
            form: useForm({
                year: null,
                items: [
                    {name : 'Samples Received', target: 0, is_consolidated : 0},
                    {name : 'Services Conducted', target: 0, is_consolidated : 0},
                    {name : 'Customer Served', target: 0, is_consolidated : 0},
                    {name : 'New Customer Served', target: 0, is_consolidated : 1},
                    {name : 'Firms Served', target: 0, is_consolidated : 1},
                    {name : 'Actual Fees Collected', target: 0, is_consolidated : 0},
                    {name : 'Value of Assistance Rendered', target: 0, is_consolidated : 0},
                    {name : 'New Services Offered', target: 0, is_consolidated : 0},
                    {name : 'Weaned Out Services', target: 0, is_consolidated : 0}
                ],
                option: 'target'
            }),
            showModal: false,
        }
    },
    methods: { 
        show(){
            this.showModal = true;
        },
        submit(){
            this.form.post('/finance',{
                preserveScroll: true,
                onSuccess: (response) => {
                    this.$emit('update',true);
                    this.hide();
                },
            });
        },
        handleInput(field) {
            this.form.errors[field] = false;
        },
        hide(){
            this.showModal = false;
        }
    }
}
</script>
