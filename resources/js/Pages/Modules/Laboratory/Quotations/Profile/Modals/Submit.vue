<template>
    <b-modal v-model="showModal" style="--vz-modal-width: 1000px;" title="Submit Quotation" class="v-modal-custom" modal-class="zoomIn" centered no-close-on-backdrop>
       <template v-slot:header>
            <div style="border-bottom: 1px solid #ccc; width: 100%;">
                <i @click="showModal=false" class="ri-close-circle-fill float-end me-3" style="cursor:pointer; font-size: 30px;"></i>
                <b-row class="mt-n1" style="margin-bottom: 12px;">
                    <b-col md>
                        <b-row class="align-items-center g-1">
                            <b-col md="auto">
                                <b-img class="img-thumbnail rounded-circle" style="width: 50px; height: 50px;" alt="img" src="/images/avatars/avatar.jpg" data-holder-rendered="true"></b-img>
                            </b-col>
                            <b-col md>
                                <div class="ms-2 mt-n2">
                                    <h5 class="modal-title fs-15">{{selected.code}}</h5>
                                    <div class="hstack gap-3 flex-wrap mt-0 mb-n2 fs-12">
                                        <div class="text-primary"><i class="ri-account-circle-fill align-bottom me-1"></i>
                                            <span class="text-body text-muted fs-12">{{selected.customer.name}}</span>
                                        </div>
                                        <div class="vr"></div>
                                        <div class="text-primary"><i class="ri-map-pin-2-fill align-bottom me-1"></i>
                                               <span class="text-body text-muted">
                                                {{selected.customer.address.barangay.name}},
                                                {{selected.customer.address.municipality.name}},
                                                {{selected.customer.address.province.name}},
                                                {{selected.customer.address.region.region}}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </b-col>
                        </b-row>
                    </b-col>
                </b-row>
            </div>
        </template>
        <div class="row mb-2">
            <div class="col-sm-3">
                <div class="p-1 border border-dashed rounded">
                    <div class="d-flex align-items-center">
                        <div class="avatar-sm me-0">
                            <div class="avatar-title rounded bg-transparent text-primary fs-24"><i
                                    class="ri-flask-fill"></i></div>
                        </div>
                        <div class="flex-grow-1">
                            <p class="text-muted fs-11 mb-0">Laboratory :</p>
                            <h5 class="fs-12 mb-0">{{selected.type.name}}</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="p-1 border border-dashed rounded">
                    <div class="d-flex align-items-center">
                        <div class="avatar-sm me-0">
                            <div class="avatar-title rounded bg-transparent text-primary fs-24"><i
                                    class="bx bxs-discount"></i></div>
                        </div>
                        <div class="flex-grow-1">
                            <p class="text-muted fs-11 mb-0">Discount :</p>
                            <h5 class="fs-12 mb-0">{{selected.discounted.name}}</h5>
                        </div>
                    </div>
                </div>
            </div>
             <div class="col-sm-3">
                <div class="p-1 border border-dashed rounded">
                    <div class="d-flex align-items-center">
                        <div class="avatar-sm me-0">
                            <div class="avatar-title rounded bg-transparent text-primary fs-20"><i class="ri-information-fill"></i>
                            </div>
                        </div>
                        <div class="flex-grow-1">
                            <p class="text-muted fs-11 mb-0">Purpose:</p>
                            <h5 class="fs-12 mb-0">-</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="p-1 border border-dashed rounded">
                    <div class="d-flex align-items-center">
                        <div class="avatar-sm me-0">
                            <div class="avatar-title rounded bg-transparent text-primary fs-20"><i class="ri-price-tag-2-fill"></i>
                            </div>
                        </div>
                        <div class="flex-grow-1">
                            <p class="text-muted fs-11 mb-0">Total:</p>
                            <h5 class="fs-12 mb-0">{{selected.total}}</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr class="text-muted"/>
        <div class="table-responsive">
            <simplebar data-simplebar style="max-height: 300px;">
                <table class="table table-centered table-bordered table-nowrap mb-0">
                    <thead class="table-light thead-fixed">
                        <tr class="text-muted fs-10">
                            <th style="width: 22%;">Sample</th>
                            <th style="width: 55%;" class="text-center">Method</th>
                            <th style="width: 13%;" class="text-center">Fee</th>
                        </tr>
                    </thead>
                    <tbody class="fs-11 ">
                        <tr v-for="(list,index) in analyses" v-bind:key="index">
                            <td >
                                <h5 class="fs-12 mb-0">{{list.sample}}</h5>
                                <p class="fs-11 text-muted mb-0">{{list.testname}}</p>
                            </td>
                            <td class="text-center">
                                <h5 class="fs-11 mb-0">{{list.method}}</h5>
                                <p class="fs-11 text-muted mb-0">{{list.reference}}</p>
                            </td>
                            <td class="text-center">{{list.fee}}</td>
                        </tr>
                    </tbody>
                    <tfoot class="table-light fs-10 tfoot-fixed">
                        <tr>
                            <th></th>
                            <th class="text-end text-muted ">Total</th>
                            <th class="text-center fw-semibold">{{selected.total}}</th>
                        </tr>
                    </tfoot>
                </table>
            </simplebar>
        </div>
        <div class="alert alert-warning alert-dismissible alert-label-icon label-arrow mt-3 mb-n2" role="alert">
            <i class="ri-alert-line label-icon"></i><strong>Generate TSR</strong> - this will convert the quotation to TSR 
            <button type="button" class="btn-close" aria-label="Close" data-bs-dismiss="alert"></button>
        </div>
           
        <template v-slot:footer>
            <b-button @click="hide()" variant="light" block>Cancel</b-button>
            <b-button @click="submit('ok')" variant="primary" :disabled="form.processing" block>Submit</b-button>
        </template>
    </b-modal>
