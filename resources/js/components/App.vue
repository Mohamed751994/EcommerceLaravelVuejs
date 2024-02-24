<template>


    <div class="body-wrapper">

    <!-- HEADER AREA START (header-4) -->
    <header-component></header-component>
    <!-- Utilize Mobile Menu End -->
        <router-view></router-view>
    <!-- FOOTER AREA START -->
    <footer-component></footer-component>
    <!-- FOOTER AREA END -->


</div>
</template>
<script>
import HeaderComponent from "./includes/HeaderComponent.vue";
import FooterComponent from "./includes/FooterComponent.vue";
export default {
    name: 'App',
    components: {HeaderComponent, FooterComponent},
}
</script>
