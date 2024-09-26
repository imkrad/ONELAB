<template>
    <b-modal v-model="showModal" header-class="p-3 bg-light"  style="--vz-modal-width: 650px;" title="New Disposal" class="v-modal-custom" modal-class="zoomIn" centered no-close-on-backdrop>
        
        <form class="customform">
            <BRow>
                <BCol lg="12">
                    <InputLabel for="customer" value="Sample Code" :message="form.errors.customer"/>
                    <Multiselect 
                    :options="samples" 
                    @search-change="fetchSample" 
                    v-model="form.sample" 
                    object label="code"
                    :searchable="true" 
                    @input="handleInput('sample')"
                    placeholder="Select Sample Code"/>
                </BCol>
                <BCol lg="12"  v-if="form.sample"><hr class="text-muted"/></BCol>
                <BCol lg="12" class="" v-if="form.sample">
                    <b-list-group>
                        <b-list-group-item><span class="fw-semibold"><i>{{form.sample.name}}</i></span></b-list-group-item>
                        <b-list-group-item>
                            <ul style="margin-bottom: 0px; margin-left: -20px;">
                                <li v-for="(list,index) in form.sample.analyses" v-bind:key="index">
                                    {{list.testservice.testname.name}}
                                </li>
                            </ul>
                        </b-list-group-item>
                    </b-list-group>
                </BCol>
                <BCol lg="12" class="mb-n3"  v-if="form.sample"><hr class="text-muted"/></BCol>
                <BCol lg="6" class="mt-2">
                    <InputLabel for="manner" value="Manner of Disposal" :message="form.errors.disposal_id"/>
                    <Multiselect 
                    :options="disposals" 
                    v-model="form.disposal_id"
                    @input="handleInput('disposal_id')"
                    :searchable="true" label="name"
                    placeholder="Select Disposal Manner"/>
                </BCol>
                <BCol lg="6" class="mt-2">
                    <InputLabel for="due" value="Disposed Date" :message="form.errors.disposed_at"/>
                    <TextInput v-model="form.disposed_at" type="date" class="form-control" placeholder="Please enter date"  @input="handleInput('disposed_at')" :light="true"/>
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
import InputLabel from '@/Shared/Components/Forms/InputLabel.vue';
import TextInput from '@/Shared/Components/Forms/TextInput.vue';
export default {
    components: { InputLabel, TextInput, Multiselect },
    props: ['disposals'],
    data(){
        return {
            currentUrl: window.location.origin,
            form: useForm({
                sample: null,
                disposal_id: null,
                disposed_at: null,
                option: 'disposal'
            }),
            samples: [],
            showModal: false,
            editable: false
        }
    },
    methods: { 
        show(){
            this.showModal = true;
        },
        view(data){
            this.form.sample = data;
            this.samples.push(data);
            this.showModal = true;
        },
        submit(){
            this.form.post('/samples',{
                preserveScroll: true,
                onSuccess: (response) => {
                    this.$emit('message',true);
                    this.hide();
                },
            });
        },
        fetchSample(code){
            axios.get('/fetch',{
                params: {
                    option: 'samples',
                    keyword: code
                }
            })
            .then(response => {
                this.samples = response.data;
            })
            .catch(err => console.log(err));
        },
        handleInput(field) {
            this.form.errors[field] = false;
        },
        hide(){
            this.industry = null;
            this.form.reset();
            this.form.clearErrors();
            this.editable = false;
            this.showModal = false;
        }
    }
}
</script>