</template>
<script>
import _ from 'lodash';
import { useForm } from '@inertiajs/vue3';
import simplebar from 'simplebar-vue';
export default {
    components: { simplebar },
    data(){
        return {
            currentUrl: window.location.origin,
            form: useForm({
                id: null,
                mode: null,
                laboratory_id: null,
                laboratory_type: null,
                customer_id: null,
                conforme_id: null,
                discount_id: null,
                total: null,
                due_at: null,
                subtotal: null,
                discount: null,
                option: 'tsr'
            }),
            selected: { 
                type:{},
                customer: { 
                    address:{
                        barangay:{},municipality:{},province:{},region:{}
                    }
                },
                status: {},
                discounted: {},
                purpose: {},
                conforme: {}
            },
            analyses: [],
            showModal: false,
            editable: false
        }
    },
    methods: { 
        show(data,analyses){
            this.analyses = analyses;
            this.selected = data;
            this.form.id = data.id;
            this.form.laboratory_id = data.laboratory.id;
            this.form.laboratory_type = data.type.id;
            this.form.customer_id = data.customer.id;
            this.form.conforme_id = data.conforme_id;
            this.form.due_at = data.due_at;
            this.form.discount_id = data.discounted.id;
            this.form.total = data.total;
            this.form.discount= data.discount;
            this.form.subtotal = data.subtotal;
            this.showModal = true;
        },
        submit(){
            this.form.post('/quotations',{
                preserveScroll: true,
                onSuccess: (response) => {
                    this.hide();
                },
            });
        },
        hide(){
            this.form.reset();
            this.editable = false;
            this.showModal = false;
        }
    }
}
</script>
<style>
.thead-fixed {
   position: sticky;
   top: 0;
   background-color: #fff; /* Set the background color for the fixed header */
   z-index: 1; /* Ensure the fixed header is above the scrolling content */
}
.tfoot-fixed {
   position: sticky;
   bottom: 0;
   background-color: #fff; /* Set the background color for the fixed header */
   z-index: 1; /* Ensure the fixed header is above the scrolling content */
}
</style>