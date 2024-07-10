<template lang="">
    <Head title="Calendar"/>
    <PageHeader title="Calendar" pageTitle="Menu" />
    <div class="chat-wrapper d-lg-flex gap-1 mx-n4 mt-n4 p-1">
        <div class="file-manager-sidebar">
            <div class="p-4">
                <BButton variant="primary" class="w-100" id="btn-new-event" @click="showModal = true">
                    <i class="mdi mdi-plus"></i> Create New Event
                </BButton>
                <hr class="text-muted"/>
                <div id="external-events">
                    <div v-for="(list,index) in dropdowns.events" v-bind:key="index" :class="'external-event fc-event '+list.color+' '+list.others">
                        <i class="mdi mdi-checkbox-blank-circle me-2"></i>{{list.name}}
                    </div>
                </div>
            </div>
        </div>
        <div class="file-manager-content w-100 p-4 pb-0" style="height: calc(100vh - 180px); overflow: auto;" ref="box">
            <div ref="calendarContainer" class="calendar-container">
                 <FullCalendar ref="fullCalendar" :options="calendarOptions" />
            </div>
        </div>
    </div>
</template>
<script>
import "@fullcalendar/core";
import dayGridPlugin from "@fullcalendar/daygrid";
import timeGridPlugin from "@fullcalendar/timegrid";
import interactionPlugin, { Draggable } from "@fullcalendar/interaction";
import bootstrapPlugin from "@fullcalendar/bootstrap";
import listPlugin from "@fullcalendar/list";
import FullCalendar from "@fullcalendar/vue3";
import PageHeader from '@/Shared/Components/PageHeader.vue';
export default {
    components: { PageHeader, FullCalendar },
    props: ['dropdowns'],
    data(){
        return {
            calendarOptions: {
                timeZone: "Asia/Manila",
                droppable: true,
                navLinks: true,
                plugins: [
                    dayGridPlugin,
                    timeGridPlugin,
                    interactionPlugin,
                    bootstrapPlugin,
                    listPlugin,
                ],
                themeSystem: "bootstrap",
                headerToolbar: {
                    left: "prev,next today",
                    center: "title",
                    right: "dayGridMonth,timeGridWeek,timeGridDay,listMonth",
                },
                windowResize: () => {
                    this.getInitialView();
                },
                initialView: this.getInitialView(),
                initialEvents: [],
                editable: true,
                showNonCurrentDates: false,
                fixedWeekCount: false,
                height: 'calc(100vh - 220px)'
                //selectable: true,
                //selectMirror: true,
                //dayMaxEvents: true,
                // weekends: true,
                // dateClick: this.dateClicked,
                // eventClick: this.editEvent,
                // eventsSet: this.handleEvents,
            },
            currentEvents: [],
            showModal: false,
        }
    },
    methods: {
        getInitialView() {
            if (window.innerWidth >= 768 && window.innerWidth < 1200) {
                return "timeGridWeek";
            } else if (window.innerWidth <= 768) {
                return "listMonth";
            } else {
                return "dayGridMonth";
            }
        },
    }
}
</script>