<template>
    <div class="col-md-4 mt-3">
        <BCard class="mb-3" no-body>
            <BLink class="card-header bg-warning-subtle" role="button">
                <div class="d-flex align-items-center">
                    <div class="flex-shrink-0" style="height: 2.1rem; width: 2.1rem;">
                        <span class="avatar-title bg-warning text-primary rounded-circle fs-4">
                            <i class="ri-add-circle-fill text-light align-middle"></i>
                        </span>
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <h4 class="mb-0"><span class="counter-value fs-14">Pending Tests</span></h4>
                        <p class="fs-12 text-muted mb-1">{{pendings.length}} Sample ready for test.</p>
                    </div>
                </div>
            </BLink>
        </BCard>
    
        <simplebar data-simplebar style="height: calc(100vh - 402px);">
            <BRow v-if="pendings.length > 0">
                <BCol lg="12" class="project-card mb-n3" v-for="(item, index) of pendings" :key="index">
                    <div class="card" style="cursor: pointer;" @click="openShow(item,'Pending')">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1 text-muted">
                                    <h6 class="card-title mb-n1 fs-14 fw-semibold"><span class="text-primary">{{item.sample.code}}</span></h6>
                                </div>
                                <div class="flex-shrink-0">
                                    <div class="text-muted"><i class="ri-calendar-event-fill me-1 align-bottom"></i>{{item.due}}</div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="d-flex flex-column h-100">
                                <div class="mt-auto">
                                    <div class="d-flex mb-2">
                                        <div class="flex-grow-1">
                                            <div class="text-muted">{{item.sample.name}}</div>
                                        </div>
                                        <div class="flex-shrink-0">
                                            <div>
                                                <i class="ri-list-check align-bottom me-1 text-muted"></i>{{(item.ongoing)}}/{{(item.analyses-item.completed)}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="progress progress-sm animated-progess">
                                        <div class="progress-bar bg-success" role="progressbar" aria-valuenow="34" aria-valuemin="0" aria-valuemax="100" :style="`width: ${item.progressBar};`"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="card-footer py-2">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1 text-muted fs-13">
                                    <i class="ri-list-check align-bottom me-1 text-muted"></i>{{(item.ongoing)}}/{{(item.analyses-item.completed)}}
                                </div>
                                <div class="flex-shrink-0">
                                    <div class="text-muted"><i class="ri-calendar-event-fill me-1 align-bottom"></i>{{item.due}}</div>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </BCol>
            </BRow>
            <div v-else class="alert alert-light mb-0 text-center" role="alert"><span class="fs-12 text-muted">No test available</span></div>
        </simplebar>
    </div>
    <div class="col-md-4 mt-3">
        <BCard class="mb-3" no-body>
            <BLink class="card-header bg-info-subtle" role="button">
                <div class="d-flex align-items-center">
                    <div class="flex-shrink-0" style="height: 2.1rem; width: 2.1rem;">
                        <span class="avatar-title bg-info text-primary rounded-circle fs-4">
                            <i class="ri-record-circle-fill text-light align-middle"></i>
                        </span>
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <h4 class="mb-0"><span class="counter-value fs-14">Ongoing Tests</span></h4>
                        <p class="fs-12 text-muted mb-1">{{ongoings.length}} ongoing analyzation.</p>
                    </div>
                </div>
            </BLink>
        </BCard>
        <simplebar data-simplebar style="height: calc(100vh - 402px);">
        <BRow v-if="ongoings.length > 0">
            <BCol lg="12" class="project-card mb-n3" v-for="(item, index) of ongoings" :key="index">
                <div class="card" style="cursor: pointer;" @click="openShow(item,'Ongoing')">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1 text-muted">
                                <h6 class="card-title mb-n1 fs-14 fw-semibold"><span class="text-primary">{{item.sample.code}}</span></h6>
                            </div>
                            <div class="flex-shrink-0">
                                <div class="text-muted"><i class="ri-calendar-event-fill me-1 align-bottom"></i>{{item.due}}</div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="d-flex flex-column h-100">
                            <div class="mt-auto">
                                <div class="d-flex mb-2">
                                    <div class="flex-grow-1">
                                        <div class="text-muted">{{item.sample.name}}</div>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <div>
                                            <i class="ri-list-check align-bottom me-1 text-muted"></i>0/{{item.ongoing}}
                                        </div>
                                    </div>
                                </div>
                                <div class="progress progress-sm animated-progess">
                                    <div class="progress-bar bg-success" role="progressbar" aria-valuenow="34" aria-valuemin="0" aria-valuemax="100" :style="`width: ${item.progressBar};`"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="card-footer py-2">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1 text-muted fs-13">
                               
                            </div>
                            <div class="flex-shrink-0">
                                <div class="text-muted"><i class="ri-calendar-event-fill me-1 align-bottom"></i> {{item.due}}</div>
                            </div>
                        </div>
                    </div> -->
                </div>
            </BCol>
        </BRow>
        <div v-else class="alert alert-light mb-0 text-center" role="alert"><span class="fs-12 text-muted">No test available</span></div>
        </simplebar>
    </div>
    <div class="col-md-4 mt-3">
        <BCard class="mb-3" no-body>
            <BLink class="card-header bg-success-subtle" role="button">
                <div class="d-flex align-items-center">
                    <div class="flex-shrink-0" style="height: 2.1rem; width: 2.1rem;">
                        <span class="avatar-title bg-success text-primary rounded-circle fs-4">
                            <i class="ri-checkbox-circle-fill text-light align-middle"></i>
                        </span>
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <h4 class="mb-0"><span class="counter-value fs-14">Completed Tests</span></h4>
                        <p class="fs-12 text-muted mb-1">{{completeds.length}} samples completed.</p>
                    </div>
                </div>
            </BLink>
        </BCard>
        <simplebar data-simplebar style="height: calc(100vh - 402px);">
            <BRow v-if="completeds.length > 0">
            <BCol lg="12" class="project-card mb-n3" v-for="(item, index) of completeds" :key="index">
                <div class="card" style="cursor: pointer;" @click="openShow(item,'Completed')">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1 text-muted">
                                <h6 class="card-title mb-n1 fs-14 fw-semibold"><span class="text-primary">{{item.sample.code}}</span></h6>
                            </div>
                            <div class="flex-shrink-0">
                                <div class="text-muted"><i class="ri-calendar-event-fill me-1 align-bottom"></i>{{item.due}}</div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="d-flex flex-column h-100">
                            <div class="mt-auto">
                                <div class="d-flex mb-2">
                                    <div class="flex-grow-1">
                                        <div class="text-muted">{{item.sample.name}}</div>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <div>
                                            <i class="ri-list-check align-bottom me-1 text-muted"></i>{{item.completed}}/{{item.analyses}}
                                        </div>
                                    </div>
                                </div>
                                <div class="progress progress-sm animated-progess">
                                    <div class="progress-bar bg-success" role="progressbar" aria-valuenow="34" aria-valuemin="0" aria-valuemax="100" :style="`width: ${(item.completed/item.analyses)*100}%;`"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                  
                </div>
            </BCol>
        </BRow>
        <div v-else class="alert alert-light mb-0 text-center" role="alert"><span class="fs-12 text-muted">No test available</span></div>
        </simplebar>
    </div>
    <Show ref="show"/>
</template>
<script>
import Show from '../Modals/Show.vue';
import simplebar from "simplebar-vue";
export default {
    components: { simplebar, Show },
    props: ['samples','searchQuery'],
    data() {
        return {
            showSoon: false,
            showDueToday: false,
            showOverdue: false 
        };
    },
    computed: {
        currentDate() {
            return new Date().toISOString().split('T')[0];
        },
        futureDate() {
            const date = new Date();
            date.setDate(date.getDate() + 5);
            return date.toISOString().split('T')[0];
        },
        pendings() {
            return this.samples.filter(item => {
                const matchesSearch = this.matchesSearch(item);
                const isDueToday = this.showDueToday ? item.due_at >= this.currentDate && item.due_at <= this.futureDate : true;
                const isOverdue = this.showOverdue ? item.due_at < this.currentDate : true;
                return item.pending > 0 && matchesSearch  && isDueToday && isOverdue;
            });
        },
        ongoings() {
            return this.samples.filter(item => {
                const matchesSearch = this.matchesSearch(item);
                const isDueToday = this.showDueToday ? item.due_at >= this.currentDate && item.due_at <= this.futureDate : true;
                const isOverdue = this.showOverdue ? item.due_at < this.currentDate : true;
                return item.ongoing > 0 && matchesSearch && isDueToday && isOverdue;
            });
        },
        completeds() {
            return this.samples.filter(item => {
                const matchesSearch = this.matchesSearch(item);
                const isDueToday = this.showDueToday ? item.due_at >= this.currentDate && item.due_at <= this.futureDate : true;
                const isOverdue = this.showOverdue ? item.due_at < this.currentDate : true;
                return item.completed > 0 && matchesSearch && isDueToday && isOverdue;
            });
        }
    },
    methods: {
        toggleDueTodayFilter(data) {
            if(data === 'Due Soon'){
                this.showOverdue = false;
                this.showDueToday = !this.showDueToday;
            }else if(data === 'Overdue Request'){
                this.showDueToday = false;
                this.showOverdue = !this.showOverdue;
            }
        },
        matchesSearch(item) {
            if (!this.searchQuery) return true; // Show all if no search term
            return item.sample.code.toLowerCase().includes(this.searchQuery.toLowerCase());
        },
        openShow(data,status){
            this.$refs.show.show(data,status);
        },  
    }
}
</script>