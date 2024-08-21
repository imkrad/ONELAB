<template>
    <b-row class="g-2 mb-2 mt-n2">
        <b-col lg>
            <div class="input-group mb-1">
                <span class="input-group-text"> <i class="ri-search-line search-icon"></i></span>
                <input type="text" v-model="filter.keyword" placeholder="Search Request" class="form-control" style="width: 60%;">
                <select v-model="filter.laboratory" @change="fetch()" class="form-select" id="inputGroupSelect01" style="width: 100px;">
                    <option :value="null" selected>Select Laboratory</option>
                    <option :value="list" v-for="list in laboratories" v-bind:key="list.id">{{list.name}}</option>
                </select>
                <span @click="refresh()" class="input-group-text" v-b-tooltip.hover title="Refresh" style="cursor: pointer;"> 
                    <i class="bx bx-refresh search-icon"></i>
                </span>
                <b-button type="button" variant="primary" @click="openCreate">
                    <i class="ri-add-circle-fill align-bottom me-1"></i> Create
                </b-button>
            </div>
        </b-col>
    </b-row>
    <div class="table-responsive">
        <simplebar data-simplebar style="height: calc(100vh - 450px)">
        <table class="table table-nowrap align-middle mb-0">
            <thead class="table-light thead-fixed">
                <tr class="fs-11">
                    <th></th>
                    <th style="width: 40%;">{{name}}</th>
                    <th style="width: 10%;" class="text-center">Progress</th>
                    <th style="width: 10%;" class="text-center">Payment</th>
                    <th style="width: 10%;" class="text-center">Report</th>
                    <th style="width: 15%;" class="text-center">Due At</th>
                    <th style="width: 15%;" class="text-center">Status</th>
                    <th style="width: 7%;" ></th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(list,index) in lists" v-bind:key="index">
                    <td class="text-center"> 
                        {{ (meta.current_page - 1) * meta.per_page + index + 1 }}.
                    </td>
                    <td>
                        <h5 v-if="list.code" class="fs-13 mb-0 fw-semibold text-primary">{{list.code}}</h5>
                        <h5 v-else class="fs-13 mb-0 text-muted">Not yet available</h5>
                        <p class="fs-12 text-muted mb-0">{{list.customer.name}}</p>
                    </td>
                    <td>
                        <apexchart v-b-tooltip.hover :title="list.analyses+'%'" class="apex-charts" height="30" dir="ltr" :series="[list.analyses]" :options="{ ...chartOptions2 }"></apexchart>
                    </td>
                    <td class="text-center">
                        <i v-if="list.payment.is_paid" class="ri-checkbox-circle-fill text-success fs-18" v-b-tooltip.hover :title="list.payment.status.name"></i>
                        <i v-else-if="list.payment.is_free" class="ri-checkbox-circle-fill text-info fs-18" v-b-tooltip.hover title="Gratis"></i>
                        <i v-else class="ri-close-circle-fill text-danger fs-18" v-b-tooltip.hover :title="list.payment.status.name"></i>
                    </td>
                    <td class="text-center">
                        <i class="ri-indeterminate-circle-line text-warning fs-18"></i>
                    </td>
                    <td class="text-center fs-12">
                        <span v-if="list.due_at">{{list.due_at}}</span>
                        <span class="text-muted" v-else>Not yet set</span>
                    </td>
                    <td class="text-center">
                        <span :class="'badge '+list.status.color">{{list.status.name}}</span>
                    </td>
                    <td class="text-end">
                        <a :href="`/requests/${list.qr}`" target="_blank">
                            <b-button variant="soft-info" class="me-1" v-b-tooltip.hover title="View" size="sm">
                                <i class="ri-eye-fill align-bottom"></i>
                            </b-button>
                        </a>
                        
                    </td>
                </tr>
            </tbody>
        </table>
        <Pagination class="ms-2 me-2" v-if="meta" @fetch="fetch" :lists="lists.length" :links="links" :pagination="meta" />
        </simplebar>
    </div>
</template>
<script>
import _ from 'lodash';
import simplebar from "simplebar-vue";
import Pagination from "@/Shared/Components/Pagination.vue";
export default {
    components: { Pagination, simplebar },
    props: ['laboratories'],
    data(){
        return {
            currentUrl: window.location.origin,
            lists: [],
            meta: {},
            links: {},
            name: 'Customer',
            filter: {
                keyword: null,
                overdue: null,
                released: null,
                unclaimed: null,
                laboratory: null,
                status: null,
                reminder: null,
            },
            chartOptions2: {
                chart: {type: "radialBar",sparkline: {enabled: true,},},
                dataLabels: { enabled: false,},
                plotOptions: {radialBar: {hollow: {margin: 0,size: "30%",},track: {margin: 1,},dataLabels: {show: false, },}, },
                colors: ["#099885"],
            },
        }
    },
    watch: {
        "filter.keyword"(newVal){
            this.checkSearchStr(newVal)
        },
        "filter.laboratory"(newVal){
            if(newVal){
                this.name = newVal.name;
                this.checkSearchStr()
            }
        }
    },
    created(){
        this.fetch();
    },
    methods: {
        checkSearchStr: _.debounce(function(string) {
            this.fetch();
        }, 300),
        fetch(page_url){
            page_url = page_url || '/requests';
            axios.get(page_url,{
                params : {
                    keyword: this.filter.keyword,
                    count: ((window.innerHeight-500)/58),
                    laboratory: (this.filter.laboratory) ? this.filter.laboratory.value : null,
                    status: this.filter.status,
                    reminder: this.filter.reminder,
                    sort: 'asc',
                    sortby: 'Requested At',
                    option: 'lists'
                }
            })
            .then(response => {
                if(response){
                    this.lists = response.data.data;
                    this.meta = response.data.meta;
                    this.links = response.data.links;          
                }
            })
            .catch(err => console.log(err));
        },
        filterStatus(status){
            this.name = status.name+' Request';
            this.filter.reminder = null;
            this.filter.laboratory = null;  
            this.filter.status = status.id;
            this.fetch();
        },
        filterReminder(reminder){
            this.name = reminder;
            this.filter.status = null;
            this.filter.laboratory = null;
            this.filter.reminder = reminder;
            this.fetch();
        },
        refresh(){
            this.name = 'Customer';
            this.filter.status = null;
            this.filter.reminder = null;
            this.filter.laboratory = null;
            this.fetch();
        }
    }
}
</script>