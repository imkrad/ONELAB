<template>
    <div v-if="status == 'default'">
        <b-row class="g-2 mb-2 mt-n2">
            <b-col lg>
                <div class="input-group mb-1">
                    <span class="input-group-text"> <i class="ri-search-line search-icon"></i></span>
                    <input type="text" v-model="filter.keyword" placeholder="Search Item" class="form-control" style="width: 35%;">
                    <span @click="openAdd" class="input-group-text" v-b-tooltip.hover title="Add Item" style="cursor: pointer;"> 
                        <i class="bx bx-plus-circle search-icon"></i>
                    </span>
                    <b-button type="button" variant="primary" @click="openCreate">
                        <i class="ri-add-circle-fill align-bottom me-1"></i> Create
                    </b-button>
                </div>
            </b-col>
        </b-row>
        <div class="table-responsive">
            <table class="table table-nowrap align-middle mb-0">
                <thead class="table-light">
                    <tr class="fs-11">
                        <th></th>
                        <th style="width: 30%;">Name</th>
                        <th style="width: 10%;" class="text-center">Quantity</th>
                        <th style="width: 10%;" class="text-center">Stock</th>
                        <th style="width: 10%;" class="text-center">Reorder</th>
                        <th style="width: 15%;" class="text-center">Category</th>
                        <th style="width: 15%;" class="text-center">Status</th>
                        <th style="width: 7%;" ></th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(list,index) in lists" v-bind:key="index" :class="(list.onhand == 0) ? 'bg-danger-subtle' : ''">
                        <td class="text-center"> 
                            {{ index + 1 }}.
                        </td>
                        <td>
                            <h5 class="fs-13 mb-0 text-dark">{{list.name}}</h5>
                            <p class="fs-12 text-muted mb-0">{{list.code}} <span v-if="list.old_code">({{list.old_code}})</span></p>
                        </td>
                        <td class="text-center fs-12">{{list.onhand}} </td>
                        <!-- <span class="fs-11 text-muted">({{ list.onhand }})</span> -->
                        <td class="text-center fs-12">{{ list.stock }} {{list.unit}}</td>
                        <td class="text-center fs-12">{{list.reorder}} {{list.unit}}</td>
                        <td class="text-center fs-12">{{list.category}}</td>
                        <td class="text-center">
                            <span v-if="list.is_active" class="badge bg-success">Active</span>
                            <span v-else class="badge bg-danger">Inactive</span>
                        </td>
                        <td class="text-end">
                            <b-button @click="openEdit(list,index)" variant="soft-warning" class="me-1" v-b-tooltip.hover title="Edit" size="sm">
                                <i class="ri-pencil-fill align-bottom"></i>
                            </b-button>
                            <b-button @click="openView(list)" variant="soft-info" v-b-tooltip.hover title="View" size="sm">
                                <i class="ri-eye-fill align-bottom"></i>
                            </b-button>
                        </td>
                    </tr>
                </tbody>
            </table>
            <Pagination class="ms-2 me-2" v-if="meta" @fetch="fetch" :lists="lists.length" :links="links" :pagination="meta" />
        </div>
    </div>
    <div v-else>
        <b-col lg="12" v-if="selected">
            <b-card no-body>
                <div :class="selected.bg">
                    <b-card-body class="pb-0 px-4">
                        <b-row class="mb-3">
                            <b-col md>
                                <b-row class="align-items-center g-3">
                                    <b-col md>
                                        <div>
                                            <h4 class="fw-semibold fs-15 text-primary">{{selected.name}}</h4>
                                            <div class="hstack gap-3 text-muted flex-wrap">
                                                <div>
                                                    <i class="ri-qr-code-fill align-bottom me-1"></i>
                                                    {{selected.code}} <span class="text-muted">({{selected.old_code}})</span>
                                                </div>
                                                <div class="vr"></div>
                                                <div>Stock : {{ selected.stock }} {{selected.unit}}</div>
                                                <div class="vr"></div>
                                                <div>Reorder : {{ selected.reorder }} {{selected.unit}}</div>
                                                <div class="vr"></div>
                                                <div>Quantity : {{ selected.onhand}}</div>
                                            </div>
                                        </div>
                                    </b-col>
                                </b-row>
                            </b-col>
                            <b-col md="auto">
                                <div class="hstack gap-1 flex-wrap mt-2">
                                    <b-button variant="soft-danger" @click="back()">
                                        <i class="ri-close-circle-fill align-bottom"></i> 
                                    </b-button>
                                </div>
                            </b-col>
                        </b-row>
                        
                    </b-card-body>
                </div>
            </b-card>
        </b-col>
        <!-- <hr class="text-muted mt-n1 mb-4"/> -->
        <div v-if="selected" class="table-responsive mt-n2 mb-0">
            <table class="table table-nowrap align-middle mb-0">
                <thead class="table-light">
                    <tr class="fs-11">
                        <th class="text-center" width="5%">#</th>
                        <th width="30%">Supplier</th>
                        <th class="text-center" width="15%">PO Number</th>
                        <th class="text-center" width="15%">Quantity</th>
                        <th class="text-center" width="15%">Content</th>
                        <th class="text-center" width="15%">Price</th>
                        <th class="text-center" width="15%"></th>
                    </tr>
                </thead>
            </table>
            <simplebar data-simplebar style="max-height: calc(100vh - 380px);">
                <table class="table table-nowrap align-middle mb-0">
                    <tbody>
                        <tr v-for="(list,index) in sortedItems" v-bind:key="index" class="fs-12" :class="(list.onhand == 0) ? 'table-danger' : ''">
                            <td  width="5%" class="text-center fs-12"> 
                                {{index+1}}
                            </td>
                            <td  width="30%">
                                <h5 class="fs-13 mb-0">{{list.supplier}}</h5>
                                <p class="text-muted mb-0">{{list.code}}</p>
                            </td>
                            <td  width="15%" class="text-center">{{list.number}}</td>
                            <td  width="15%" class="text-center">{{list.onhand}}</td>
                            <td  width="15%" class="text-center">{{list.unit}} {{list.type}}</td>
                            <td  width="15%" class="text-center">{{list.price}}</td>
                            <td  width="15%" class="text-center">
                                <b-button @click="openView(list,selected.name)" variant="soft-info" v-b-tooltip.hover title="View" size="sm">
                                    <i class="ri-eye-fill align-bottom"></i>
                                </b-button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </simplebar>
        </div>
    </div>
    <Edit :dropdowns="dropdowns" @update="updateItem" ref="edit"/>
    <Create @message="fetch()" :dropdowns="dropdowns" ref="create"/>
    <Add :suppliers="dropdowns.suppliers" :units="dropdowns.units" ref="add"/>
