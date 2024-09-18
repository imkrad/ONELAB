<template>
    <Head title="Dashboard"/>
    <PageHeader title="Dashboard" pageTitle="Menu" />
    <b-row class="g-3">
        <div class="col-12 mb-3 mt-2">
            <div class="d-flex flex-lg-row flex-column">
                <div class="flex-grow-1">
                    <h4 class="fs-14 mb-0">{{ (laboratory) ? laboratory.name : dropdowns.laboratories[0].name }}</h4>
                    <p class="text-muted mb-0">Here's what's happening with the laboratory</p>
                </div>
                <div class="mt-3 mt-lg-0">
                    <form action="javascript:void(0);">
                        <div class="row g-3 mb-0 align-items-center">
                            <div class="col-sm-auto">
                                <div class="input-group">
                                    <select v-model="laboratory" class="form-select" aria-label="Default select example">
                                        <option :value="list" v-for="list in dropdowns.laboratories" v-bind:key="list.value">{{list.name}}</option>
                                    </select>
                                    <div class="input-group-text bg-primary border-primary text-white">
                                        <i class="ri-flask-fill"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-12 mt-0">
            <div class="row g-3">
                <b-col lg="3" md="4" v-for="(item, index) of counts" :key="index">
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

        <div class="col-md-9 mt-n2">
            <div class="card">
                <div class="card-body" style="height: calc(100vh - 365px); overflow: auto;">
                    <Lists :laboratory="dropdowns.laboratories[0]" ref="lists"/>
                </div>
            </div>
        </div>

    </b-row>
</template>
<script>
import Lists from './Lists.vue';
import PageHeader from '@/Shared/Components/PageHeader.vue';
export default {
    components: { PageHeader, Lists },
    props: ['dropdowns'],
    data(){
        return {
            reminders: [],
            counts: [],
            laboratory: this.dropdowns.laboratories[0],
            activeList: null,
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
    created(){
        this.fetch();
    },
    watch: {
        laboratory(newVal) {
            this.fetch();
        }
    },
    methods: {
        fetch(page_url){
            page_url = page_url || '/fetch';
            axios.get(page_url,{
                params : {
                    laboratory: (this.laboratory) ? this.laboratory.value : null,
                    option: 'technicalmanager'
                }
            })
            .then(response => {
                if(response){
                    this.reminders = response.data.reminders;  
                    this.counts = response.data.counts;   
                    this.$refs.lists.update(this.laboratory.value);   
                }
            })
            .catch(err => console.log(err));
        },
        formatMoney(value) {
            let val = (value/1).toFixed(2).replace(',', '.')
            return '₱'+val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")
        },
        filterStatus(status){
            this.$refs.lists.filterStatus(status);
        },
        filterReminder(data){
            (data == this.activeList) ? this.activeList = null : this.activeList = data;
            this.$refs.lists.filterReminder(data);
        },
        isActive(name) {
            return this.activeList === name;
        },
    }
}
</script>