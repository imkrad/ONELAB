<template>
    <Head title="Laboratory Insights"/>
    <PageHeader title="Laboratory Insights" pageTitle="Menu" />
    <BRow style="height: calc(100vh - 225px); overflow: auto;">
        <BCol xl="8">
            <Info/>
        </BCol>
        <BCol xl="4"></BCol>
        <BCol xl="4">
            <Tsr :tsr="laboratory.tsrs" :total="laboratory.total_request"/>
        </BCol>
        <BCol xl="4">
            <Earning :earnings="laboratory.earnings" :total="laboratory.total_request"/>
        </BCol>
        <BCol xl="4">
            <Sample :samples="laboratory.samples" :total="laboratory.total_request"/>
        </BCol>
    </BRow>
</template>
<script>
import Tsr from './Components/Tsr.vue';
import Info from './Components/Info.vue';
import Sample from './Components/Sample.vue';
import Earning from './Components/Earning.vue';
import PageHeader from '@/Shared/Components/PageHeader.vue';
export default {
    components: { PageHeader, Tsr, Earning, Info, Sample },
    props: ['laboratory']
}
</script>