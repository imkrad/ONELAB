<template lang="">
    <Head title="Dashboard"/>
    <PageHeader title="Dashboard" pageTitle="Lab Analyst" />
    
    <b-row class="g-4">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body" style="height: calc(100vh - 220px); overflow: auto;" >
                    <p class="text-muted text-uppercase fs-12 fw-medium mb-2">My Tasks</p>
                    <b-list-group>
                        <BListGroupItem @click="filterReminder(list.name)"v-for="(list,index) in tasks" v-bind:key="index" style="cursor: pointer;" :class="{ 'bg-info-subtle': isActive(list.name) }">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <div class="avatar-xs">
                                        <div class="avatar-title rounded" :class="list.color">
                                        <i class="fs-15" :class="list.icon"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h5 class="mb-0 fs-12">{{list.name}}</h5>
                                    <p class="mb-0 fs-11 text-muted">{{list.description}}</p>
                                </div>
                                <span class="text-muted fs-12">{{list.count}} </span>
                            </div>
                        </BListGroupItem>
                    </b-list-group>
                    <p class="text-muted text-uppercase fs-12 fw-medium mb-2 mt-3">Reminders</p>
                    <b-list-group>
                        <BListGroupItem @click="filterReminder(list.name)" v-for="(list,index) in reminders" v-bind:key="index" style="cursor: pointer;" :class="{ 'bg-info-subtle': isActive(list.name) }">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <div class="avatar-xs">
                                        <div class="avatar-title rounded" :class="list.color">
                                        <i class="fs-15" :class="list.icon"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h5 class="mb-0 fs-12">{{list.name}}</h5>
                                    <p class="mb-0 fs-11 text-muted">{{list.description}}</p>
                                </div>
                                <span class="text-muted fs-12">{{list.count}} </span>
                            </div>
                        </BListGroupItem>
                    </b-list-group>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-12 mb-n4">
                    <div class="card">
                        <div class="card-body">
                            <b-col lg>
                                <div class="input-group mb-0">
                                    <span class="input-group-text"> <i class="ri-search-line search-icon"></i></span>
                                    <input type="text"  placeholder="Search Sample Code" v-model="keyword" class="form-control" style="width: 50%;">
                                    <select v-model="month" class="form-select" id="inputGroupSelect01">
                                        <option :value="null" selected>Filter by month</option>
                                        <option v-for="month in months" :key="month.value" :value="month.value"> {{ month.name }}</option>
                                    </select>
                                    <select class="form-select" id="inputGroupSelect01">
                                        <option @click="setDisplay('sample')" selected>Show by Sample</option>
                                    </select>
                                    <b-button type="button" variant="primary"  @click="refresh()">
                                        <i class="bx bx-refresh search-icon"></i>
                                    </b-button>
                                </div>
                            </b-col>
                        </div>
                    </div>
                </div>
                <Sample2 v-if="mode === 'sample'" :search-query="searchQuery" ref="sample"/>
            </div>
        </div>
    </b-row>
    <View ref="view"/>
    <Show ref="show"/>
</template>
<script>
import _ from 'lodash';
import Sample2 from './Display/Sample2.vue';
import simplebar from "simplebar-vue";
import View from './Modals/View.vue';
import Show from './Modals/Show.vue';
import PageHeader from '@/Shared/Components/PageHeader.vue';
export default {
    components: { PageHeader, View, Show, simplebar, Sample2 },
    props: ['reminders','tasks'],
    data(){
        return {
            currentUrl: window.location.origin,
            searchTerm: '',
            matchedRowIndex1: null,
            matchedRowIndex2: null,
            matchedRowIndex3: null,
            matches1: [],
            matches2: [],
            matches3: [],
            keyword: '',
            mode: 'sample',
            activeReminder: null,
            activeList: null,
            month: null,
            months: [
                { value: '1', name: 'January' },
                { value: '2', name: 'February' },
                { value: '3', name: 'March' },
                { value: '4', name: 'April' },
                { value: '5', name: 'May' },
                { value: '6', name: 'June' },
                { value: '7', name: 'July' },
                { value: '8', name: 'August' },
                { value: '9', name: 'September' },
                { value: '10', name: 'October' },
                { value: '11', name: 'November' },
                { value: '12', name: 'December' }
            ]
        }
    },
    watch: {
        month(newVal){
            this.$refs.sample.setMonth(newVal);
        },
        keyword(newVal){
            this.checkSearchStr(newVal);
        },
    },
    methods: {
        checkSearchStr: _.debounce(function(string) {
            this.$refs.sample.setKeyword(this.keyword);
        }, 300),
        setDisplay(mode){
            this.mode = mode;
        },
        filterReminder(data){
            if(data == this.activeList){
                this.activeList = null;
            }else{
                this.activeList = data;
            }
            this.$refs.sample.filterReminder(data,this.activeList);
        },
        isActive(name) {
            return this.activeList === name;
        }
    }
}
</script>