<template lang="">
    <Head title="Dashboard"/>
    <PageHeader title="Dashboard" pageTitle="Menu" />
    <!-- style="height: calc(100vh - 200px); overflow: auto;" -->
    <b-row class="g-3">
        <div class="col-12 mb-3 mt-2">
            <div class="d-flex flex-lg-row flex-column">
                <div class="flex-grow-1">
                    <h4 class="fs-14 mb-0">{{dropdowns.info.month}} Summary View</h4>
                    <p class="text-muted mb-0">Here's what's happening with the laboratory for month of {{dropdowns.info.month}}.</p>
                </div>
                <div class="mt-3 mt-lg-0">
                    <form action="javascript:void(0);">
                        <div class="row g-3 mb-0 align-items-center">
                            <div class="col-sm-auto">
                                <div class="input-group">
                                    <flat-pickr v-model="date" :config="config" class="form-control border-0 dash-filter-picker shadow"></flat-pickr>
                                    <div class="input-group-text bg-primary border-primary text-white">
                                        <i class="ri-calendar-2-line"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <button type="button" class="btn btn-soft-info btn-icon waves-effect material-shadow-none waves-light layout-rightside-btn"><i class="ri-pulse-line"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-12 mt-0">
            <div class="row g-3">
                <b-col lg="3" md="4" v-for="(item, index) of dropdowns.counts" :key="index">
                    <b-card no-body :class="item.color">
                        <b-card-body>
                            <div class="d-flex align-items-center">
                                <div class="avatar-sm flex-shrink-0">
                                    <span class="avatar-title bg-light text-primary rounded-circle fs-3">
                                        <i :class="`bx ${item.icon} align-middle`"></i>
                                    </span>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <p class="text-uppercase fw-semibold fs-12 text-muted mb-1">
                                        {{ item.name }}
                                    </p>
                                    <h4 class="mb-0">
                                        <span v-if="index == 0" class="counter-value">{{formatMoney(item.total)}}</span>
                                        <span v-else class="counter-value">{{item.total}}</span>
                                    </h4>
                                </div>
                                <div class="flex-shrink-0 align-self-end">
                                    <apexchart class="apex-charts" height="40" width="100" type="area" dir="ltr" :series="item.series" :options="chartOptions"></apexchart>
                                </div>
                            </div>
                        </b-card-body>
                    </b-card>
                </b-col>
            </div>
        </div>
        <div class="col-md-3 mt-n2">
            <div class="card">
                <div class="card-body" style="height: calc(100vh - 365px); overflow: auto;">
                    <p class="text-muted text-uppercase fs-12 fw-medium mb-2">Reminders</p>
                    <b-list-group>
                        <BListGroupItem v-for="(list,index) in dropdowns.reminders" v-bind:key="index">
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
                    <p class="text-muted text-uppercase fs-12 fw-medium mb-2 mt-3"> Statuses </p>
                    <b-list-group>
                        <BListGroupItem  v-for="(list,index) in dropdowns.statuses" v-bind:key="index" class="d-flex justify-content-between align-items-center fs-12">
                            {{list.name}} <span class="badge bg-light text-muted">{{list.tsrs_count}}</span>
                        </BListGroupItem>
                    </b-list-group>
                </div>
            </div>
        </div>
        <div class="col-md-9 mt-n2">
            <div class="card">
                <!-- <div class="card-header align-items-center d-flex">
                    <h5 class="card-title mb-0 flex-grow-1">TSR Requests <span class="text-muted fs-14">(Draft)</span></h5>
                    <div>
                      
                    </div>
                </div> -->
                <div class="card-body" style="height: calc(100vh - 365px); overflow: auto;">
                    <div class="table-responsive">
                        <table class="table table-nowrap align-middle mb-0">
                            <thead class="table-light">
                                <tr class="fs-11">
                                    <th></th>
                                    <th style="width: 40%;">Customer</th>
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
                    </div>

                </div>
            </div>
        </div>
        
    </b-row>
</template>
<script>
import _ from 'lodash';
import flatPickr from "vue-flatpickr-component";
import PageHeader from '@/Shared/Components/PageHeader.vue';
export default {
    components: { PageHeader, flatPickr },
    props: ['dropdowns'],
    data(){
        return {
            currentUrl: window.location.origin,
            lists: [],
            meta: {},
            links: {},
            date: this.dropdowns.info.date,
            config: { mode: "range"},
            chartOptions: {
                chart: { type: 'area', height: 40, sparkline: {enabled: true}},
                stroke: { curve: 'smooth', width: 2, },
                dataLabels: {  enabled: false },
                colors: ['#03114B'],
                fill: { type: 'gradient',gradient: {shadeIntensity: 1,inverseColors: false,opacityFrom: 0.45, opacityTo: 0.05,stops: [25, 100, 100, 100] }, },
                tooltip: { fixed: { enabled: false }, x: { show: true },marker: { show: false } }
            },
            chartOptions2: {
                chart: {
                type: "radialBar",
                    sparkline: {
                        enabled: true,
                    },
                },
                dataLabels: {
                    enabled: false,
                },
                plotOptions: {
                    radialBar: {
                        hollow: {
                            margin: 0,
                            size: "30%",
                        },
                        track: {
                            margin: 1,
                        },
                        dataLabels: {
                            show: false,
                        },
                    },
                },
                colors: ["#099885"],
            },
            filter: {
                keyword: null,
                overdue: null,
                released: null,
                unclaimed: null
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
            page_url = page_url || '/requests';
            axios.get(page_url,{
                params : {
                    keyword: this.filter.keyword,
                    count: ((window.innerHeight-390)/58),
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
        formatMoney(value) {
            let val = (value/1).toFixed(2).replace(',', '.')
            return '₱'+val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")
        },
    }
}
</script>