<template>
    <b-row class="g-2 mb-2 mt-n2">
        <b-col lg>
            <div class="input-group mb-1">
                <span class="input-group-text"> Unpaid Transactions</span>
                <input type="text" v-model="filter.keyword" placeholder="Search Customer" class="form-control" style="width: 55%;">
                <!-- <span @click="refresh" class="input-group-text" v-b-tooltip.hover title="Refresh" style="cursor: pointer;"> 
                    <i class="bx bx-refresh search-icon"></i>
                </span>
                <b-button v-if="$page.props.user.data.assigned_role == 'Accountant'" type="button" variant="primary" @click="openCreate">
                    <i class="ri-add-circle-fill align-bottom me-1"></i> Create
                </b-button> -->
            </div>
        </b-col>
    </b-row>
    <div class="table-responsive">
        <table class="table table-nowrap align-middle mb-0">
            <thead class="table-light">
                <tr class="fs-11">
                    <th style="width: 80%;">Customer</th>
                    <th style="width: 20%;" class="text-center">Total</th>
                </tr>
            </thead>
            <tbody v-if="lists.length > 0">
                <tr v-for="(list,index) in lists" v-bind:key="index">
                    <td>
                        <h5 class="fs-13 mb-0 text-dark">{{list.code}}</h5>
                        <p class="fs-12 text-muted mb-0">{{list.customer.name}}</p>
                    </td>
                    <td class="text-end">{{list.payment.total}}</td>
                </tr>
            </tbody>
            <tbody v-else>
                <tr>
                    <td colspan="7" class="text-center text-muted">
                        There are no records to display
                    </td>
                </tr>
            </tbody>
        </table>
        <Pagination class="ms-2 me-2" v-if="meta" @fetch="fetch" :lists="lists.length" :links="links" :pagination="meta" />
    </div>
    <Create :collections="collections" :payments="payments" @update="fetch()" ref="create"/>
    <View :deposits="deposits" :orseries="orseries" @update="fetch()" ref="view"/>
</template>
<script>
import _ from 'lodash';
import View from '../Modals/View.vue';
import Create from '../Modals/Create.vue';
import Pagination from "@/Shared/Components/Pagination.vue";
export default {
    components: { Pagination, Create, View },
    props: ['collections','payments','deposits','orseries','statuses'],
    data(){
        return {
            currentUrl: window.location.origin,
            lists: [],
            meta: {},
            links: {},
            index: null,
            filter: {
                keyword: null,
                status: null
            }
        }
    },
    created(){
        this.fetch();
    },
    watch: {
        "filter.keyword"(newVal){
            this.checkSearchStr(newVal)
        }
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
                    count: ((window.innerHeight-490)/58),
                    option: 'forpayment'
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
        openCreate(){
            this.$refs.create.show();
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