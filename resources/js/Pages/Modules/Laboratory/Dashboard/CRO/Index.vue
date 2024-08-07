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
                                        <span class="counter-value">
                                        {{item.total}}
                                        </span>
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
                    
                   
                </div>
            </div>
        </div>
        
    </b-row>
</template>
<script>
import flatPickr from "vue-flatpickr-component";
import PageHeader from '@/Shared/Components/PageHeader.vue';
export default {
    components: { PageHeader, flatPickr },
    props: ['dropdowns'],
    data(){
        return {
            currentUrl: window.location.origin,
            date: this.dropdowns.info.date,
            config: { mode: "range"},
            chartOptions: {
                chart: { type: 'area', height: 40, sparkline: {enabled: true}},
                stroke: { curve: 'smooth', width: 2, },
                dataLabels: {  enabled: false },
                colors: ['#03114B'],
                fill: { type: 'gradient',gradient: {shadeIntensity: 1,inverseColors: false,opacityFrom: 0.45, opacityTo: 0.05,stops: [25, 100, 100, 100] }, },
                tooltip: { fixed: { enabled: false }, x: { show: true },marker: { show: false } }
            }
        }
    },
}
</script>