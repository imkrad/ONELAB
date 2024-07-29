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
            <b-col lg="12" v-if="selected">
                <b-card no-body>
                    <div class="bg-light-subtle">
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
                                        <b-button @click="add(selected)" variant="soft-info">
                                            <i class="ri-add-circle-fill align-bottom"></i> 
                                        </b-button>
                                        <b-button variant="soft-danger" @click="selected = null">
                                            <i class="ri-close-circle-fill align-bottom"></i> 
                                        </b-button>
                                    </div>
                                </b-col>
                            </b-row>
                            
                        </b-card-body>
                    </div>
                </b-card>
            </b-col>
            <!-- <div v-if="selected" class=" mt-0 p-1 border border-dashed rounded bg-info-subtle">
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
            </div> -->
            <div v-if="selected" class="table-responsive mt-n2 mb-0">
                <table class="table table-nowrap align-middle mb-0">
                    <thead class="table-light">
                        <tr class="fs-11">
                            <th class="text-center" width="5%">#</th>
                            <th width="30%">Supplier</th>
                            <th class="text-center" width="15%">PO Number</th>
                            <th class="text-center" width="15%">Onhand</th>
                            <th class="text-center" width="15%">Content</th>
                            <th class="text-center" width="15%">Price</th>
                            <th class="text-center" width="15%"></th>
                        </tr>
                    </thead>
                </table>
                <simplebar data-simplebar style="max-height: calc(100vh - 520px);">
                    <table class="table table-nowrap align-middle mb-0">
                        <tbody>
                            <tr v-for="(list,index) in sortedItems" v-bind:key="index" class="fs-12" :class="(list.selected) ? 'table-info' : ''">
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
                                        <input type="number" @keydown="handleKeydown" v-maska data-maska="##" class="product-quantity" v-model="list.quantity" value="1" min="0" :max="list.onhand"/>
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
    <Add @update="updateList" :suppliers="dropdowns.suppliers" :units="dropdowns.units" ref="add"/>
    <Withdraw @message="clear()" ref="withdraw"/>
</template>
<script>
import _ from 'lodash';
import Add from '../Dashboard/Modals/Add.vue';
import View from './Modals/View.vue';
import Search from './Components/Search.vue';
import Withdraw from './Modals/Withdraw.vue';
import simplebar from "simplebar-vue";
import { vMaska } from "maska"
import PageHeader from '@/Shared/Components/PageHeader.vue';
export default {
    props: ['dropdowns'],
    directives: { maska: vMaska },
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
    computed: {
        sortedItems() {
            return this.selected.stocks.sort((a, b) => b.onhand - a.onhand);
        }
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
        add(data){
            this.$refs.add.show(data);
        },
        addNow(data){
            this.addCart(data);
        },
        addCart(data){
            const exst = this.carts.some(item => item.id === data.id);
            if(!exst){
                const item = {
                    id: data.id,
                    name: data.name,
                    number: data.number,
                    quantity: 1,
                    onhand: data.onhand
                }
                this.carts.push(item);
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
        updateList(data){
            this.selected.stocks.push(data);
        },
        clear(){
            this.fetch();
            this.carts = [];
        },
        handleKeydown(event) {
      const allowedKeys = ["ArrowUp", "ArrowDown", "Tab", "Backspace", "Delete"];
      if (!allowedKeys.includes(event.key)) {
        event.preventDefault();
      }
    }
    }
}
</script>