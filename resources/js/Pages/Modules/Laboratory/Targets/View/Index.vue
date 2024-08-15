<template>
    <PageHeader :title="selected.name" pageTitle="Target" />
    <b-row class="g-3 mt-n4">
        <b-col lg="3">
            <b-card no-body>
                <b-card-body  style="height: calc(100vh - 212px); overflow: auto;">
                    <div class="mt-0 pt-2">
                        <div class="progress progress-xl">
                            <div v-for="(list,index) in selected.breakdowns" v-bind:key="index" class="progress-bar rounded-0" :class="'bg-'+colors[index]" role="progressbar" aria-valuenow="25" aria-valuemin="0" :style="'width: '+(list.accom/selected.accom)*100+'%'">{{calculatePercentage(list.accom,selected.accom)}}</div>
                        </div>
                    </div>
                    <div class="mt-1 pt-2">
                    <div class="d-flex mb-1 fs-13" v-for="(list,index) in selected.breakdowns" v-bind:key="index">
                        <div class="flex-grow-1">
                            <p class="text-truncate text-muted mb-0">
                                <i class="mdi mdi-circle align-middle me-2" :class="'text-'+colors[index]"></i>{{list.type.name}}
                            </p>
                        </div>
                        <div class="flex-shrink-0">
                            <p class="mb-0 text-muted"> {{calculatePercentage(list.accom,selected.accom)}} ({{list.accom}})</p>
                            <!-- {{list.accom}} / {{list.count}} = -->
                        </div>
                    </div>
                    <hr class="text-muted mt-4"/>
                    <apexchart class="apex-charts mt-n2 mb-n2" height="370" dir="ltr" :series="series" :options="chartOptions"></apexchart>
                </div>
                </b-card-body>
            </b-card>
        </b-col>
         <b-col lg="9">
            <b-row class="g-3">
                <!-- <b-col lg="4" v-for="(list,index) in selected.breakdowns" v-bind:key="index">
                    <BCard>
                        <BCardBody no-body class="bg-light overflow-hidden shadow-none">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <h6 class="mb-0">{{list.type.name}}</h6>
                                </div>
                                <div class="flex-shrink-0">
                                    <h6 class="mb-0"><span class="fs-12 text-muted">({{list.count}})</span> <b class="text-secondary">{{calculatePercentage(list.accom,list.count)}}</b></h6>
                                </div>
                            </div>
                        </BCardBody>
                        <BProgress class="bg-secondary-subtle rounded-0">
                            <BProgress-bar :value="calculatePercentage(list.accom,list.count)" :variant="colors[index]" />
                        </BProgress>
                    </BCard>
                </b-col> -->
                <b-col lg="12">
                    <b-card no-body>
                        <b-card-body style="height: calc(100vh - 213px); overflow: auto;">
                            <BRow class="g-2">
                                <BCol lg="4" v-for="(list,index) in selected.breakdowns" v-bind:key="index">
                                    <BCard no-body class="bg-light overflow-hidden shadow-none">
                                        <BCardBody>
                                            <div class="d-flex">
                                                <div class="flex-grow-1">
                                                    <h6 class="mb-0">{{list.type.name}}</h6>
                                                </div>
                                                <div class="flex-shrink-0">
                                                    <h6 class="mb-0"><b class="text-secondary">{{calculatePercentage(list.accom,list.count)}}</b></h6>
                                                </div>
                                            </div>
                                        </BCardBody>
                                        <BProgress class="bg-secondary-subtle rounded-0">
                                            <BProgress-bar :value="calculatePercentage(list.accom,list.count)" :variant="colors[index]" />
                                        </BProgress>
                                    </BCard>
                                    <hr class="text-muted mt-n2"/>
                                    <b-list-group>
                                        <b-list-group-item v-for="(top,index1) in selected.tops[index]" v-bind:key="index1" class="fs-12">
                                            {{index1+1}}. {{top.name}} <span class="float-end">{{top.count}}</span>
                                        </b-list-group-item>
                                    </b-list-group>
                                </BCol>
                            </BRow>
                        </b-card-body>
                    </b-card>
                </b-col>
            </b-row>
        </b-col>
    </b-row>
</template>
<script>
import PageHeader from '@/Shared/Components/PageHeader.vue';
export default {
    components: { PageHeader },
    props:['selected'],
    data(){
        return {
            currentUrl: window.location.origin,
            colors: ['primary','warning','info','danger','success'],
            series: [{
                name: "Target",
                data: [this.selected.target],
            },
            {
                name: "Accomplish",
                data: [this.selected.accom],
            }],
            chartOptions: {
                chart: {
                type: "bar",
                toolbar: {
                    show: false,
                },
                },
                plotOptions: {
                    bar: {
                        horizontal: false,
                        columnWidth: "50%",
                    },
                },
                stroke: {
                    show: true,
                    width: 5,
                    colors: ["transparent"],
                },
                xaxis: {
                    categories: [""],
                    axisTicks: {
                        show: false,
                        borderType: "solid",
                        color: "#78909C",
                        height: 6,
                        offsetX: 0,
                        offsetY: 0,
                    },
                },
                fill: {
                    opacity: 1,
                },
                legend: {
                show: true,
                position: "bottom",
                horizontalAlign: "center",
                fontWeight: 500,
                offsetX: 0,
                offsetY: -14,
                itemMargin: {
                    horizontal: 8,
                    vertical: 0,
                },
                markers: {
                    width: 10,
                    height: 10,
                },
                },
                colors: ['#e63973','#4892fa'],
            }
        }
    },
    methods :{
        calculatePercentage(listAccom, selectedAccom) {
        if (selectedAccom === 0) {
                return '0.0%'; 
            }
            const percentage = (listAccom / selectedAccom) * 100;
            return `${percentage.toFixed(1)}%`;
        },
    }
}   
</script>