<!-- eslint-disable vue/multi-word-component-names -->

<script setup>
import { onMounted, ref } from "vue";
import ClientAPI from '../services/ClientAPI'

const clients = ref([]);
const loaderDiv = ref("");
const mainDiv = ref("d-none");

const last_name = ref("");

onMounted(async () => {

    await ClientAPI.getClient()
    .then((response) => {
        clients.value = response.data.data;
        loaderDiv.value = "d-none";
        mainDiv.value = "";
      
    })

});

const Filter = async () => {
  await ClientAPI.filterClient({

    last_name: last_name.value,

    },{
      headers: {
        'Content-Type': 'application/json;charset=utf-8'
      }
    }
    )
    .then((response) => {
      clients.value = response.data.data;
    })
}

</script>

<template>
    <!-- Page Header Start -->
    <div class="container-fluid bg-page-header" style="margin-bottom: 10px;">
        <div class="container">
            <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 200px">
                <h3 class="display-5 text-white text-uppercase">Client List</h3>
                <div class="d-inline-flex text-white">
                    <p class="m-0 text-uppercase"><RouterLink class="text-white" to="/">Home</RouterLink></p>
                    <i class="fa fa-angle-double-right pt-1 px-3"></i>
                    <p class="m-0 text-uppercase">Client List</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Contact Start -->
    <div class="container-fluid py-5">
        <div class="container py-2">
            <div class="row mb-4">
                <div class="col-md-4">
                    <label for="">Filter by Last Name</label>
                    <div class="d-flex">
                        <input type="text" @input="Filter" v-model="last_name" class="form-control mr-2" placeholder="Last Name">
                        <button class="btn btn-primary pt-2 pb-1"><i class="fa fa-search"></i></button>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 mb-5 mb-lg-0">
                    <div class="contact-form table-responsive">
                        <div :class="loaderDiv">
                        <div class="ph-item">
                            <div class="ph-col-12">
                                <div class="ph-row">
                                    <div class="ph-col-4"></div>
                                    <div class="ph-col-8 empty"></div>
                                    <div class="ph-col-6"></div>
                                    <div class="ph-col-6 empty"></div>
                                    <div class="ph-col-12"></div>
                                    <div class="ph-col-12"></div>
                                    <div class="ph-col-12"></div>
                                    <div class="ph-col-12"></div>
                                </div>
                                <div class="ph-row">
                                    <div class="ph-col-4"></div>
                                    <div class="ph-col-8 empty"></div>
                                    <div class="ph-col-6"></div>
                                    <div class="ph-col-6 empty"></div>
                                    <div class="ph-col-12"></div>
                                    <div class="ph-col-12"></div>
                                    <div class="ph-col-12"></div>
                                    <div class="ph-col-12"></div>
                                </div>
                            </div>
                        </div>
                        </div>
                        <div :class="mainDiv">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email Address</th>
                                    <th>Profile Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="text-center p-2" v-if="clients.length === 0">
                                    <td colspan="5">
                                        <h3 style="color: red;">No Record Found</h3>
                                    </td>
                                </tr>
                                <tr v-for="client in clients" :key="client.id">
                                    <td>{{ client.first_name }}</td>
                                    <td>{{ client.last_name }}</td>
                                    <td>{{ client.email }}</td>
                                    <td><img :src="client.profile_image" alt="" style="width: 80px; height: 80px;" class="img-fluid mt-3 rounded" /></td>
                                    <td><RouterLink :to="'/profile/'+client.id"><button class="btn btn-primary btn-sm">View Profile</button></RouterLink></td>
                                </tr>
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->
</template>