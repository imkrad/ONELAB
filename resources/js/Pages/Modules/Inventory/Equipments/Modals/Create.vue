<template>
    <b-modal v-model="showModal" style="--vz-modal-width: 600px;" header-class="p-3 bg-light" :title="(!editable) ? 'Create Equipment' : 'Edit Equipment'" class="v-modal-custom" modal-class="zoomIn" centered no-close-on-backdrop>
        <form class="customform">
            <BRow class="g-3 mt-1">
                <BCol lg="12" class="mt-1 mb-n1">
                    <InputLabel for="name" value="Name" :message="form.errors.name"/>
                    <TextInput id="name" v-model="form.name" type="text" class="form-control" autofocus placeholder="Please enter name" autocomplete="name" required :class="{ 'is-invalid': form.errors.name }" @input="handleInput('name')" :light="true"/>
                </BCol>
                <BCol lg="6" class="mt-1 mb-n1">
                    <InputLabel for="brand" value="Brand" :message="form.errors.email"/>
                    <TextInput id="brand" v-model="form.brand" type="text" class="form-control" placeholder="Please enter brand" :class="{ 'is-invalid': form.errors.brand }" @input="handleInput('brand')" :light="true"/>
                </BCol>
                <BCol lg="6" class="mt-1 mb-n1">
                    <InputLabel for="model" value="Model" :message="form.errors.contact_no"/>
                    <TextInput id="model" v-model="form.model" type="text" class="form-control" placeholder="Please enter model" :class="{ 'is-invalid': form.errors.model }" @input="handleInput('model')" :light="true"/>
                </BCol>
                <BCol lg="12" class="mt-1 mb-n1">
                    <InputLabel for="serial_no" value="Serial no." :message="form.errors.serial_no"/>
                    <TextInput id="serial_no" v-model="form.serial_no" type="text" class="form-control" placeholder="Please enter serial_no" :class="{ 'is-invalid': form.errors.name }" @input="handleInput('serial_no')" :light="true"/>
                </BCol>
                <BCol lg="12">
                    <hr class="text-muted mt-0 mb-2"/>
                </BCol>
                <BCol lg="12" class="mt-n1">
                    <InputLabel for="supplier" value="Supplier" :message="form.errors.supplier_id"/>
                    <Multiselect :options="dropdowns.suppliers" v-model="form.supplier_id" :message="form.errors.supplier_id" label="name" placeholder="Select Supplier"/>
                </BCol>
                <BCol lg="6" class="mt-1 mb-n1">
                    <InputLabel for="date" value="Date Acquired" :message="form.errors.acquired_at"/>
                    <TextInput id="date" v-model="form.acquired_at" type="date" class="form-control" placeholder="Please enter date acquired" :class="{ 'is-invalid': form.errors.acquired_at }" @input="handleInput('acquired_at')" :light="true"/>
                </BCol>
                <BCol lg="6" class="mt-1 mb-n1">
                    <InputLabel for="model" value="Price" :message="form.errors.price"/>
                    <Amount @amount="amount" ref="testing" :readonly="false"/>
                </BCol>
            </BRow>
        </form>
        <template v-slot:footer>
            <b-button @click="hide()" variant="light" block>Cancel</b-button>
            <b-button @click="submit('ok')" variant="primary" :disabled="form.processing" block>Submit</b-button>
        </template>
    </b-modal>
</template>
<script>
import _ from 'lodash';
import { useForm } from '@inertiajs/vue3';
import Multiselect from "@vueform/multiselect";
import "@vueform/multiselect/themes/default.css";
import Amount from '@/Shared/Components/Forms/Amount.vue';
import InputLabel from '@/Shared/Components/Forms/InputLabel.vue';
import TextInput from '@/Shared/Components/Forms/TextInput.vue';
export default {
    components: { InputLabel, TextInput, Multiselect, Amount },
    props: ['dropdowns'],
    data(){
        return {
            currentUrl: window.location.origin,
            form: useForm({
                id: null,
                name: null,
                brand: null,
                model: null,
                serial_no: null,
                year: null,
                price: null,
                supplier_id: null,
                acquired_at: null,
                option: 'equipment'
            }),
            showModal: false,
            editable: false
        }
    },
    methods: { 
        show(){
            this.form.reset();
            this.editable = false;
            this.showModal = true;
        },
        amount(val){
            this.form.price = val;
        },
        edit(data){
            this.form.id = data.id;
            this.form.name = data.name;
            this.form.email = data.email;
            this.form.contact_no = data.contact_no;
            this.form.address = data.address;
            this.form.region_code = data.region.value;
            this.fetchProvince(data.region.value);
            this.form.province_code = data.province.value;
            this.fetchMunicipality(data.province.value);
            this.form.municipality_code = data.municipality.value;
            this.form.barangay_code = (data.barangay) ? data.barangay.value : null;
            this.editable = true;
            this.showModal = true;
        },
        submit(){
            if(this.editable){
                this.form.put('/inventory/update',{
                    preserveScroll: true,
                    onSuccess: (response) => {
                        this.$emit('message',this.$page.props.flash.data);
                        this.form.reset();
                        this.hide();
                    }
                });
            }else{
                this.form.post('/inventory',{
                    preserveScroll: true,
                    onSuccess: (response) => {
                        this.$emit('message',true);
                        this.hide();
                    },
                });
            }
        },
        fetchProvince(code){
            axios.get('/lists/locations/',{
                params: {
                    option: 'list_province',
                    code: code
                }
            })
            .then(response => {
                this.provinces = response.data;
            })
            .catch(err => console.log(err));
        },
        fetchMunicipality(code){
            axios.get('/lists/locations/',{
                params: {
                    option: 'list_municipality',
                    code: code
                }
            })
            .then(response => {
                this.municipalities = response.data;
            })
            .catch(err => console.log(err));
        },
        fetchBarangay(code){
            axios.get('/lists/locations/',{
                params: {
                    option: 'list_barangay',
                    code: code
                }
            })
            .then(response => {
                this.barangays = response.data;
            })
            .catch(err => console.log(err));
        },
        handleInput(field) {
            this.form.errors[field] = false;
        },
        hide(){
            this.form.reset();
            this.editable = false;
            this.showModal = false;
        }
    }
}
</script>