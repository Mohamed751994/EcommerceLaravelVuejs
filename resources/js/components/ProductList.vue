<template>
    <section class="mainSection">

        <inner-banner-component page-title="منتجاتنا"></inner-banner-component>

        <div class="ltn__product-area ltn__product-gutter  pt-50 pb-40---">
            <div class="container">
                <product-component pageName="products"></product-component>
            </div>
        </div>
    </section>
</template>

<script>
import InnerBannerComponent from "./includes/InnerBannerComponent.vue";
import ProductComponent from "./partials/ProductComponent.vue";
export default {
    components: {ProductComponent, InnerBannerComponent},

    async created() {
        document.title = " المنتجات | مصنع نما طيبة ";
    },
}
</script>
