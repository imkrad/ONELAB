<template>
    <Head title="Dashboard"/>
    <PageHeader title="Dashboard" pageTitle="Finance" />
    <b-row>
        <div class="col-md-12">
            <div class="row g-3">
                <div class="col-md-8">
                    <div class="row g-3 mb-n2">
                        <b-col lg="4" md="6" v-for="(item, index) of dropdowns.counts" :key="index">
                            <b-card no-body>
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
                                                {{ formatMoney(item.total) }}
                                                </span>
                                            </h4>
                                        </div>
                                    </div>
                                </b-card-body>
                            </b-card>
                        </b-col>
                    </div>
                    <div class="card">
                        <div class="card-body" style="height: calc(100vh - 320px); overflow: auto;">
                            <Lists 
                            :collections="dropdowns.collections" 
                            :payments="dropdowns.payments" 
                            :deposits="dropdowns.deposits" 
                            :orseries="dropdowns.orseries"
                            :statuses="dropdowns.statuses"
                            />
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body" style="height: calc(100vh - 225px); overflow: auto;">
                            <div class="d-grid gap-2" v-if="dropdowns.orseries">
                                <button v-if="dropdowns.orseries.length > 0" class="btn btn-md btn-soft-success btn-label waves-effect waves-light" type="button"><i class="bx bxs-webcam label-icon align-middle fs-16 me-2"></i>OR Series : {{dropdowns.orseries[0].name}}</button>
                                <button @click="addSeries" v-else class="btn btn-md btn-soft-danger btn-label waves-effect waves-light" type="button"><i class="bx bxs-webcam label-icon align-middle fs-16 me-2"></i>No OR Series found.</button>
                            </div>
                            <hr class="text-muted"/>
                            <b-list-group class="list-group-fill-success">
                                <b-list-group-item class="list-group-item-action" v-for="(list,index) in statuses" v-bind:key="index">
                                    <i class="ri-record-circle-fill align-middle me-2" :class="list.others"></i>{{list.name}} <span class="text-muted fs-11">({{list.count}})</span> <span class="float-end">{{formatMoney(list.total)}}</span>
                                </b-list-group-item>
                            </b-list-group>
                            <hr class="text-muted"/>
                            <b-list-group class="list-group-fill-success">
                                <b-list-group-item class="list-group-item-action" v-for="(list,index) in payments" v-bind:key="index">
                                    <i class="ri-record-circle-line text-primary align-middle me-2"></i>{{list.name}} <span class="text-muted fs-11">({{list.count}})</span> <span class="float-end">{{formatMoney(list.total)}}</span>
                                </b-list-group-item>
                            </b-list-group>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </b-row>
    <Series @update="update" ref="series"/>
</template>
<script>
import Series from './Modals/Series.vue';
import Lists from './Components/Lists.vue';
import PageHeader from '@/Shared/Components/PageHeader.vue';
export default {
    props: ['dropdowns','statuses','payments'],
    components: { PageHeader, Lists, Series },
    data(){
        return {
            laboratory: null,
        }
    },
    methods: {
        addSeries(){
            this.$refs.series.show();
        },
        formatMoney(value) {
            let val = (value/1).toFixed(2).replace(',', '.')
            return '₱'+val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")
        },
        update(){
            
        }
    }
}
</script>