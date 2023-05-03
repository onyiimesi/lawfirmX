<template>
    <!-- Carousel Start -->
    <div class="container-fluid p-0 ">
        <div id="header-carousel" class="carousel slide carousel-fade" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item position-relative active" style="height: 100vh; min-height: 400px;">
                    <img class="position-absolute w-100 h-100" src="img/carousel-1.jpg" style="object-fit: cover;">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h4 class="text-white text-uppercase mb-4" style="letter-spacing: 3px;">Welcome to</h4>
                            <h3 class="display-2 text-capitalize text-white mb-4">Law Firm X</h3>
                            <RouterLink class="btn btn-primary py-3 px-5 mt-2" to="/register">Register Client</RouterLink>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    <!-- Carousel End -->

</template>