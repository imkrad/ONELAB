<template>
     <PageHeader title="Reports" pageTitle="List" />
     <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row g-1">
                        <div class="col-md-8">
                            
                        </div>
                        <div class="col-md-2">
                            <Multiselect :options="months" v-model="month" :searchable="true" label="name" placeholder="Select Month"/>
                        </div>
                        <div class="col-md-2">
                            <Multiselect :options="years" v-model="year" :searchable="true" label="name" placeholder="Select Year"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-xl-3">
            <div class="card ribbon-box right overflow-hidden">

                <div class="card-body text-center p-4">
                    <h5 class="mb-1 mt-4">OP REPORTS</h5>
                    <p class="text-muted mb-4">List of OP for the month of {{ month }}</p>
                    <div @click="printOp()" class="mt-4"><button class="btn btn-primary w-100">View</button></div>
                </div>
                
            </div>
        </div>
        <div class="col-lg-6 col-xl-3">
            <div class="card ribbon-box right overflow-hidden">

                <div class="card-body text-center p-4">
                    <h5 class="mb-1 mt-4">OR REPORTS</h5>
                    <p class="text-muted mb-4">List of OR for the month of {{ month }}</p>
                    <div @click="printOr()" class="mt-4"><button class="btn btn-primary w-100">View</button></div>
                </div>
                
            </div>
        </div>
     </div>
</template>
<script>
import Multiselect from '@/Shared/Components/Forms/Multiselect.vue';
import PageHeader from '@/Shared/Components/PageHeader.vue';
export default {
    components: { PageHeader, Multiselect },
    props: ['info','years','types'],
    data(){
        return {
            month: this.info.month,
            year: this.info.year,
            months: ['January','February','March','April','May','June','July','August','September','October','November','December']
        }     
    },
    methods: {
        printOp(){
            window.open('/finance?option=report-op&month='+this.month+'&year='+this.year);
        },
        printOr(){
            window.open('/finance?option=report-or&month='+this.month+'&year='+this.year);
        }
    }
}
</script>