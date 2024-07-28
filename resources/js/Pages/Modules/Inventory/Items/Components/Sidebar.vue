<template>
    <div class="p-3 d-flex flex-column h-100">
        <p class="text-muted text-uppercase fs-12 fw-medium mb-2">Reminders</p>
        <b-list-group>
            <BListGroupItem v-for="(list,index) in analytics.reminders" v-bind:key="index">
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
        <p class="text-muted text-uppercase fs-12 fw-medium mb-2 mt-3"> Categories </p>
        <b-list-group>
            <BListGroupItem  v-for="(list,index) in analytics.categories" v-bind:key="index" class="d-flex justify-content-between align-items-center fs-12">
                {{list.name}} <span class="badge bg-light text-muted">{{list.inventory_category_count}}</span>
            </BListGroupItem>
        </b-list-group>
        <p class="text-muted text-uppercase fs-12 fw-medium mb-2 mt-3"> Statuses </p>
        <b-list-group>
            <BListGroupItem v-for="(value,key,index) in analytics.statuses" v-bind:key="index" class="d-flex justify-content-between align-items-center fs-12">
                {{key}} <span :class="'badge bg-'+colors[index]+'-subtle text-'+colors[index]">{{value}}</span> 
            </BListGroupItem>
        </b-list-group> 
        </div>
</template>
<script>
export default {
    props: ['analytics'],
    data(){
        return {
            colors : ['success','danger']
        }
    }
}
</script>