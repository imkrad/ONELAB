<template>
    <Head title="Equipments"/>
    <PageHeader title="List of Equipment" pageTitle="Menu" />
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
import _ from 'lodash';
import Lists from './Components/Lists.vue';
import PageHeader from '@/Shared/Components/PageHeader.vue';
export default {
    components: { PageHeader, Lists },
    props: ['dropdowns'],
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
            }
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
    }
}
</script>