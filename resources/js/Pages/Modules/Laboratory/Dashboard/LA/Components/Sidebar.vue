<template>
    <div class="p-4 d-flex flex-column h-100">
        <b-row class="g-2 mb-2 mt-n2">
            <b-col lg>
                <div class="input-group mb-1">
                    <span class="input-group-text"> <i class="ri-search-line search-icon"></i></span>
                    <input type="text" v-model="filter.keyword" placeholder="Search Sample" class="form-control" style="width: 35%;">
                  
                </div>
            </b-col>
        </b-row>
        <BRow>
            <BCol lg="12">
                <div class="list-group">
                    <div class="list-group-item" style="cursor: pointer;">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0">
                                <div class="avatar-xs">
                                    <div class="avatar-title rounded bg-warning-subtle text-warning"><i
                                            class="fs-15 ri-error-warning-line"></i></div>
                                </div>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h5 class="mb-0 fs-12">Samples for Disposal</h5>
                                <p class="mb-0 fs-11 text-muted">Samples are ready for disposal.</p>
                            </div><span class="text-muted fs-12">{{lists.length}}</span>
                        </div>
                    </div>
                </div>
                <hr class="text-muted"/>
            </BCol>
            <BCol lg="12">
                <b-list-group>
                    <b-list-group-item class="bg-light-subtle fs-11 fw-semibold">Sample Code <span class="float-end">Date Completed</span></b-list-group-item>
                    <simplebar data-simplebar style="height: calc(100vh - 420px); cursor: pointer;">
                        <b-list-group-item v-for="(list,index) in lists" v-bind:key="index" @click="openSample(list)">
                            <span class="fs-12">{{list.code}} <span class="float-end">{{list.date}}</span> </span>
                        </b-list-group-item>
                    </simplebar>
                </b-list-group>
            </BCol>
        </BRow>
    </div>
</template>
<script>
import _ from 'lodash';
import simplebar from "simplebar-vue";
export default {
    components: {simplebar},
    data(){
        return {
            currentUrl: window.location.origin,
            lists: [],
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
                    option: 'fordisposal'
                }
            })
            .then(response => {
                if(response){
                    this.lists = response.data;       
                }
            })
            .catch(err => console.log(err));
        },
        openSample(data){
            this.$emit('open',data);
        }
    }
}
</script>