<template>
    <Head title="Items"/>
    <PageHeader title="List of Items" pageTitle="Inventory" />
     <div class="chat-wrapper d-lg-flex gap-1 mx-n4 mt-n4 p-1">
         <!-- style="max-width: 400px; min-width: 400px;" -->
        <div class="file-manager-sidebar">  
            <div class="p-3 d-flex flex-column h-100">
                <!-- <div class="mt-2 pt-2">
                    <h6 class="fs-11 text-muted text-uppercase mb-3 mt-0">Categories</h6>
                    <div class="d-flex mb-2" v-for="(list,index) in dropdowns.categories" v-bind:key="index">
                        <div class="flex-grow-1">
                            <p class="text-truncate text-muted fs-14 mb-0">
                                <i class="mdi mdi-circle align-middle me-2" :class="'text-'+list.color"></i>{{list.name}} 
                            </p>
                        </div>
                        <div class="flex-shrink-0">
                            <p class="mb-0">1</p>
                        </div>
                    </div>
                </div> -->
                <h5 class="fs-11 text-uppercase text-muted">CATEGORIES</h5>
                <div class="table-responsive">
                    <table class="table table-borderless table-sm table-centered align-middle table-nowrap">
                        <tbody class="border-0">
                            <tr v-for="(list,index) in dropdowns.categories" v-bind:key="index">
                                <td>
                                    <h4 class="text-truncate fs-13 fs-medium mb-0"><i class="ri-checkbox-blank-circle-fill align-middle fs-14 me-2" :class="'text-'+list.color"></i>{{list.name}}</h4>
                                </td>
                                <td class="text-end">
                                    <p class="fw-bold mb-0 fs-12" :class="'text-'+list.color">2</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <hr class="text-muted mt-n1 mb-3"/>
                <h6 class="fs-11 text-muted text-uppercase">LABORATORY</h6>
                <div class="table-responsive">
                    <table class="table table-borderless table-sm table-centered align-middle table-nowrap">
                        <tbody class="border-0">
                            <tr v-for="(list,index) in dropdowns.categories" v-bind:key="index">
                                <td>
                                    <h4 class="text-truncate fs-13 fs-medium mb-0"><i class="ri-stop-fill align-middle fs-14 me-2" :class="'text-'+list.color"></i>{{list.name}}</h4>
                                </td>
                                <td class="text-end">
                                    <p class="fw-bold mb-0 fs-12" :class="'text-'+list.color">2</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="file-manager-content w-100 p-4 pb-0" style="height: calc(100vh - 180px); overflow: auto;" ref="box">
            <Lists :dropdowns="dropdowns"/>
        </div>
    </div>
</template>
<script>
import Lists from './Components/Lists.vue';
import PageHeader from '@/Shared/Components/PageHeader.vue';
export default {
    components: { PageHeader, Lists },
    props: ['dropdowns']
}
</script>