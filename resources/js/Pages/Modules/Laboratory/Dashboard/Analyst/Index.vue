<template lang="">
    <Head title="Dashboard"/>
    <PageHeader title="Dashboard" pageTitle="Lab Analyst" />
    
    <b-row class="g-4">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body" style="height: calc(100vh - 220px); overflow: auto;" >
                    <p class="text-muted text-uppercase fs-12 fw-medium mb-2">My Tasks</p>
                    <b-list-group>
                        <BListGroupItem v-for="(list,index) in tasks" v-bind:key="index" style="cursor: pointer;">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <div class="avatar-xs">
                                        <div class="avatar-title rounded" :class="list.color">
                                        <i class="fs-15" :class="list.icon"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h5 class="mb-0 fs-12">{{list.name}}</h5>
                                    <p class="mb-0 fs-11 text-muted">{{list.description}}</p>
                                </div>
                                <span class="text-muted fs-12">{{list.count}} </span>
                            </div>
                        </BListGroupItem>
                    </b-list-group>
                    <p class="text-muted text-uppercase fs-12 fw-medium mb-2 mt-3">Reminders</p>
                    <b-list-group>
                        <BListGroupItem @click="filterReminder(list.name)" v-for="(list,index) in reminders" v-bind:key="index" style="cursor: pointer;" :class="{ 'bg-info-subtle': isActive(list.name) }">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <div class="avatar-xs">
                                        <div class="avatar-title rounded" :class="list.color">
                                        <i class="fs-15" :class="list.icon"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h5 class="mb-0 fs-12">{{list.name}}</h5>
                                    <p class="mb-0 fs-11 text-muted">{{list.description}}</p>
                                </div>
                                <span class="text-muted fs-12">{{list.count}} </span>
                            </div>
                        </BListGroupItem>
                    </b-list-group>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-12 mb-n4">
                    <div class="card">
                        <div class="card-body">
                            <b-col lg>
                                <div class="input-group mb-0">
                                    <span class="input-group-text"> <i class="ri-search-line search-icon"></i></span>
                                    <input type="text"  placeholder="Search Sample Code" v-model="searchQuery" class="form-control" style="width: 65%;">
                                    <select class="form-select" id="inputGroupSelect01">
                                        <option  @click="setDisplay('sample')" selected>Show by Sample</option>
                                    </select>
                                    <b-button type="button" variant="primary"  @click="refresh()">
                                        <i class="bx bx-refresh search-icon"></i>
                                    </b-button>
                                </div>
                            </b-col>
                        </div>
                    </div>
                </div>
                <Sample v-if="mode === 'sample'" :samples="samples" :search-query="searchQuery" ref="sample"/>
            </div>
        </div>
    </b-row>
    <View ref="view"/>
    <Show ref="show"/>
</template>
<script>
import Sample from './Display/Sample.vue';
import simplebar from "simplebar-vue";
import View from './Modals/View.vue';
import Show from './Modals/Show.vue';
import PageHeader from '@/Shared/Components/PageHeader.vue';
export default {
    components: { PageHeader, View, Show, simplebar, Sample },
    props: ['tsrs','samples','reminders','tasks'],
    data(){
        return {
            currentUrl: window.location.origin,
            searchTerm: '',
            matchedRowIndex1: null,
            matchedRowIndex2: null,
            matchedRowIndex3: null,
            matches1: [],
            matches2: [],
            matches3: [],
            searchQuery: '',
            mode: 'sample',
            activeReminder: null,
            activeList: null
        }
    },
    methods: {
        setDisplay(mode){
            this.mode = mode;
        },
        filterReminder(data){
            (data == this.activeList) ? this.activeList = null : this.activeList = data;
            this.$refs.sample.toggleDueTodayFilter(data);
        },
        isActive(name) {
            return this.activeList === name;
        },
        search() {
            const searchTerm = this.searchTerm.toLowerCase();
            const matchedIndices1 = this.samples.pending.reduce((indices, sample, index) => {
                if (sample.sample.code.toLowerCase().includes(searchTerm)) {
                    indices.push(index);
                }
                return indices;
            }, []);
            this.matches1 = matchedIndices1;
            if (matchedIndices1.length > 0 && searchTerm !== '') {
                const closestIndex = matchedIndices1.reduce((closest, currentIndex) => {
                    const closestDistance = Math.abs(closest - searchTerm.length);
                    const currentDistance = Math.abs(currentIndex - searchTerm.length);
                    return currentDistance > closestDistance ? currentIndex : closest;
                }, matchedIndices1[0]);

                this.matchedRowIndex1 = closestIndex;

                const rowId = 'row-' + closestIndex;
                const matchedRow = document.getElementById(rowId);

                if(matchedRow){
                    matchedRow.scrollIntoView({ behavior: 'smooth', block: 'center' });
                }
            }else {
                this.matchedRowIndex1 = null;
                this.matches1 = [];
            }
    //////////
            const matchedIndices2 = this.samples.ongoing.reduce((indices, sample, index) => {
                if (sample.sample.code.toLowerCase().includes(searchTerm)) {
                    indices.push(index);
                }
                return indices;
            }, []);
            this.matches2 = matchedIndices2;
            if (matchedIndices2.length > 0 && searchTerm !== '') {
                const closestIndex = matchedIndices2.reduce((closest, currentIndex) => {
                    const closestDistance = Math.abs(closest - searchTerm.length);
                    const currentDistance = Math.abs(currentIndex - searchTerm.length);
                    return currentDistance > closestDistance ? currentIndex : closest;
                }, matchedIndices2[0]);

                this.matchedRowIndex2 = closestIndex;

                const rowId2 = 'row2-' + closestIndex;
                const matchedRow2 = document.getElementById(rowId2);

                if(matchedRow2){
                    matchedRow2.scrollIntoView({ behavior: 'smooth', block: 'center' });
                }
            }else {
                this.matchedRowIndex2 = null;
                this.matches2 = [];
            }

            //////////
            const matchedIndices3 = this.samples.completed.reduce((indices, sample, index) => {
                if (sample.sample.code.toLowerCase().includes(searchTerm)) {
                    indices.push(index);
                }
                return indices;
            }, []);
            this.matches3 = matchedIndices3;
            if (matchedIndices3.length > 0 && searchTerm !== '') {
                const closestIndex = matchedIndices3.reduce((closest, currentIndex) => {
                    const closestDistance = Math.abs(closest - searchTerm.length);
                    const currentDistance = Math.abs(currentIndex - searchTerm.length);
                    return currentDistance > closestDistance ? currentIndex : closest;
                }, matchedIndices3[0]);

                this.matchedRowIndex3 = closestIndex;

                const rowId3 = 'row3-' + closestIndex;
                const matchedRow3 = document.getElementById(rowId3);

                if(matchedRow3){
                    matchedRow3.scrollIntoView({ behavior: 'smooth', block: 'center' });
                }
            }else {
                this.matchedRowIndex3 = null;
                this.matches3 = [];
            }
        },
    }
}
</script>