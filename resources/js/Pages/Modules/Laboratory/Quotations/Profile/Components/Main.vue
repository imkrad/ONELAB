<template>
    <div class="row mt-n2">
        <div class="col-md-12" style="height: calc((100vh - 140px)/2); overflow: auto;">
            <b-row class="g-2">
                <b-col lg>
                    <div class="input-group mb-2">
                        <span class="input-group-text fw-semibold fs-12" style="width: 100px;">Samples</span>
                        <input type="text"  placeholder="Search Request" class="form-control" style="width: 55%;">
                        <span v-if="selected.laboratory_type === 11" @click="openService(id)" class="input-group-text" v-b-tooltip.hover title="Add Service" style="cursor: pointer;"> 
                            <i class="ri-add-circle-fill text-primary search-icon"></i>
                        </span>
                        <span v-if="selected.status.name == 'Pending'" @click="openAnalysis()" class="input-group-text" v-b-tooltip.hover title="Add Analysis" style="cursor: pointer;"> 
                            <i class="ri-flask-fill text-primary search-icon"></i>
                        </span>
                        <b-button v-if="selected.status.name == 'Pending'" @click="openSample()" type="button" variant="primary" :disabled="(mark) ? true : false">
                            <i class="ri-add-circle-fill align-bottom me-1"></i>Sample
                        </b-button>
                    </div>
                </b-col>
            </b-row>
            <div class="table-responsive">
                <simplebar data-simplebar style="height: 290px;">
                <table class="table table-nowrap align-middle mb-0">
                    <thead class="table-light thead-fixed">
                        <tr class="fs-11">
                            <th width="5%" class="text-center">
                                <input class="form-check-input fs-16" v-model="mark" type="checkbox" value="option" />
                            </th>
                            <th width="20%">Sample Name</th>
                            <th width="65%">Description</th>
                            <th width="10%"></th>
                        </tr>
                    </thead>
                    <tbody v-if="selected.samples.length > 0">
                        <tr v-for="(list,index) in selected.samples" v-bind:key="index">
                            <td width="5%" class="text-center">
                                <input type="checkbox" v-model="list.selected" class="form-check-input" />
                            </td>
                            <td width="20%">
                                <h5 class="fs-13 mb-0 text-dark">{{list.name}}</h5>
                                <p class="fs-12 text-muted mb-0">{{(list.code) ? list.code : 'Not yet available'}}</p>
                            </td>
                            <td width="65%"><i>{{list.customer_description}}</i>, {{list.description}}</td>
                            <td width="10%" class="text-end">
                                <b-button @click="openView(list)" variant="soft-info" class="me-1" v-b-tooltip.hover title="View" size="sm">
                                    <i class="ri-eye-fill align-bottom"></i>
                                </b-button>
                                <b-button v-if="selected.status.name == 'Pending'" @click="openDeleteSample(list)" variant="soft-danger" v-b-tooltip.hover title="Delete" size="sm">
                                    <i class="ri-delete-bin-fill align-bottom"></i>
                                </b-button>
                            </td>
                        </tr>
                    </tbody>
                    <tbody v-else>
                        <tr>
                            <td colspan="4" class="text-center">No samples found</td>
                        </tr>
                    </tbody>
                </table>
                </simplebar>
            </div>
        </div>
        <div class="col-md-12" style="height: calc((100vh - 120px)/2); overflow: auto;">
            <b-row class="g-2 mt-2 mb-2">
                <b-col lg>
                    <div class="input-group mb-1">
                        <span class="input-group-text fw-semibold fs-12">Parameters</span>
                        <input type="text"  placeholder="Search Request" class="form-control" style="width: 55%;">
                    </div>
                </b-col>
            </b-row>
            <div class="table-responsive">
                <simplebar data-simplebar style="height: 290px;">
                <table class="table table-nowrap align-middle mb-0">
                    <thead class="table-light thead-fixed">
                        <tr class="fs-11">
                            <th class="text-center" width="5%">#</th>
                            <th width="20%">Test Name</th>
                            <th class="text-center" width="55%">Method Reference</th>
                            <th class="text-center" width="15%">Fee</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody  v-if="analyses.length > 0">
                        <tr v-for="(list,index) in analyses" v-bind:key="index">
                            <td class="text-center"> 
                                {{index + 1}}
                            </td>
                            <td>
                                <h5 class="fs-12 mb-0 text-dark">{{list.testname}}</h5>
                            </td>
                            <td class="text-center">
                                <h5 class="fs-12 mb-0">{{list.method}}</h5>
                                <p class="fs-11 text-muted mb-0">{{list.reference}}</p>
                            </td>
                            <td class="text-center">{{list.fee}}</td>
                            <td>
                                <b-button @click="openView(list)" variant="soft-info" class="me-1" v-b-tooltip.hover title="View" size="sm">
                                    <i class="ri-eye-fill align-bottom"></i>
                                </b-button>
                                <b-button v-if="selected.status.name == 'Pending'" @click="openDeleteAnalysis(list)" variant="soft-danger" v-b-tooltip.hover title="Delete" size="sm">
                                    <i class="ri-delete-bin-fill align-bottom"></i>
                                </b-button>
                            </td>
                        </tr>
                    </tbody>
                    <tbody v-else>
                        <tr>
                            <td colspan="5" class="text-center">No analysis found</td>
                        </tr>
                    </tbody>
                </table>
                </simplebar>
            </div>
        </div>
    </div>
    <Delete ref="delete"/>
    <Sample ref="sample"/>
    <Analysis @success="mark = false" ref="analysis"/>
    <Service :services="services" ref="service"/>
</template>
<script>
import simplebar from "simplebar-vue";
import Delete from '../Modals/Delete.vue';
import Sample from '../Modals/Sample.vue';
import Service from '../Modals/Service.vue';
import Analysis from '../Modals/Analysis.vue';
export default {
    components: { simplebar, Delete, Sample, Service, Analysis },
    props:['selected','services','analyses'],
    data(){
        return {
            samples : [],
            mark: false,
        }
    },
    watch: {
        mark(){
            if(this.mark){
                this.selected.samples.forEach(item => {
                    item.selected = true;
                    this.samples.push(item.id);
                });
            }else{
                this.selected.samples.forEach(item => {
                    item.selected = false;
                });
                this.samples = [];
            }
        },
        'selected.samples': {
            deep: true,
            handler() {
                this.samples = this.selected.samples
                .filter(item => item.selected)
                .map(selectedItem => selectedItem.id);
            }
        }
    },
    methods: {
        openSample(){
            this.$refs.sample.show(this.selected.id,this.selected.laboratory_type);
        },
        openAnalysis(){
            (this.samples.length > 0) ? this.$refs.analysis.show(this.samples,this.selected.type.id) : '';
        },
        openDeleteSample(data){
            this.$refs.delete.show(data,this.selected.id,'sample');
        },
        openDeleteAnalysis(data){
            this.$refs.delete.show(data,this.selected.id,'analysis');
        },
    }
}
</script>

