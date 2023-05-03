<!-- eslint-disable vue/multi-word-component-names -->
// eslint-disable-next-line vue/multi-word-component-names
<template>
    <!-- Header Start -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 bg-secondary d-none d-lg-block">
                <RouterLink to="/" class="navbar-brand w-100 h-100 m-0 p-0 d-flex align-items-center justify-content-center">
                    <h1 class="m-0 display-5 text-primary text-uppercase">LAW FIRM X</h1>
                </RouterLink>
            </div>
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-white navbar-light p-0">
                    <RouterLink to="/" class="navbar-brand d-block d-lg-none">
                        <h1 class="m-0 display-4 text-primary text-uppercase">LAW FIRM X</h1>
                    </RouterLink>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse p-3 justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <RouterLink to="/clients" class="text-primary nav-item nav-link d-lg-none">Clients</RouterLink>
                        </div>
                        <RouterLink to="/clients" class="btn btn-primary mr-3 d-none d-lg-block">Clients</RouterLink>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- Header End -->
</template>