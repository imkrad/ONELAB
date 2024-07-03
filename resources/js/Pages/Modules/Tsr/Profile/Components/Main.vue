<template>
    <div class="row mt-n2">
        <div class="col-md-12" v-if="!view">
          
            <div class="alert alert-light border-1" role="alert">
                <div class="align-items-center d-flex">
                    <h5 class="card-title text-dark mb-0 fs-13 fw-semibold flex-grow-1">Samples Received</h5>
                    <div class="flex-shrink-0">
                        <div class="form-check form-switch form-switch-right form-switch-md">
                            <label for="navbarscrollspy-showcode" class="form-label text-muted">Show Analyses</label>
                            <input class="form-check-input code-switcher" v-model="showAnalyses" type="checkbox" id="navbarscrollspy-showcode">
                        </div>
                    </div>
                </div>
            </div>
            <b-row class="g-2">
                <b-col lg>
                    <div class="input-group mb-2">
                        <span class="input-group-text fw-semibold fs-12" style="width: 100px;">{{selected.samples.length}} Samples</span>
                        <input type="text"  placeholder="Search Request" class="form-control" style="width: 55%;">
                        <span v-if="selected.laboratory_type === 11 && selected.service == null" @click="openService()" class="input-group-text" v-b-tooltip.hover title="Add Service" style="cursor: pointer;"> 
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
                <simplebar data-simplebar style="height: calc(100vh - 240px)">
                <table class="table table-nowrap align-middle mb-0">
                    <thead class="table-light thead-fixed">
                        <tr class="fs-11">
                            <th width="4%" class="text-center">
                                <input class="form-check-input fs-16" v-model="mark" type="checkbox" value="option" />
                            </th>
                            <th width="3%">#</th>
                            <th width="20%">Sample Name</th>
                            <th width="65%">Description</th>
                            <th width="5%"></th>
                        </tr>
                    </thead>
                    <tbody v-if="selected.samples.length > 0">
                        <template v-for="(list,index) in selected.samples" v-bind:key="index">
                            <tr :class="(showAnalyses) ? 'bg-info-subtle' : ''">
                                <td width="4%" class="text-center">
                                    <input type="checkbox" v-model="list.selected" class="form-check-input" />
                                </td>
                                <td width="3%">{{index+1}}</td>
                                <td width="20%">
                                    <h5 class="fs-13 mb-0 fw-semibold text-primary">{{(list.code) ? list.code : 'Not yet available'}}</h5>
                                    <p class="fs-13 text-muted mb-0">{{list.name}}</p>
                                </td>
                                <td width="65%" style=" white-space: normal;overflow: hidden; text-overflow: ellipsis; max-width: 150px;"><i>{{list.customer_description}}</i>, {{list.description}}</td>
                                <td width="10%" class="text-end">
                                    <b-button @click="openView(list)" variant="soft-info" class="me-1" v-b-tooltip.hover title="View" size="sm">
                                        <i class="ri-eye-fill align-bottom"></i>
                                    </b-button>
                                    <b-button v-if="selected.status.name == 'Pending'" @click="openDeleteSample(list)" variant="soft-danger" v-b-tooltip.hover title="Delete" size="sm">
                                        <i class="ri-delete-bin-fill align-bottom"></i>
                                    </b-button>
                                    <b-button v-if="selected.status.name == 'Completed'" @click="openCertificate(list)" variant="soft-primary" v-b-tooltip.hover title="Certificate" size="sm">
                                        <i class="ri-file-paper-2-fill align-bottom"></i>
                                    </b-button>
                                    
                                    <b-button v-if="selected.status.name == 'Pending'" @click="openCopy(list)" variant="soft-success" class="ms-1" v-b-tooltip.hover title="Copy" size="sm">
                                        <i class="ri-file-copy-2-line align-bottom"></i>
                                    </b-button>
                                </td>
                            </tr>
                            <tr v-if="list.analyses.length > 0 && showAnalyses" class="bg-info-subtle">
                                <td colspan="5">
                                    <table class="table table-nowrap border align-middle mb-0">
                                        <thead class="table-light thead-fixed">
                                            <tr class="fs-10">
                                                <th class="text-center" width="5%">#</th>
                                                <th width="20%">Test Name</th>
                                                <th class="text-center" width="50%">Method Reference</th>
                                                <th class="text-center" width="12%">Fee</th>
                                                <th class="text-center" width="13%">Status</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody v-if="list.analyses.length > 0">
                                            <tr v-for="(list,index) in list.analyses" v-bind:key="index" class="bg-light-subtle">
                                                <td class="text-center"> 
                                                    {{index + 1}}
                                                </td>
                                                <td>
                                                    <h5 class="fs-13 mb-0">{{list.testname}}</h5>
                                                </td>
                                                <td class="text-center">
                                                    <h5 class="fs-12 mb-0">{{list.method}}</h5>
                                                    <p class="fs-11 text-muted mb-0">{{list.reference}}</p>
                                                </td>
                                                <td class="text-center">{{list.fee}}</td>
                                                <td class="text-center">
                                                    <span :class="'badge '+list.status.color+' '+list.status.others">{{list.status.name}}</span>
                                                </td>
                                                <td>
                                                    <b-button @click="openViewAnalysis(list)" variant="soft-info" class="me-1" v-b-tooltip.hover title="View" size="sm">
                                                        <i class="ri-eye-fill align-bottom"></i>
                                                    </b-button>
                                                    <b-button v-if="selected.status.name == 'Pending' || selected.status.name == 'For Payment' && analyses.length > 1" @click="openDeleteAnalysis(list)" variant="soft-danger" v-b-tooltip.hover title="Delete" size="sm">
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
                                </td>
                            </tr>
                        </template>
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
        <div v-else class="col-md-12">
            <div class="border p-3">
                <div class="d-flex mb-n3">
                    <div class="flex-grow-1">
                        <div>
                            <h5 class="font-size-16 mb-1"> {{sample.name}} <span class="text-muted fs-14">({{(sample.code) ? sample.code : 'Not yet specified'}}) </span></h5>
                            <p>{{sample.customer_description}}, {{sample.description}}</p>
                        </div>
                    </div>
                    <div class="flex-shrink-0">
                        <div>
                            <button @click="view = false" class="btn btn-light" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                                <i class="ri-close-circle-fill align-bottom"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="table-responsive mt-2">
                <simplebar data-simplebar style="height: 290px;">
                <table class="table table-nowrap align-middle mb-0">
                    <thead class="table-light thead-fixed">
                        <tr class="fs-11">
                            <th class="text-center" width="5%">#</th>
                            <th width="20%">Test Name</th>
                            <th class="text-center" width="50%">Method Reference</th>
                            <th class="text-center" width="12%">Fee</th>
                            <th class="text-center" width="13%">Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody  v-if="analyses.length > 0">
                        <tr v-for="(list,index) in sample.analyses" v-bind:key="index">
                            <td class="text-center"> 
                                {{index + 1}}
                            </td>
                            <td>
                                <h5 class="fs-13 mb-0 text-dark">{{list.testname}}</h5>
                                <p class="fs-12 text-muted mb-0">{{(list.code) ? list.code : 'No sample code yet'}}</p>
                            </td>
                            <td class="text-center">
                                <h5 class="fs-12 mb-0">{{list.method}}</h5>
                                <p class="fs-11 text-muted mb-0">{{list.reference}}</p>
                            </td>
                            <td class="text-center">{{list.fee}}</td>
                            <td class="text-center">
                                <span :class="'badge '+list.status.color+' '+list.status.others">{{list.status.name}}</span>
                            </td>
                            <td>
                                <b-button @click="openView(list)" variant="soft-info" class="me-1" v-b-tooltip.hover title="View" size="sm">
                                    <i class="ri-eye-fill align-bottom"></i>
                                </b-button>
                                <b-button v-if="selected.status.name == 'Pending' || selected.status.name == 'For Payment' && analyses.length > 1" @click="openDeleteAnalysis(list)" variant="soft-danger" v-b-tooltip.hover title="Delete" size="sm">
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
        <!-- <div class="col-md-12" style="height: calc((100vh - 120px)/2); overflow: auto;">
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
                            <th class="text-center" width="50%">Method Reference</th>
                            <th class="text-center" width="12%">Fee</th>
                            <th class="text-center" width="13%">Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody  v-if="analyses.length > 0">
                        <tr v-for="(list,index) in analyses" v-bind:key="index">
                            <td class="text-center"> 
                                {{index + 1}}
                            </td>
                            <td>
                                <h5 class="fs-13 mb-0 text-dark">{{list.testname}}</h5>
                                <p class="fs-12 text-muted mb-0">{{(list.code) ? list.code : 'No sample code yet'}}</p>
                            </td>
                            <td class="text-center">
                                <h5 class="fs-12 mb-0">{{list.method}}</h5>
                                <p class="fs-11 text-muted mb-0">{{list.reference}}</p>
                            </td>
                            <td class="text-center">{{list.fee}}</td>
                            <td class="text-center">
                                <span :class="'badge '+list.status.color+' '+list.status.others">{{list.status.name}}</span>
                            </td>
                            <td>
                                <b-button @click="openView(list)" variant="soft-info" class="me-1" v-b-tooltip.hover title="View" size="sm">
                                    <i class="ri-eye-fill align-bottom"></i>
                                </b-button>
                                <b-button v-if="selected.status.name == 'Pending' || selected.status.name == 'For Payment' && analyses.length > 1" @click="openDeleteAnalysis(list)" variant="soft-danger" v-b-tooltip.hover title="Delete" size="sm">
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
        </div> -->
    </div>
    <Delete ref="delete"/>
    <Sample ref="sample"/>
    <Analysis @success="mark = false" ref="analysis"/>
    <Service :services="services" ref="service"/>
    <Certificate ref="certificate"/>
</template>
<script>
import simplebar from "simplebar-vue";
import Delete from '../Modals/Delete.vue';
import Sample from '../Modals/Sample.vue';
import Service from '../Modals/Service.vue';
import Analysis from '../Modals/Analysis.vue';
import Certificate from '../Modals/Certificate.vue';
export default {
    components: { simplebar, Delete, Sample, Service, Analysis, Certificate },
    props:['selected','services','analyses'],
    data(){
        return {
            currentUrl: window.location.origin,
            samples : [],
            sample: {},
            showAnalyses: false,
            view: false,
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
            (this.samples.length > 0) ? this.$refs.analysis.show(this.samples,this.selected.laboratory_type) : '';
        },
        openView(list){
            this.view = true;
            this.sample = list;
        },
        openViewAnalysis(data){

        },
        openCertificate(data){
            this.$refs.certificate.show(data,this.selected.id);
        },
        openCopy(sample){
            this.$refs.sample.copy(this.selected.id,this.selected.laboratory_type,sample);
        },
        openService(){
            this.$refs.service.show(this.selected.id);
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

