<template>
    <section class="mainSection" v-if="loading">
        <loading></loading>
    </section>
    <section class="mainSection" v-else>

        <inner-banner-component page-title="تواصل معنا"></inner-banner-component>

        <div class="liton__shoping-cart-area mb-100">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h3>يمكنك التواصل معنا عبر  </h3>
                    </div>
                    <div class="col-md-4">
                        <div class="contactBox">
                            <a href="tel:+966555301707" target="_blank"><i class="fa fa-phone"></i></a>
                            <h4> الأتصال علي <strong>966555301707+</strong></h4>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="contactBox">
                            <a href="https://wa.me/966555301707" target="_blank"><i class="fab fa-whatsapp"></i></a>
                            <h4>الواتس اب</h4>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="contactBox">
                            <div class="ltn__social-media">
                                <ul>
                                    <li><a href="https://www.facebook.com/profile.php?id=100086364507234" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="https://twitter.com/NamaTaiba" target="_blank" title="Twitter"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="https://www.instagram.com/nama_taiba/" target="_blank" title="Instagram"><i class="fab fa-instagram"></i></a></li>
                                    <li><a href="https://www.snapchat.com/add/nama_taiba?share_id=EdYdd_Y10Pc&locale=en-US" target="_blank" title="Snapchat"><i class="fab fa-snapchat"></i></a></li>
                                    <li><a href="https://www.tiktok.com/@nama_taiba?_t=8Z63GNdCZaE&_r=1" target="_blank" title="Tiktok">
                                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 448 512" class="w-[25px] 2xl:w-[33.33px] h-[25px] 2xl:h-8 text-gray-800" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M448,209.91a210.06,210.06,0,0,1-122.77-39.25V349.38A162.55,162.55,0,1,1,185,188.31V278.2a74.62,74.62,0,1,0,52.23,71.18V0l88,0a121.18,121.18,0,0,0,1.86,22.17h0A122.18,122.18,0,0,0,381,102.39a121.43,121.43,0,0,0,67,20.14Z"></path></svg>
                                    </a></li>
                                </ul>
                            </div>
                            <h4> التواصل الإجتماعي</h4>
                        </div>
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
        document.title = "  تواصل معنا | مصنع نما طيبة ";
        let self = this;
        setTimeout(function (){
            self.loading = false;
        }, 1000);
    },
}
</script>
