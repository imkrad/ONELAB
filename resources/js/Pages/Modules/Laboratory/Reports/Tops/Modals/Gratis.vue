<template>
    <b-modal v-model="showModal" style="--vz-modal-width: 700px;" header-class="p-3 bg-light" :title="selected+' Gratis Breakdown'" class="v-modal-custom" modal-class="zoomIn" centered no-close-on-backdrop>
        <simplebar data-simplebar style="height: 290px;">
            <table class="table align-middle table-centered table-nowrap mb-3">
                <thead class="text-muted table-light fs-11 thead-fixed">
                    <tr>
                        <th width="5%;"> #</th>
                        <th width="80%;">Code</th>
                        <th width="15%;" class="text-center" scope="col">Customer</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(list,index) in lists" v-bind:key="index">
                        <td>{{index + 1}}</td>
                        <td>{{list.code }}</td>
                        <td class="text-center">{{list.customer.name}}</td>
                    </tr>
                </tbody>
            </table>
        </simplebar>
        <template v-slot:footer>
            <b-button @click="hide()" variant="light" block>Cancel</b-button>
            <b-button @click="submit('ok')" variant="primary" :disabled="form.processing" block>Submit</b-button>
        </template>
    </b-modal>
</template>
<script>
import _ from 'lodash';
import simplebar from "simplebar-vue";
import { useForm } from '@inertiajs/vue3';
export default {
    components: { simplebar },
    data(){
        return {
            currentUrl: window.location.origin,
            form: useForm({
                items: [],
                option: 'target'
            }),
            selected: null,
            month: null,
            year: null,
            lists: [],
            laboratory: null,
            showModal: false,
        }
    },
    methods: { 
        show(data,month,laboratory,year){
            this.selected = data;
            this.month = month;
            this.laboratory = laboratory;
            this.year = year;
            this.fetch(data);
            this.showModal = true;
        },
        fetch(data){
            axios.get('/reports',{
                params : {
                    laboratory: this.laboratory,
                    month: this.month,
                    year: this.year,
                    option: data
                }
            })
            .then(response => {
                this.lists = response.data.data;   
            })
            .catch(err => console.log(err));
        },
        hide(){
            this.showModal = false;
        }
    }
}
</script>
<style>
.thead-fixed {
   position: sticky;
   top: 0;
   background-color: #fff; /* Set the background color for the fixed header */
   z-index: 1; /* Ensure the fixed header is above the scrolling content */
}
</style>
