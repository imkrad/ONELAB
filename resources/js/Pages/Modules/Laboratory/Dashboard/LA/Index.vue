<template>
    <Head title="Dashboard"/>
    <PageHeader title="Dashboard" pageTitle="Menu" />
    <div class="chat-wrapper d-lg-flex gap-1 mx-n4 mt-n4 p-1">
        <div class="file-manager-sidebar">
            <Sidebar @open="openSample"/>
        </div>
        <div class="file-manager-content w-100 p-4 pb-0" style="height: calc(100vh - 180px); overflow: auto;" ref="box">
            <List :disposals="dropdowns.disposals" ref="list"/>
        </div>
    </div>
</template>
<script>
import List from './Components/Lists.vue';
import Sidebar from './Components/Sidebar.vue';
import PageHeader from '@/Shared/Components/PageHeader.vue';
export default {
    components: { PageHeader, List, Sidebar },
    props:['dropdowns'],
    methods: {
        openSample(data){
            this.$refs.list.openSample(data);
        }
    }
}
</script>