<template>
    <PageHeader title="Targets" pageTitle="List" />
    <b-row class="g-3 mt-n4">
        <div class="col-md-12">
            <div class="row g-3">
                <b-col lg="3" md="4" v-for="(item, index) of info.counts" :key="index">
                    <b-card no-body :class="item.color">
                        <b-card-body>
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1 ms-3">
                                    <p class="text-uppercase fw-semibold fs-12 text-muted mb-1">
                                        {{ item.name }}
                                    </p>
                                    <h4 class="mb-0">
                                        <span class="counter-value">
                                        {{ info.targets.counts[index] }}<span v-if="index == 3">%</span>
                                        </span>
                                    </h4>
                                </div>
                            </div>
                        </b-card-body>
                    </b-card>
                </b-col>
                <b-col lg="12" class="mt-n2">
                    <BCard no-body>
                        <BCardHeader class="align-items-center d-flex">
                            <BCardTitle class="mb-0 flex-grow-1">{{new Date().getFullYear()}} Target vs Accomplishment</BCardTitle>
                            <div class="flex-shrink-0">
                                <BButton @click="openCreate()" type="button" variant="soft-primary" size="sm">
                                    Set Targets
                                </BButton>
                            </div>
                        </BCardHeader>
                        <BCardBody style="height: calc(100vh - 370px); overflow: auto;">
                            <!-- {{info.targets.kpis }} -->
                            <div class="table-responsive table-card">
                                <table class="table align-middle table-bordered table-centered table-nowrap mb-3">
                                    <thead class="text-muted table-light fs-11">
                                        <tr>
                                            <th width="15%" scope="col">KPI</th>
                                            <th width="7%" class="text-center">Target</th>
                                            <th width="6%" class="text-center" v-for="(list,index) in months" v-bind:key="index">{{list}}</th>
                                            <th width="5%" class="text-center">Accom</th>
                                            <th width="1%" class="text-center"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="(list,index) in info.targets.kpis" v-bind:key="index">
                                           
                                            <td>
                                                <h5 class="fs-12 mb-0">{{list.name}}</h5>
                                            </td>
                                            <td class="text-center fs-12">{{format(list.target,list.is_amount)}}</td>
                                            <td class="text-center fs-12" :class="list.count == 0 ? 'text-muted' : ''" v-for="(list,index) in list.months" v-bind:key="index">
                                                {{format(list.count,list.is_amount)}}
                                            </td>
                                            <td class="text-center fs-12">{{percentage(list.percentage) }}</td>
                                            <!-- <span class="text-muted">({{list.total}})</span> -->
                                            <td class="text-center align-items-center">
                                                <BButton v-if="!list.breakdowns.every(item => item.is_set === 1)" @click="setTarget(list)" class="mt-n1 mb-n1" type="button" variant="primary" size="sm">
                                                    <i class="ri-add-circle-fill"></i>
                                                </BButton>
                                                <BButton v-else @click="openView(list)" class="mt-n1 mb-n1" type="button" variant="light" size="sm">
                                                    <i class="ri-eye-fill"></i>
                                                </BButton>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </BCardBody>
                    </BCard>
                </b-col>
            </div>
        </div>
    </b-row>
    <Target ref="target"/>
    <View ref="view"/>
</template>
<script>
import _ from 'lodash';
import View from './Modals/View.vue';
import Target from './Modals/Targets.vue';
import PageHeader from '@/Shared/Components/PageHeader.vue';
export default {
    components: { PageHeader, Target, View },
    props: ['info'],
    data(){
        return {
            currentUrl: window.location.origin,
            lists: [],
            meta: {},
            links: {},
            filter: {
                keyword: null,
                classification: null
            },
            months: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun','Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            index: null
        }
    },
    methods: {
        setTarget(data){
            this.$refs.target.show(data);
        },
        format(count,type){
            if(type){
                let val = (count/1).toFixed(2).replace(',', '.')
                return '₱'+val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")
            }else{
                let val = (count/1).toFixed(0).replace(',', '.')
                return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")
            }
        },
        percentage(data){
            return data.toFixed(2).replace(',', '.')+ '%';
        },
        openView(data){
            this.$refs.view.show(data);
        }
    }
   
}   
</script>