<template>
    <PageHeader title="Top 10 Reports" pageTitle="List" />
    <div class="row g-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row g-1">
                        <div class="col-md-8">
                            <Multiselect :options="types" v-model="laboratory" :searchable="true" label="name" placeholder="Select Laboratory"/>
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
        <div class="col-md-4 mt-n2">
            <div class="card">
                <BCardHeader class="align-items-center d-flex">
                    <BCardTitle class="mb-0 flex-grow-1">Top 10 Samples</BCardTitle>
                    <div class="flex-shrink-0">
                        <!-- <BButton @click="openView()" type="button" variant="soft-primary" size="sm">
                            View All
                        </BButton> -->
                    </div>
                </BCardHeader>
                <!-- style="height: calc(100vh - 310px); overflow: auto;" -->
                <BCardBody>
                    <table class="table align-middle table-centered table-nowrap mb-3">
                        <thead class="text-muted table-light fs-11">
                            <tr>
                                <th width="5%;"> #</th>
                                <th width="80%;">Name</th>
                                <th width="15%;" class="text-center" scope="col">Count</th>
                            </tr>
                        </thead>
                        <tbody>
                        <tr v-for="(list,index) in samples" v-bind:key="index">
                                <td>{{index + 1}}</td>
                                <td>{{list.name }}</td>
                                <td class="text-center">{{list.count}}</td>
                            </tr>
                        </tbody>
                    </table>
                </BCardBody>
            </div>
        </div>
        <div class="col-md-4 mt-n2">
            <div class="card">
                <BCardHeader class="align-items-center d-flex">
                    <BCardTitle class="mb-0 flex-grow-1">Top 10 Analyses</BCardTitle>
                    <div class="flex-shrink-0">
                        <!-- <BButton @click="openView()" type="button" variant="soft-primary" size="sm">
                            View All
                        </BButton> -->
                    </div>
                </BCardHeader>
                <!-- style="height: calc(100vh - 310px); overflow: auto;" -->
                <BCardBody>
                    <table class="table align-middle table-centered table-nowrap mb-3">
                        <thead class="text-muted table-light fs-11">
                            <tr>
                                <th width="5%;"> #</th>
                                <th width="80%;">Name</th>
                                <th width="15%;" class="text-center" scope="col">Count</th>
                            </tr>
                        </thead>
                        <tbody>
                        <tr v-for="(list,index) in analyses" v-bind:key="index">
                                <td>{{index + 1}}</td>
                                <td>{{list.testservice.testname.name }}</td>
                                <td class="text-center">{{list.count}}</td>
                            </tr>
                        </tbody>
                    </table>
                </BCardBody>
            </div>
        </div>
        <div class="col-md-4 mt-n2">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <BCardHeader class="align-items-center d-flex">
                            <BCardTitle class="mb-0 flex-grow-1">Gratis Services</BCardTitle>
                            <div class="flex-shrink-0">
                                <!-- <BButton @click="openView()" type="button" variant="soft-primary" size="sm">
                                    View All
                                </BButton> -->
                            </div>
                        </BCardHeader>
                        <BCardBody>
                            <table class="table align-middle table-centered table-nowrap mb-3">
                                <thead class="text-muted table-light fs-11">
                                    <tr>
                                        <th width="80%;">Name</th>
                                        <th width="15%;" class="text-center" scope="col">Count</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(count, type) in gratis" :key="type" style="cursor: pointer;" @click="openGratis(type)">
                                        <td>{{ type }}</td>
                                        <td class="text-center">{{ count }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </BCardBody>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <Gratis ref="gratis"/>
</template>
<script>
import Gratis from './Modals/Gratis.vue';
import Multiselect from '@/Shared/Components/Forms/Multiselect.vue';
import PageHeader from '@/Shared/Components/PageHeader.vue';
import TextInput from '@/Shared/Components/Forms/TextInput.vue';
export default {
    components: { PageHeader, Multiselect, TextInput, Gratis },
    props: ['info','years','types'],
    data(){
        return {
            month: this.info.month,
            year: this.info.year,
            laboratories: [],
            samples: [],
            analyses: [],
            gratis: {},
            laboratory: null,
            total: [],
            months: ['January','February','March','April','May','June','July','August','September','October','November','December']
        }
    },
    watch: {
        "laboratory"(newVal){
            this.fetch();
        },
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
                    laboratory: this.laboratory,
                    month: this.month,
                    year: this.year,
                    option: 'tops'
                }
            })
            .then(response => {
                this.samples = response.data.samples; 
                this.analyses = response.data.analyses;   
                this.gratis = response.data.gratis;     
            })
            .catch(err => console.log(err));
        },
        openGratis(data){
            this.$refs.gratis.show(data,this.month,this.laboratory,this.year);
        }
    }
}
</script>