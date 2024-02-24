<template>
    <section class="mainSection">
        <div class="ltn__breadcrumb-area ltn__breadcrumb-area-4 ltn__breadcrumb-color-white---">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ltn__breadcrumb-inner text-center">
                            <h1 class="ltn__page-title"> {{ pageTitle }}</h1>
                            <div class="ltn__breadcrumb-list">
                                <ul>
                                    <li><router-link to="/">الرئيسية</router-link></li>
                                    <li>{{ pageTitle }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
export default {
    props: ['pageTitle'],
}
</script>
