<template>
   <BCard no-body class="card-height-100" style="height: 350px;">
        <BCardHeader class="align-items-center d-flex">
            <BCardTitle class="mb-0 flex-grow-1">Count Request</BCardTitle>
            <div class="flex-shrink-0">
                <BButton @click="openView()" type="button" variant="soft-primary" size="sm">
                    View All
                </BButton>
            </div>
        </BCardHeader>

        <BCardBody>
            <div class="table-responsive table-card">
                <simplebar data-simplebar style="height: 270px;">
                <table class="table align-middle table-centered table-nowrap mb-3">
                    <thead class="text-muted table-light fs-11 thead-fixed">
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
                            <td>{{list.name}}</td>
                            <td class="text-center">{{list.tsrs_count}} </td>
                            <td class="text-center">{{percentage(list.tsrs_count)}}</td>
                        </tr>
                    </tbody>
                </table>
                </simplebar>
            </div>
        </BCardBody>
    </BCard>
    <Tsr ref="tsr"/>
</template>
<script>
import _ from 'lodash';
import Tsr from '../Modals/Tsr.vue';
import simplebar from "simplebar-vue";
export default {
    components: { simplebar, Tsr },
    props: ['total','tsr'],
    data(){
        return {
            sort: null,
        }
    },
    methods: {
        percentage(data){
            return (_.divide(data, this.total)*100).toFixed(2)+'%';
        },
        openView(){
            this.$refs.tsr.show();
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
</style>