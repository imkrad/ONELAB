<template>
    <b-col lg="12">
        <b-card no-body>
            <div class="bg-info-subtle">
                <b-card-body class="pb-0 px-4">
                    <b-row class="mb-3">
                        <b-col md>
                            <b-row class="align-items-center g-3">
                                <b-col md>
                                    <div>
                                        <h4 class="fw-semibold text-primary">{{selected.customer.name}}</h4>
                                        <div class="hstack gap-3 flex-wrap">
                                            <div>
                                                <i class="ri-map-pin-2-fill align-bottom me-1"></i>
                                                {{selected.customer.address.barangay.name}},
                                                {{selected.customer.address.municipality.name}},
                                                {{selected.customer.address.province.name}},
                                                {{selected.customer.address.region.region}}
                                            </div>
                                            <div class="vr"></div>
                                            <div><i class="ri-account-circle-fill align-bottom me-1"></i>{{selected.conforme}}</div>
                                                <div class="vr"></div>
                                            <div><i class="ri-phone-fill align-bottom me-1"></i>{{selected.conforme_no}}</div>
                                        </div>
                                    </div>
                                </b-col>
                            </b-row>
                        </b-col>
                        <b-col md="auto">
                            <div class="hstack gap-1 flex-wrap mt-2">
                                <b-button @click="openSave(selected.id)" variant="soft-primary" v-b-tooltip.hover title="Save">
                                    <i class="ri-delete-bin-2-fill align-bottom"></i> Save
                                </b-button>
                                <Link href="/requests">
                                    <button type="button" class="btn py-0 text-body" style="cursor:pointer; font-size: 25px;">
                                        <i class="ri-close-circle-fill"></i>
                                    </button>
                                    <!-- <i @click="showModal=false" class="ri-close-circle-fill" style="cursor:pointer; font-size: 30px;"></i>
                                    <button class="btn btn-sm btn-soft-info me-1" type="button" data-original-title="View"><i class="ri-eye-fill align-bottom"></i></button>  -->
                                </Link>
                            </div>
                        </b-col>
                    </b-row>
                    
                </b-card-body>
            </div>
        </b-card>
    </b-col>
    <Save ref="save"/>
</template>
<script>
import Save from '../Modals/Save.vue';
export default {
    components: { Save }, 
    props:['selected'],
    methods: {
        openSave(id){
            this.$refs.save.show(id);
        },
    }
}
</script>