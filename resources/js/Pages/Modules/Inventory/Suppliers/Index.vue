<template>
    <Head title="Suppliers"/>
    <PageHeader title="List of Suppliers" pageTitle="Inventory" />
     <div class="chat-wrapper d-lg-flex gap-1 mx-n4 mt-n4 p-1">
         <!-- style="max-width: 400px; min-width: 400px;" -->
        <div class="file-manager-sidebar">  
            <div class="p-3 d-flex flex-column h-100">
               
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