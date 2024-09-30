<template>
    <PageHeader title="Accomplishments Report" pageTitle="List" />
    <div class="row g-1">
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
        <div class="col-md-12 mt-n2">
            <div class="card">
                <div class="card-body" style="height: calc(100vh - 310px); overflow: auto;">
                    <div class="table-responsive">
                        <table class="table table-nowrap table-bordered align-middle mb-0">
                            <thead class="table-light thead-fixed">
                                <tr class="fs-11">
                                    <th style="width: 20%;">Laboratory</th>
                                    <th style="width: 8%;" class="text-center">No. of Requests</th>
                                    <th style="width: 8%;" class="text-center">No. of Samples</th>
                                    <th style="width: 8%;" class="text-center">No. of Analyses</th>
                                    <th style="width: 15%;" class="text-center">Actual Fees Collected</th>
                                    <th style="width: 12%;" class="text-center">Gratis</th>
                                    <th style="width: 12%;" class="text-center">Discount</th>
                                    <th style="width: 12%;" class="text-center">Gross</th>
                                    <th style="width: 4%;"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(list,index) in laboratories" v-bind:key="index" >
                                    <td> {{ list[0] }}</td>
                                    <td class="text-center"> {{ list[1] }}</td>
                                    <td class="text-center"> {{ list[2] }}</td>
                                    <td class="text-center"> {{ list[3] }}</td>
                                    <td class="text-center"> {{ list[4] }}</td>
                                    <td class="text-center"> {{ list[5] }}</td>
                                    <td class="text-center"> {{ list[6] }}</td>
                                    <td class="text-center"> {{ list[7] }}</td>
                                    <td class="text-center">
                                        <b-button @click="openView(list[8])" variant="soft-info" v-b-tooltip.hover title="View" size="sm">
                                            <i class="ri-printer-fill align-bottom"></i>
                                        </b-button>
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr class="table-light fs-12" v-for="(list,index) in total" v-bind:key="index" >
                                    <th> {{ list[0] }}</th>
                                    <th class="text-center"> {{ list[1] }}</th>
                                    <th class="text-center"> {{ list[2] }}</th>
                                    <th class="text-center"> {{ list[3] }}</th>
                                    <th class="text-center"> {{ list[4] }}</th>
                                    <th class="text-center"> {{ list[5] }}</th>
                                    <th class="text-center"> {{ list[6] }}</th>
                                    <th class="text-center"> {{ list[7] }}</th>
                                    <th class="text-center"></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
       
</template>
<script>
import Multiselect from '@/Shared/Components/Forms/Multiselect.vue';
import PageHeader from '@/Shared/Components/PageHeader.vue';
import TextInput from '@/Shared/Components/Forms/TextInput.vue';
export default {
    components: { PageHeader, Multiselect, TextInput },
    props: ['years','info'],
    data(){
        return {
            month: this.info.month,
            year: this.info.year,
            laboratories: [],
            total: [],
            months: ['January','February','March','April','May','June','July','August','September','October','November','December']
        }
    },
    watch: {
        "month"(newVal){
            this.fetch();
        },
        "year"(newVal){
            this.fetch();
        }
    },
    created(){
        this.fetch();
    },
    methods: {
        fetch(){
            axios.get('/reports',{
                params : {
                    month: this.month,
                    year: this.year,
                    option: 'lists'
                }
            })
            .then(response => {
                this.laboratories = response.data.laboratories.lists; 
                this.total = response.data.laboratories.footer;         
            })
            .catch(err => console.log(err));
        },
        openView(id){
            window.open('/reports?option=report-or&month='+this.month+'&year='+this.year+'&laboratory='+id);
        }
    }
}
</script>