<template>
    <b-modal v-model="showModal" header-class="p-3 bg-light" title="Generate Certificate" class="v-modal-custom" modal-class="zoomIn" centered no-close-on-backdrop>
        <form class="customform">
            <BRow class="g-3 mt-1">
                <BCol lg="12" class="mt-0">
                    <InputLabel for="name" value="Parameter"/>
                    <Textarea id="name" v-model="form.parameter" class="form-control" rows="1" :light="true"/>
                </BCol>
                <BCol lg="12" class="mt-0">
                    <InputLabel for="name" value="Result"/>
                    <Textarea id="name" v-model="form.result" class="form-control" rows="1" :light="true"/>
                </BCol>
                <BCol lg="12" class="mt-0">
                    <InputLabel for="name" value="Method"/>
                    <Textarea id="name" v-model="form.method" class="form-control" rows="1" :light="true"/>
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
import InputLabel from '@/Shared/Components/Forms/InputLabel.vue';
import TextInput from '@/Shared/Components/Forms/TextInput.vue';
import Textarea from '@/Shared/Components/Forms/Textarea.vue';
export default {
    components: { InputLabel, TextInput, Textarea },
    data(){
        return {
            currentUrl: window.location.origin,
            form: useForm({
                tsr_id: null,
                parameter: null,
                result: null,
                method: null,
            }),
            sample: null,
            showModal: false,
            editable: false
        }
    },
    methods: { 
        show(data,id){
            this.sample = data;
            this.form.tsr_id = id;
            this.showModal = true;
        },
        submit(){
           window.open(this.currentUrl + '/samples?option=print&id='+this.sample.id);
        },
        hide(){
            this.form.reset();
            this.editable = false;
            this.showModal = false;
        }
    }
}
</script>