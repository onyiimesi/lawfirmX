<!-- eslint-disable vue/multi-word-component-names -->

<script setup>
import { onMounted, ref } from "vue";
import ClientAPI from '../services/ClientAPI'
import { useRoute } from "vue-router";
import moment from 'moment'

const route = useRoute();
const clients = ref([]);

onMounted(async () => {

    await ClientAPI.getClientID(route.params.id)
    .then((response) => {
        clients.value = response.data.data;
      
    })

});
</script>

<template>
    <!-- Page Header Start -->
    <div class="container-fluid bg-page-header" style="margin-bottom: 10px;">
        <div class="container">
            <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 200px">
                <h3 class="display-5 text-white text-uppercase">Client Profile</h3>
                <div class="d-inline-flex text-white">
                    <p class="m-0 text-uppercase"><RouterLink class="text-white" to="/">Home</RouterLink></p>
                    <i class="fa fa-angle-double-right pt-1 px-3"></i>
                    <p class="m-0 text-uppercase">Client Profile</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Features Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-6" style="min-height: 500px;">
                    <div class="position-relative h-100 rounded overflow-hidden">
                        <img class="position-absolute w-100 h-100" :src="clients.profile_image" style="object-fit: cover;" />
                    </div>
                </div>
                <div class="col-lg-6 pt-5 pb-lg-5">
                    <div class="feature-text bg-white rounded p-lg-5">
                        
                        <h1 class="mb-4">{{ clients.last_name }} {{ clients.first_name }}</h1>
                        <div class="d-flex mb-4">
                            <div class="">
                                <h5>Email Address</h5>
                                <p class="m-0">{{ clients.email }}</p>
                            </div>
                        </div>

                        <div class="d-flex mb-4">
                            <div class="">
                                <h5>Date Profiled</h5>
                                <p class="m-0">{{ moment(clients.date_profiled).format('MM/DD/YYYY') }}</p>
                            </div>
                        </div>

                        <div class="d-flex mb-4">
                            <div class="">
                                <h5>Primary Legal Counsel</h5>
                                <p class="m-0">{{ clients.primary_legal_counsel }}</p>
                            </div>
                        </div>

                        <div class="d-flex mb-4">
                            <div class="">
                                <h5>Date of Birth</h5>
                                <p class="m-0">{{ moment(clients.date_of_birth).format('MM/DD/YYYY') }}</p>
                            </div>
                        </div>

                        <div class="d-flex mb-4">
                            <div class="">
                                <h5>Case Details</h5>
                                <p class="m-0">{{ clients.case_details }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Features End -->
</template>