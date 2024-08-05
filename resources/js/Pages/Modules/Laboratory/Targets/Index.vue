<template>
    <PageHeader title="Targets" pageTitle="List" />
    <b-row class="g-3">
        <div class="col-md-12">
            <div class="row g-3">
                <b-col lg="3" md="4" v-for="(item, index) of info.targets" :key="index">
                    <b-card no-body :class="item.color">
                        <b-card-body>
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1 ms-3">
                                    <p class="text-uppercase fw-semibold fs-12 text-muted mb-1">
                                        {{ item.name }}
                                    </p>
                                    <h4 class="mb-0">
                                        <span class="counter-value">
                                        0
                                        </span>
                                    </h4>
                                </div>
                            </div>
                        </b-card-body>
                    </b-card>
                </b-col>
                <b-col lg="9" class="mt-0">
                    <BCard no-body>
                        <BCardHeader class="align-items-center d-flex">
                            <BCardTitle class="mb-0 flex-grow-1">{{new Date().getFullYear()}} Target vs Accomplishment</BCardTitle>
                            <div class="flex-shrink-0">
                                <BButton @click="openCreate()" type="button" variant="soft-primary" size="sm">
                                    Set Targets
                                </BButton>
                            </div>
                        </BCardHeader>
                        <BCardBody style="height: calc(100vh - 385px); overflow: auto;">
                            <div class="table-responsive table-card">
                                <table class="table align-middle table-centered table-nowrap mb-3">
                                    <thead class="text-muted table-light fs-11">
                                        <tr>
                                            <th style="cursor: pointer;">#</th>
                                            <th width="50%" scope="col">KPI</th>
                                            <th width="20%" class="text-center">Target</th>
                                            <th width="20%" class="text-center">Accomplishment</th>
                                            <th width="7%" class="text-center">%</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </BCardBody>
                    </BCard>
                </b-col>
            </div>
        </div>
    </b-row>
    <Target ref="target"/>
</template>
<script>
import _ from 'lodash';
import Target from './Modals/Targets.vue';
import PageHeader from '@/Shared/Components/PageHeader.vue';
export default {
    components: { PageHeader, Target },
    props: ['info'],
    data(){
        return {
            currentUrl: window.location.origin,
            lists: [],
            meta: {},
            links: {},
            filter: {
                keyword: null,
                classification: null
            },
            index: null
        }
    },
    methods: {
        openCreate(){
            this.$refs.target.show();
        }
    }
   
}   
</script>