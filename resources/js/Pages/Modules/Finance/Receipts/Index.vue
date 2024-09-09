<template>
    <PageHeader title="Receipts" pageTitle="List" />
    <div class="chat-wrapper d-lg-flex gap-1 mx-n4 mt-n4 p-1">
        <div class="file-manager-content w-100 p-4 pb-0" style="height: calc(100vh - 180px); overflow: auto;" ref="box">

            <b-row class="g-2 mb-2 mt-n2">
                <b-col lg>
                    <div class="input-group mb-1">
                        <span class="input-group-text"> <i class="ri-search-line search-icon"></i></span>
                        <input type="text" v-model="filter.keyword" placeholder="Search Collection" class="form-control" style="width: 60%;">
                        <select v-model="filter.status" @change="fetch()" class="form-select" id="inputGroupSelect01" style="width: 140px;">
                            <option :value="null" selected>Select Status</option>
                            <option :value="list.value" v-for="list in statuses" v-bind:key="list.id">{{list.name}}</option>
                        </select>
                        <span @click="refresh()" class="input-group-text" v-b-tooltip.hover title="Refresh" style="cursor: pointer;"> 
                            <i class="bx bx-refresh search-icon"></i>
                        </span>
                        <b-button type="button" variant="primary" @click="openCreate()">
                            <i class="ri-add-circle-fill align-bottom me-1"></i> Create
                        </b-button>
                    </div>
                </b-col>
            </b-row>
            <div class="table-responsive">
                <table class="table table-nowrap align-middle mb-0">
                    <thead class="table-light">
                        <tr class="fs-11">
                            <th></th>
                            <th style="width: 32%;">Customer</th>
                            <th style="width: 13%;" class="text-center">Collection</th>
                            <th style="width: 13%;" class="text-center">Payment</th>
                            <th style="width: 10%;" class="text-center">Total</th>
                            <th style="width: 15%;" class="text-center">User</th>
                            <th style="width: 10%;" class="text-center">Date</th>
                            <!-- <th style="width: 7%;" class="text-center">Status</th> -->
                            <th style="width: 7%;" ></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(list,index) in lists" v-bind:key="index">
                            <td class="text-center"> 
                                {{ (meta.current_page - 1) * meta.per_page + index + 1 }}.
                            </td>
                            <td>
                                <h5 class="fs-13 mb-0 text-dark">OR# : {{list.number}}</h5>
                                <p class="fs-12 text-muted mb-0">{{list.customer}}</p>
                            </td>
                            <td class="text-center fs-12">{{list.collection}}</td>
                            <td class="text-center fs-12">{{list.payment}}</td>
                            <td class="text-center fs-12">{{list.total}}</td>
                            <td class="text-center fs-12">{{list.user}}</td>
                            <td class="text-center fs-12">{{list.date}}</td>
                            <!-- <td class="text-center">
                                <span :class="'badge '+list.status.color+' '+list.status.others">{{list.status.name}}</span>
                            </td> -->
                            <td class="text-end">
                                <b-button @click="openView(list)" variant="soft-info" class="me-1" v-b-tooltip.hover title="View" size="sm">
                                    <i class="ri-eye-fill align-bottom"></i>
                                </b-button>
                                <b-button @click="openPrint(list.id)" variant="soft-success" class="me-1" v-b-tooltip.hover title="Print" size="sm">
                                    <i class="ri-printer-fill align-bottom"></i>
                                </b-button>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <Pagination class="ms-2 me-2" v-if="meta" @fetch="fetch" :lists="lists.length" :links="links" :pagination="meta" />
            </div>

        </div>
    </div>
    <View :deposits="deposits" :orseries="orseries" @update="fetch()" ref="view"/>
</template>
<script>
import _ from 'lodash';
import View from './Modals/View.vue';
import PageHeader from '@/Shared/Components/PageHeader.vue';
import Pagination from "@/Shared/Components/Pagination.vue";
export default {
    props: ['statuses'],
    components: { PageHeader, Pagination, View },
    data(){
        return {
            currentUrl: window.location.origin,
            lists: [],
            meta: {},
            links: {},
            filter: {
                keyword: null,
                status: null,
            },
            index: null
        }
    },
    watch: {
        "filter.keyword"(newVal){
            this.checkSearchStr(newVal);
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
            page_url = page_url || '/finance';
            axios.get(page_url,{
                params : {
                    keyword: this.filter.keyword,
                    status: 7,
                    count: ((window.innerHeight-350)/58),
                    option: 'receipts'
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
        openView(data){
            this.$refs.view.show(data);
        },
        openPrint(id){
            window.open(this.currentUrl + '/finance?option=print&id='+id);
        },
    }
}   
</script>