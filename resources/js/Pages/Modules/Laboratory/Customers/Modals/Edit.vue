<template>
    <b-modal v-model="showModal" style="--vz-modal-width: 700px;" header-class="p-3 bg-light" title="Edit Customer" class="v-modal-custom" modal-class="zoomIn" centered no-close-on-backdrop>
        
            <BRow v-if="selected">
                <BCol lg="12" class="mt-n1">
                    <TextInput id="address" :value="selected.customer" type="text" class="form-control" :light="true" readonly/>
                    <hr class="text-muted mt-3 mb-4"/>
                    <div class="mt-3">
                    <form class="customform">
                        <BRow>
                            <BCol lg="12">
                                <BRow class="g-3">
                                    <BCol lg="12" v-if="form.has_branches" class="mt-1 mb-n1">
                                        <InputLabel for="name" value="Branch" :message="errors.name"/>
                                        <TextInput id="name" v-model="form.name" type="text" class="form-control" placeholder="Please enter name" @input="handleInput('name')" :light="true"/>
                                    </BCol>
                                    <BCol lg="6" class="mt-1 mb-n1">
                                        <InputLabel for="email" value="Email" :message="errors.email"/>
                                        <TextInput id="email" v-model="form.email" type="email" class="form-control" placeholder="Please enter email" @input="handleInput('email')" :light="true"/>
                                    </BCol>
                                    <BCol lg="6" class="mt-1 mb-n1">
                                        <InputLabel for="contact_no" value="Contact" :message="errors.contact_no"/>
                                        <TextInput id="contact_no" v-model="form.contact_no" type="text" class="form-control" placeholder="Please enter contact" @input="handleInput('contact_no')" :light="true"/>
                                    </BCol>
                                    <BCol lg="6" class="mt-1 mb-1">
                                        <InputLabel for="bussiness_id" value="Industry Type" :message="errors.industry_id"/>
                                        <Multiselect :options="dropdowns.bussinesses" :searchable="true" v-model="form.industry_id" label="name" placeholder="Select Bussiness Nature" @input="handleInput('industry_id')" :light="true"/>
                                    </BCol>
                                     <BCol lg="6" class="mt-1 mb-1">
                                        <InputLabel for="classification_id" value="Classification" :message="errors.classification_id"/>
                                        <Multiselect :options="dropdowns.classes" v-model="form.classification_id" label="name" placeholder="Select Classification" @input="handleInput('classification_id')" :light="true"/>
                                    </BCol>
                                    <BCol lg="12"><hr class="text-muted mt-1 mb-2"/></BCol>
                                    <BCol lg="6" class="mt-1">
                                        <InputLabel for="region" value="Region" :message="errors.region_code"/>
                                        <Multiselect :options="dropdowns.regions" label="name" v-model="form.region_code" :message="errors.region_code" placeholder="Select Region" @input="handleInput('region_code')"/>
                                    </BCol>
                                    <BCol lg="6" class="mt-1">
                                        <InputLabel for="province" value="Province" :message="errors.province_code"/>
                                        <Multiselect :options="provinces" label="name" :searchable="true" v-model="form.province_code" placeholder="Select Province" @input="handleInput('province_code')"/>
                                    </BCol>
                                    <BCol lg="6" class="mt-1">
                                        <InputLabel for="municipality" value="Municipality" :message="errors.municipality_code"/>
                                        <Multiselect :options="municipalities" label="name" :searchable="true" v-model="form.municipality_code" placeholder="Select Municipality" @input="handleInput('municipality_code')"/>
                                    </BCol>
                                    <BCol lg="6" class="mt-1">
                                        <InputLabel for="barangay" value="Barangay" :message="errors.barangay_code"/>
                                        <Multiselect :options="barangays" label="name" :searchable="true" v-model="form.barangay_code" placeholder="Select Barangay" @input="handleInput('barangay_code')"/>
                                    </BCol>
                                    <BCol lg="12" class="mt-1">
                                        <InputLabel for="address" value="Address" :message="errors.address"/>
                                        <TextInput id="address" v-model="form.address" type="text" class="form-control" placeholder="Please enter address" @input="handleInput('address')" :light="true"/>
                                    </BCol>
                                </BRow>
                            </BCol>
                        </Brow>
                    </form>
                    </div>    
                </BCol>
            </BRow>
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
import InputLabel from '@/Shared/Components/Forms/InputLabel.vue';
import TextInput from '@/Shared/Components/Forms/TextInput.vue';
export default {
    components: { InputLabel, TextInput, Multiselect },
    props: ['dropdowns','region'],
    data(){
        return {
            currentUrl: window.location.origin,
            form: useForm({
                id: null,
                email: null,
                contact_no: null,
                classification_id: null,
                industry_id: null,
                address: null,
                region_code: this.region,
                province_code: null,
                municipality_code: null,
                barangay_code: null,
                type: 'customer',
            }),
            errors: [],
            provinces: [],
            municipalities: [],
            barangays: [],
            showModal: false,
            editable: false,
            selected: null,
        }
    },
    watch: {
        'form.region_code'(){
            (this.form.region_code) ? this.fetchProvince(this.form.region_code) : '';
        },
        'form.province_code'(){
            (this.form.province_code) ? this.fetchMunicipality(this.form.province_code) : '';
        },
        'form.municipality_code'(){
            (this.form.municipality_code) ? this.fetchBarangay(this.form.municipality_code) : '';
        }
    },
    methods: { 
        show(data){
            this.selected = data;
            this.form.id = data.id;
            this.form.email = data.email;
            this.form.contact_no = data.contact_no;
            this.form.classification_id = data.classification.id;
            this.form.industry_id = data.industry.id;
            this.form.province_code = data.address.province.code;
            this.form.municipality_code = data.address.municipality.code;
            this.form.barangay_code = data.address.barangay.code;
            this.form.address = data.address.address;
            this.fetchProvince(this.region);
            this.showModal = true;
        },
        submit(){
            this.form.put('/customers/update',{
                preserveScroll: true,
                onSuccess: (response) => {
                    this.$emit('update',true);
                    this.hide();
                }
            });
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
            this.errors[field] = false;
        },
        hide(){
            this.form.reset();
            this.form.clearErrors();
            this.editable = false;
            this.showModal = false;
        }
    }
}
</script>