<template>
   <BCard no-body class="card-height-100" style="height: 350px;">
        <BCardHeader class="align-items-center d-flex">
            <BCardTitle class="mb-0 flex-grow-1">Top Count Request</BCardTitle>
            <div class="flex-shrink-0">
                <BButton @click="openView()" type="button" variant="soft-primary" size="sm">
                    View All
                </BButton>
            </div>
        </BCardHeader>

        <BCardBody>
            <div class="table-responsive table-card">
                <table class="table align-middle table-centered table-nowrap mb-3">
                    <thead class="text-muted table-light fs-11">
                        <tr>
                            <th style="cursor: pointer;">  
                                <!-- <i @click="fetch('asc')" v-if="sort == 'desc'" class="ri-sort-asc"></i> 
                                <i @click="fetch('desc')" v-else class="ri-sort-desc"></i>  -->
                                #
                            </th>
                            <th scope="col">Name</th>
                            <th class="text-center" scope="col">#</th>
                            <th class="text-center" scope="col">%</th>
                        </tr>
                    </thead>
                    <tbody>
                       <tr v-for="(list,index) in tsr.data" v-bind:key="index">
                            <td>{{index + 1}}</td>
                            <td>{{list.customer_name.name}} {{ (list.name == 'Main') ? '' : ' - '+list.name }}</td>
                            <td class="text-center">{{list.tsrs_count}} </td>
                            <td class="text-center">{{percentage(list.tsrs_count)}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </BCardBody>
        <Tsr :total="total" ref="tsr"/>
    </BCard>
</template>
<script>
import _ from 'lodash';
import Tsr from '../Modals/Tsr.vue';
export default {
    props: ['total','tsr'],
    components: { Tsr },
    data(){
        return {
            sort: null,
        }
    },
    methods: {
        percentage(data){
            if(data != 0){
                return (_.divide(data, this.total)*100).toFixed(2)+'%';
            }else{ 
                return '0%';
            }
        },
        openView(){
            this.$refs.tsr.show();
        }
    }
}
</script>