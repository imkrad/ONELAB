<template>
    <b-row class="g-2 mb-2 mt-n2">
        <b-col lg>
            <div class="input-group mb-1">
                <span class="input-group-text"> <i class="ri-search-line search-icon"></i></span>
                <input type="text" v-model="filter.keyword" placeholder="Search Customer" class="form-control" style="width: 35%;">
                <span @click="refresh" class="input-group-text" v-b-tooltip.hover title="Refresh" style="cursor: pointer;"> 
                    <i class="bx bx-refresh search-icon"></i>
                </span>
                <b-button type="button" variant="primary" @click="openCreate">
                    <i class="ri-add-circle-fill align-bottom me-1"></i> New Disposal
                </b-button>
            </div>
        </b-col>
    </b-row>
    <div class="table-responsive">
        <table class="table table-nowrap align-middle mb-0">
            <thead class="table-light">
                <tr class="fs-11">
                    <th style="width: 20%;">Sample Code</th>
                    <th style="width: 13%;" class="text-center">Date Requested</th>
                    <th style="width: 13%;" class="text-center">Due Date</th>
                    <th style="width: 13%;" class="text-center">Start Date</th>
                    <th style="width: 13%;" class="text-center">End Date</th>
                    <th style="width: 13%;" class="text-center">Disposed Date</th>
                    <th style="width: 15%;" class="text-center">Analyst</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(list,index) in lists" v-bind:key="index">
                    <td>
                        <h5 class="fs-13 mb-0 text-dark">{{list.code}}</h5>
                        <p class="fs-12 text-muted mb-0">{{list.sample}}</p>
                    </td>
                    <td class="text-center fs-11">{{list.created_at}}</td>
                    <td class="text-center fs-11">{{list.start_at}}</td>
                    <td class="text-center fs-11">{{list.end_at}}</td>
                    <td class="text-center fs-11">{{list.analyst}}</td>
                </tr>
            </tbody>
        </table>
        <Pagination class="ms-2 me-2" v-if="meta" @fetch="fetch" :lists="lists.length" :links="links" :pagination="meta" />
    </div>
</template>
<script>
import _ from 'lodash';
import Pagination from "@/Shared/Components/Pagination.vue";
export default {
    components: { Pagination },
    data(){
        return {
            currentUrl: window.location.origin,
            lists: [],
            meta: {},
            links: {},
            index: null,
            filter: {
                keyword: null
            }
        }
    },
    watch: {
        "filter.keyword"(newVal){
            this.checkSearchStr(newVal)
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
            page_url = page_url || '/fetch';
            axios.get(page_url,{
                params : {
                    keyword: this.filter.keyword,
                    count: ((window.innerHeight-350)/58),
                    option: 'laboratoryaide'
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
        }
    }
}
</script>