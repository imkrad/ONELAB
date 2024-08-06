<template>
    <b-modal v-model="showModal" style="--vz-modal-width: 500px;" header-class="p-3 bg-light" title="Set Targets" class="v-modal-custom" modal-class="zoomIn" centered no-close-on-backdrop>
        <div v-if="selected" >
            <form class="customform" v-if="!selected.is_consolidated">
                <BRow class="g-1" v-for="(list,index) in selected.breakdowns" v-bind:key="index">
                    <BCol lg="8">
                        <TextInput v-model="list.type.name" type="text" class="form-control" :readonly="true" @input="handleInput('date')" :light="true"/>
                    </BCol>
                    <BCol lg="4">
                        <input v-if="list.is_amount == 1" type="text" class="form-control" v-money="money" v-model="list.count" style="min-height: 38.4px !important; background-color: #f5f6f7;" :class="{ 'is-invalid': form.errors['items.'+index+'.count'] }">
                        <TextInput v-else v-model="list.count" type="text" v-maska data-maska="###########"  class="form-control" @input="handleInput('date')" :class="{ 'is-invalid': form.errors['items.'+index+'.count'] }" :light="true"/>
                    </BCol>
                </BRow>
            </form>  
            <form class="customform" v-else>
                <BRow class="g-1" v-for="(list,index) in selected.breakdowns" v-bind:key="index">
                    <BCol lg="8">
                        <TextInput v-model="list.name" type="text" class="form-control" :readonly="true" @input="handleInput('date')" :light="true"/>
                    </BCol>
                    <BCol lg="4">
                        <TextInput v-model="list.count" type="text" v-maska data-maska="#######"  class="form-control" :class="{ 'is-invalid': form.errors['items.'+index+'.count'] }" :light="true"/>
                    </BCol>
                </BRow>
            </form>
        </div>
        <template v-slot:footer>
            <b-button @click="hide()" variant="light" block>Cancel</b-button>
            <b-button @click="submit('ok')" variant="primary" :disabled="form.processing" block>Submit</b-button>
        </template>
    </b-modal>
</template>
<script>
import _ from 'lodash';
import {VMoney} from 'v-money';
import { vMaska } from "maska"
import { useForm } from '@inertiajs/vue3';
import Multiselect from "@vueform/multiselect";
import InputLabel from '@/Shared/Components/Forms/InputLabel.vue';
import TextInput from '@/Shared/Components/Forms/TextInput.vue';
export default {
    directives: { maska: vMaska, money: VMoney }, 
    components: { Multiselect, InputLabel, TextInput },
    data(){
        return {
            currentUrl: window.location.origin,
            form: useForm({
                items: [],
                option: 'target'
            }),
            money: {
                decimal: '.',
                thousands: ',',
                prefix: '₱',
                precision: 2,
                masked: false
            },
            selected: null,
            showModal: false,
        }
    },
    methods: { 
        show(data){
            this.form.clearErrors();
            this.selected = data;
            this.showModal = true;
        },
        submit(){
            this.form.items = this.selected.breakdowns;
            this.form.post('/targets',{
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
