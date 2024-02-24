<template>
    <section class="mainSection" v-if="loading">
        <loading></loading>
    </section>
    <section class="mainSection" v-else>

        <inner-banner-component page-title="404 صفحة غير موجودة"></inner-banner-component>

        <div class="container my-5">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1>404 صفحة غير موجودة</h1>
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
        document.title = "  404 صفحة غير موجودة | مصنع نما طيبة ";
        let self = this;
        setTimeout(function (){
            self.loading = false;
        }, 1000);
    },
}
</script>
