<template>
    <Head title="Inventory"/>
    <PageHeader title="Inventory" pageTitle="Menu" />
     <div class="chat-wrapper d-lg-flex gap-1 mx-n4 mt-n4 p-1">
        
        <div class="file-manager-content w-100 p-4 pb-0" style="height: calc(100vh - 180px); overflow: auto;" ref="box">
            <b-row>
                <b-col lg="4" md="6" v-for="(item, index) of dropdowns.statistics" :key="index">
                    <b-card no-body class="bg-white shadow-none border">
                        <b-card-body>
                            <div @click="search(item.select)" class="d-flex align-items-center" style="cursor: pointer;">
                                <div class="avatar-sm flex-shrink-0">
                                    <span class="avatar-title bg-light rounded-circle fs-3" :class="item.color">
                                        <i :class="`bx ${item.icon} align-middle`"></i>
                                    </span>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <p class="text-uppercase fw-semibold fs-12 text-muted mb-1">
                                        {{ item.name }}
                                    </p>
                                    <h4 class="mb-0">
                                        <span class="counter-value">
                                        {{ item.total }}
                                        </span>
                                    </h4>
                                </div>
                            </div>
                        </b-card-body>
                    </b-card>
                </b-col>
            </b-row>
            <!-- <div class="input-group mb-1">
                <span class="input-group-text"><i class="ri-search-line search-icon"></i></span>
                <input type="text" v-model="filter.keyword"  placeholder="Search Item" class="form-control" style="width: 30%;" id="search-options">
                <div class="dropdown-menu dropdown-menu-lg" id="search-dropdown" style="top: 38px; width: 100%;">
                    <div class="notification-list"></div>
                </div>
                <span class="input-group-text d-none" style="cursor: pointer;" id="search-close-options" data-bs-toggle="tooltip" aria-label="Refresh" data-bs-original-title="Refresh">
                    <i class="bx bx-refresh text-primary search-icon"></i>
                </span>
                <button @click="add" class="btn btn-primary btn-md" type="button">
                    <div class="btn-content"><i class="ri-add-circle-fill align-bottom me-1"></i> Add Stock </div>
                </button>
            </div> -->
            
            <Search @set="setData"/>
            <!-- <hr class="text-muted mt-0"/> -->
            <div v-if="selected" class=" mt-0 p-1 border border-dashed rounded bg-info-subtle">
                <div class="d-flex align-items-center">
                    <div class="avatar-sm me-0">
                        <div class="avatar-title rounded bg-transparent text-primary fs-24">
                            <i class="ri-qr-code-fill"></i>
                        </div>
                    </div>
                    <div class="flex-grow-1">
                        <h5 class="fs-14 text-primary fw-semibold mb-0">{{selected.name}}</h5>
                        <p class="text-muted fs-12 mb-0">{{selected.code}} <span class="text-muted">({{selected.old_code}})</span></p>
                    </div>
                </div>
            </div>
            <div v-if="selected" class="table-responsive mt-2 mb-0">
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
                <simplebar data-simplebar style="max-height: calc(100vh - 500px);">
                    <table class="table table-nowrap align-middle mb-0">
                        <tbody>
                            <tr v-for="(list,index) in selected.stocks" v-bind:key="index" class="fs-12" :class="(list.selected) ? 'table-info' : ''">
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
                                      <b-button @click="openView(list,selected.name)" variant="primary" v-b-tooltip.hover title="Add to cart" size="sm" :disabled="(list.outofstock || list.expired) ? true : false">
                                    <i class="ri-logout-circle-r-fill align-bottom"></i>
                                </b-button>
                                </td>
                                <!-- <td></td> -->
                            </tr>
                        </tbody>
                    </table>
                </simplebar>
             </div>
            <!-- <ul class="list-unstyled mb-0 vstack gap-3" v-if="selected">
                <li>
                    <hr class="mt-0" />
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1 ms-3">
                            <h6 class="fs-14 mb-0 text-primary">{{selected.name}}</h6>
                            <span class="text-muted">{{selected.code}}</span>
                        </div>
                    </div>
                </li>
            </ul> -->
        </div>
        <div class="file-manager-sidebar" style="max-width: 500px; min-width: 500px;">  
            <div class="p-3 d-flex flex-column h-100">
                <div class="table-responsive">
                    <table class="table table-nowrap align-middle mb-0">
                        <thead class="table-light">
                            <tr class="fs-11">
                                <th style="width: 85%;">Item</th>
                                <th class="text-end"></th>
                            </tr>
                        </thead>
                        <tbody v-if="carts.length > 0">
                            <tr v-for="(list,index) in carts" v-bind:key="index" :class="[(list.is_active == 0) ? 'table-warnings' : '']">
                                <td class="fs-12">
                                    <h5 class="fs-12 mb-0 text-dark">{{list.name}}</h5>
                                    <p class="fs-12 text-muted mb-0">{{list.number}}</p>
                                </td>
                                <td class="text-end">
                                    <div class="input-step">
                                        <input type="number" class="product-quantity" v-model="list.onhand" value="1" min="0" :max="list.onhand"/>
                                    </div>
                                    <b-button @click="removeCart(index)" variant="light" v-b-tooltip.hover title="Remove" class="remove-list ms-1 me-n2">
                                        <i class="ri-delete-bin-fill align-bottom"></i>
                                    </b-button>
                                </td>
                            </tr>
                        </tbody>
                        <tbody v-else>
                            <tr>
                                <td colspan="2" class="text-center text-muted">No items added</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="mt-auto">
                    <div class="d-grid gap-2" >
                        <b-button @click="openWithdraw" variant="primary" :disabled="(carts.length == 0) ? true : false">Withdraw</b-button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <View @add="addNow" ref="view"/>
    <Add :suppliers="dropdowns.suppliers" :units="dropdowns.units" ref="add"/>
    <Withdraw @message="clear()" ref="withdraw"/>
