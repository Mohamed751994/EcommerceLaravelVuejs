<template>
    <section class="mainSection" v-if="loading">
        <loading></loading>
    </section>
    <section class="mainSection" v-else>

        <inner-banner-component page-title="شركاء النجاح"></inner-banner-component>

        <div class="liton__shoping-cart-area mb-100">
            <div class="container">
                <div class="row">
                    <div class="col">

                        <!-- partners-->
                        <div class="my-5 certificates">
                            <div class="container">
                                <div class="row align-content-center justify-content-between">
                                    <div class="col-md-2 mb-3">
                                        <div class="logoClientBox">
                                            <img src="/public/frontend/img/nama/clients/10.png" alt="nameTeba Partner" />
                                        </div>
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <div class="logoClientBox">
                                            <img src="/public/frontend/img/nama/clients/12.png" alt="nameTeba Clients" />
                                        </div>
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <div class="logoClientBox">
                                            <img src="/public/frontend/img/nama/clients/13.png" alt="nameTeba Clients" />
                                        </div>
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <div class="logoClientBox">
                                            <img src="/public/frontend/img/nama/clients/14.png" alt="nameTeba Clients" />
                                        </div>
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <div class="logoClientBox">
                                            <img src="/public/frontend/img/nama/clients/15.png" alt="nameTeba Clients" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end partners-->

                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
import InnerBannerComponent from "./includes/InnerBannerComponent.vue";
import Loading from "./partials/Loading.vue";
export default {
    components: {InnerBannerComponent,Loading},
    data(){
        return{
            loading:false,
        }
    },
    async created() {
        this.loading = true;
        document.title = "  شركاء النجاح | مصنع نما طيبة ";
        let self = this;
        setTimeout(function (){
            self.loading = false;
        }, 1000);
    },
}
</script>
