<!-- eslint-disable vue/multi-word-component-names -->

<script setup>
import ClientAPI from '../services/ClientAPI'
import { ref } from "vue";
import router from "@/router";
import { useToast } from "vue-toastification";


const toast = useToast();
const first_name = ref("");
const last_name = ref("");
const email = ref("");
const date_profiled = ref("");
const primary_legal_counsel = ref("");
const date_of_birth = ref("");
const case_details = ref("");
const profile_image = ref("");
const loading = ref(false);

const handleLoader = () =>{
  loading.value = false;

  if(first_name.value && last_name.value){
    setTimeout(()=>{
      loading.value = true;
    }, 100)
  }else if(!first_name.value && !last_name.value){
    loading.value = false;
  }
}

const convertToBase64 = async (event) => {
  const file = event.target.files[0];
  const reader = new FileReader();
  reader.readAsDataURL(file);
  reader.onload = () => {
    profile_image.value = reader.result;
  };
}

const registerNow = async () => {

  await ClientAPI.createClient({
    first_name: first_name.value,
    last_name: last_name.value,
    email: email.value,
    date_profiled: date_profiled.value,
    primary_legal_counsel: primary_legal_counsel.value,
    date_of_birth: date_of_birth.value,
    case_details: case_details.value,
    profile_image: profile_image.value,

  }).then((response) => {
    
    if(response){
        toast.success(response.data.message);
        router.push("/clients");

        first_name.value = "";
        last_name.value = "";
        email.value = "";
        date_profiled.value = "";
        primary_legal_counsel.value = "";
        date_of_birth.value = "";
        case_details.value = "";
        profile_image.value = "";

    }
    
  })
  .catch((errors) => {
    if (errors) {
        toast.error(errors.response.data.message);
        loading.value = false;
    }
  });

}

</script>


<template>
    <!-- Page Header Start -->
    <div class="container-fluid bg-page-header" style="margin-bottom: 10px;">
        <div class="container">
            <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 200px">
                <h3 class="display-5 text-white text-uppercase">Register New Client</h3>
                <div class="d-inline-flex text-white">
                    <p class="m-0 text-uppercase"><RouterLink class="text-white" to="/">Home</RouterLink></p>
                    <i class="fa fa-angle-double-right pt-1 px-3"></i>
                    <p class="m-0 text-uppercase">Register</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Contact Start -->
    <div class="container-fluid py-5">
        <div class="container py-2">
            <div class="row">
                <div class="col-lg-12 mb-5 mb-lg-0">
                    <div class="contact-form">
                        <div id="success"></div>
                        <form @submit.prevent="registerNow()" enctype="multipart/form-data">
                            <div class="form-row">
                                <div class="col-sm-6 control-group">
                                    <label for="">First Name <span style="color: red;">*</span></label>
                                    <input type="text" class="form-control p-4" v-model="first_name" placeholder="First Name" />
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="col-sm-6 control-group">
                                    <label for="">Last Name <span style="color: red;">*</span></label>
                                    <input type="text" class="form-control p-4" v-model="last_name" placeholder="Last Name" data-validation-required-message="Please enter your last name" />
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="col-sm-6 control-group">
                                    <label for="">Email Address <span style="color: red;">*</span></label>
                                    <input type="email" class="form-control p-4" v-model="email" placeholder="Your Email" data-validation-required-message="Please enter your email" />
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="col-sm-6 control-group">
                                    <label for="">Date Profiled <span style="color: red;">*</span></label>
                                    <input type="date" class="form-control p-4" v-model="date_profiled" placeholder="Your Email" />
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="col-sm-4 control-group">
                                    <label for="">Primary Legal Counsel <span style="color: red;">*</span></label>
                                    <input type="text" class="form-control p-4" v-model="primary_legal_counsel"/>
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="col-sm-4 control-group">
                                    <label for="">Date of Birth <span style="color: red;">*</span></label>
                                    <input type="date" class="form-control p-4" v-model="date_of_birth"/>
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="col-sm-4 control-group">
                                    <label for="">Profile Image</label>
                                    <input type="file" class="form-control p-4" @change="convertToBase64" />
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="control-group">
                                <label for="">Case Details <span style="color: red;">*</span></label>
                                <textarea class="form-control p-4" rows="6" v-model="case_details" placeholder="Details"></textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                            <div>
                                <button class="btn btn-primary btn-block" type="submit" id="sendMessageButton" @click="handleLoader()">
                                    <span v-if="loading" class="spinner-border spinner-border-sm"></span>
                                    <span v-else>Submit</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->
</template>