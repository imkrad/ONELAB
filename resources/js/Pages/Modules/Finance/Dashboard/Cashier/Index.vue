<template>
    <Head title="Dashboard"/>
    <PageHeader title="Dashboard" pageTitle="Cashier" />
    <b-row>
        <div class="col-md-12">
            <div class="row g-3">

                <div class="col-md-12">
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
                                                {{ (index == 0) ? item.total : formatMoney(item.total) }}
                                                </span>
                                            </h4>
                                        </div>
                                    </div>
                                </b-card-body>
                            </b-card>
                        </b-col>
                    </div>
                </div>
                <div class="col-md-8 mt-1">
                    <div class="card">
                        <div class="card-body" style="height: calc(100vh - 320px); overflow: auto;">
                            <Lists 
                            :deposits="dropdowns.deposits" 
                            :orseries="dropdowns.orseries"
                            :collections="dropdowns.collections"
                            :payments="dropdowns.payments"
                            />
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mt-1">
                    <div class="card">
                        <div class="card-body" style="height: calc(100vh - 320px); overflow: auto;">
                            <Latest :receipts="dropdowns.receipts"/>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </b-row>
</template>
<script>
import Lists from './Components/Lists.vue';
import Latest from './Components/Latest.vue';
import PageHeader from '@/Shared/Components/PageHeader.vue';
export default {
    components: { PageHeader, Lists, Latest },
    props: ['dropdowns'],
    data(){
        return {
            laboratory: null,
        }
    },
    methods: {
        formatMoney(value) {
            let val = (value/1).toFixed(2).replace(',', '.')
            return '₱'+val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")
        },
    }
}
</script>