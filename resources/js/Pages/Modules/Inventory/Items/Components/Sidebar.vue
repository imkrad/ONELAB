<template>
    <div class="p-3 d-flex flex-column h-100">
        <p class="text-muted text-uppercase fs-12 fw-medium mb-2">Reminders</p>
        <ul class="list-unstyled gap-3 mt-2" style="cursor:pointer;">
            <li class="mb-2">
                <div class="d-flex align-items-center">
                    <div class="flex-shrink-0">
                        <div class="avatar-xs">
                            <div class="avatar-title rounded bg-danger-subtle text-danger">
                            <i class="ri-error-warning-fill fs-17"></i>
                            </div>
                        </div>
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <h5 class="mb-0 fs-13">Expired Items</h5>
                        <p class="mb-0 fs-12 text-muted">Qualified for graduation</p>
                    </div>
                </div>
            </li> 
            <li class="mb-2">
                <div class="d-flex align-items-center">
                    <div class="flex-shrink-0">
                        <div class="avatar-xs">
                            <div class="avatar-title rounded bg-warning-subtle text-warning">
                            <i class="ri-alert-fill fs-17"></i>
                            </div>
                        </div>
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <h5 class="mb-0 fs-13">Out of stocks</h5>
                        <p class="mb-0 fs-12 text-muted">Qualified for graduation</p>
                    </div>
                </div>
            </li> 
            <li class="mb-2">
                <div class="d-flex align-items-center">
                    <div class="flex-shrink-0">
                        <div class="avatar-xs">
                            <div class="avatar-title rounded bg-primary-subtle text-primary">
                            <i class="ri-shopping-cart-fill fs-17"></i>
                            </div>
                        </div>
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <h5 class="mb-0 fs-13">For Reorder</h5>
                        <p class="mb-0 fs-12 text-muted">Qualified for graduation</p>
                    </div>
                </div>
            </li> 
        </ul>
        <hr class="text-muted mt-0"/>
        <p class="text-muted text-uppercase fs-12 fw-medium mb-2"> Categories </p>
        <ul class="list-unstyled mb-0 filter-list">
            <li v-for="(list,index) in analytics.categories" v-bind:key="index">
                <a class="d-flex py-1 align-items-center" href="#" target="_self">
                    <div class="flex-grow-1">
                        <h5 class="fs-13 mb-0 listname">{{list.name}}</h5>
                    </div>
                    <div class="flex-shrink-0 ms-2">
                        <span class="badge bg-secondary bg-light text-muted">{{list.inventory_category_count}}</span>
                    </div>
                </a>
            </li>
        </ul>
        <hr class="text-muted mt-2"/>
        <p class="text-muted text-uppercase fs-12 fw-medium mb-2 mt-n1"> Statuses </p>
        <ul class="list-unstyled mb-0 filter-list">
            <li v-for="(value,key,index) in analytics.statuses" v-bind:key="index">
                <a class="d-flex py-1 align-items-center" href="#" target="_self">
                    <div class="flex-grow-1">
                        <h5 class="fs-13 mb-0 listname">{{key}}</h5>
                    </div>
                    <div class="flex-shrink-0 ms-2"><span class="badge bg-secondary bg-light text-muted">{{value}}</span></div>
                </a>
            </li>
        </ul>
        <hr class="text-muted mt-2"/>
            
            
            
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