</template>
<script>
import _ from 'lodash';
import Add from '../Modals/Add.vue';
import Edit from '../Modals/Edit.vue';
import Create from '../Modals/Create.vue';
import simplebar from "simplebar-vue";
import Pagination from "@/Shared/Components/Pagination.vue";
export default {
    props: ['dropdowns','suppliers'],
    components: { Pagination, Create, Add, Edit, simplebar },
    data(){
        return {
            currentUrl: window.location.origin,
            lists: [],
            meta: {},
            links: {},
            index: null,
            filter: {
                keyword: null
            },
            status: 'default',
            selected: null
        }
    },
    watch: {
        "filter.keyword"(newVal){
            this.checkSearchStr(newVal)
        }
    },
    created(){
        this.fetch();
    },
    computed: {
        sortedItems() {
            return this.selected.stocks.sort((a, b) => b.onhand - a.onhand);
        }
    },
    methods: {
        checkSearchStr: _.debounce(function(string) {
            this.fetch();
        }, 300),
        fetch(page_url){
            page_url = page_url || '/inventory';
            axios.get(page_url,{
                params : {
                    keyword: this.filter.keyword,
                    count: ((window.innerHeight-350)/58),
                    option: 'items'
                }
            })
            .then(response => {
                this.lists = response.data.data;
                this.meta = response.data.meta;
                this.links = response.data.links;     
            })
            .catch(err => console.log(err));
        },
        openAdd(){
            this.$refs.add.show();
        },
        openView(data){
            this.status = 'view';
            this.selected = data;
        },
        openCreate(){
            this.$refs.create.show();
        },
        openEdit(data,index){
            this.index = index;
            this.$refs.edit.show(data);
        },
        updateItem(data){
            this.lists[this.index].category = data.category.name;
            this.lists[this.index].reorder = data.reorder;
        },
        back(){
            this.status = 'default';
            this.selected = null;
        }
    }
}
</script>