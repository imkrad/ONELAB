<template>
<!-- style="--vz-modal-width: 1000px;" -->
    <b-modal v-if="selected" v-model="showModal" style="--vz-modal-width: 90%;" hide-footer header-class="p-3 bg-light" :title="selected.name" class="v-modal-custom" modal-class="zoomIn" centered no-close-on-backdrop>
        <div class="row p-2 mt-n4">
            <div class="col-md-3">
                <apexchart class="apex-charts mt-n2 mb-n2" height="370" dir="ltr" :series="series" :options="chartOptions"></apexchart>
                <hr class="text-muted"/>
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
                </div>
            </div>
            <div class="col-md-9">
                <BRow class="g-2 mt-2">
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
                        <b-list-group class="mt-n2">
                            <b-list-group-item v-for="(top,index1) in selected.tops[index]" v-bind:key="index1" class="fs-12">
                                {{index1+1}}. {{top.name}} <span class="float-end">{{top.count}}</span>
                            </b-list-group-item>
                        </b-list-group>
                    </BCol>
                </BRow>
                <!-- {{selected}} -->
            </div>
        </div>
        <!-- <template v-slot:footer>
            <b-button @click="hide()" variant="light" block>Close</b-button>
        </template> -->
    </b-modal>
</template>
<script>
export default {
    data(){
        return {
            currentUrl: window.location.origin,
            selected: null,
            showModal: false,
            colors: ['primary','warning','info','danger','success'],
            series: [],
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
    methods: { 
        show(data){
            this.selected = data;
            this.series = [
            {
                name: "Target",
                data: [this.selected.target],
            },
            {
                name: "Accomplish",
                data: [this.selected.accom],
            },
            ]
            this.showModal = true;
        },
        calculatePercentage(listAccom, selectedAccom) {
            if (selectedAccom === 0) {
                return '0.0%'; 
            }
            const percentage = (listAccom / selectedAccom) * 100;
            return `${percentage.toFixed(1)}%`;
        },
        hide(){
            this.showModal = false;
        }
    }
}
</script>