</template>
<script>
import _ from 'lodash';
import Add from '../Items/Modals/Add.vue';
import View from './Modals/View.vue';
import Search from './Components/Search.vue';
import Withdraw from './Modals/Withdraw.vue';
import simplebar from "simplebar-vue";
import PageHeader from '@/Shared/Components/PageHeader.vue';
export default {
    props: ['dropdowns'],
    components: { PageHeader, Add, Withdraw, View, Search, simplebar },
    data(){
        return {
            currentUrl: window.location.origin,
            lists: [],
            meta: {},
            links: {},
            carts: [],
            filter: {
                keyword: null,
                type: null,
            },
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
    methods: {
        setData(data) {
            this.selected = data;
        },
        checkSearchStr: _.debounce(function(string) {
            this.fetch();
        }, 300),
        fetch(page_url){
            page_url = page_url || '/inventory';
            axios.get(page_url,{
                params : {
                    keyword: this.filter.keyword,
                    type: this.filter.type,
                    count: ((window.innerHeight-350)/58),
                    option: 'lists'
                }
            })
            .then(response => {
                this.lists = response.data.data;
                this.meta = response.data.meta;
                this.links = response.data.links;     
            })
            .catch(err => console.log(err));
        },
        search(data){
            this.filter.type = data;
            this.fetch();
        },
        add(){
            this.$refs.add.show(true);
        },
        addNow(data){
            this.addCart(data);
        },
        addCart(data){
            const exst = this.carts.some(item => item.id === data.id);
            if(!exst){
                this.carts.push(data);
            }else{
                
            }
        },
        removeCart(index){
            this.carts.splice(this.carts.indexOf(index), 1);
        },
        openWithdraw(){
            this.$refs.withdraw.show(this.carts);
        },
        openView(data,name){
            this.$refs.view.show(data,name);
        },
        clear(){
            this.fetch();
            this.carts = [];
        }
    }
}
</script>