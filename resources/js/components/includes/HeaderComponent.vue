<template>
    <section class="mainSection">
        <header class="ltn__header-area ltn__header-8 section-bg-6">


            <!-- ltn__header-middle-area start -->
            <div class="ltn__header-middle-area ltn__header-sticky ltn__sticky-bg-white plr--5---">
                <div class="container">
                    <div class="row">
                        <div class="col logo-column">
                            <div class="site-logo">
                                <router-link to="/"><img src="/public/frontend/img/nama/logo.png" alt="Logo"></router-link>
                            </div>
                        </div>
                        <div class="col header-menu-column">
                            <div class="header-menu d-none d-xl-block">
                                <nav>
                                    <div class="ltn__main-menu">
                                        <ul>
                                            <li class="menu-icon"><router-link to="/">الرئيسية</router-link></li>
                                            <li><router-link to="/products">المنتجات</router-link></li>
                                            <li><router-link to="/about-us">من نحن</router-link></li>
                                            <li><router-link to="/quality">الجودة</router-link></li>
                                            <li><router-link to="/partners">شركاء النجاح</router-link></li>
                                            <li><router-link to="/blogs"> المقالات</router-link></li>
                                            <li><router-link to="/contact-us">تواصل معنا</router-link></li>
                                            <li>
                                                <router-link to="/join-us" class="btn btn-success rounded">
                                                    <i class="icon-user"></i> <small>التسجيل كمندوب</small>
                                                </router-link>
                                            </li>
                                        </ul>
                                    </div>
                                </nav>
                            </div>
                        </div>
                        <div class="col ">
                            <div class="ltn__header-options ltn__drop-menu user-menu w-100">
                                <ul class="d-flex justify-content-lg-end justify-content-between align-items-center">

                                    <li class="mx-2">
                                        <!-- mini-cart 2 -->
                                        <div class="mini-cart-icon mini-cart-icon-2">
                                            <router-link to="/cart" class="">
                                            <span class="mini-cart-icon">
                                                <i class="icon-handbag"></i>
                                                <sup class="cartCountHeader">{{ cartTotalItems }}</sup>
                                            </span>
                                            </router-link>
                                        </div>
                                    </li>

                                    <li>
                                        <!-- Mobile Menu Button -->
                                        <div class="mobile-menu-toggle d-xl-none">
                                            <a href="#ltn__utilize-mobile-menu" class="ltn__utilize-toggle">
                                                <svg viewBox="0 0 800 600">
                                                    <path d="M300,220 C300,220 520,220 540,220 C740,220 640,540 520,420 C440,340 300,200 300,200" id="top"></path>
                                                    <path d="M300,320 L540,320" id="middle"></path>
                                                    <path d="M300,210 C300,210 520,210 540,210 C740,210 640,530 520,410 C440,330 300,190 300,190" id="bottom" transform="translate(480, 320) scale(1, -1) translate(-480, -318) "></path>
                                                </svg>
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ltn__header-middle-area end -->
        </header>
        <!-- HEADER AREA END -->
        <!-- Utilize Mobile Menu Start -->
        <div id="ltn__utilize-mobile-menu" class="ltn__utilize ltn__utilize-mobile-menu">
            <div class="ltn__utilize-menu-inner ltn__scrollbar">
                <div class="ltn__utilize-menu-head">
                    <div class="site-logo">
                        <a href="#"><img src="/public/frontend/img/nama/logo.png" alt="namaTeba"></a>
                    </div>
                    <button class="ltn__utilize-close">×</button>
                </div>
                <div class="ltn__utilize-menu">
                    <ul>

                        <li class="menu-icon"><router-link to="/">الرئيسية</router-link></li>
                        <li><router-link to="/products">المنتجات</router-link></li>
                        <li><router-link to="/about-us">من نحن</router-link></li>
                        <li><router-link to="/quality">الجودة</router-link></li>
                        <li><router-link to="/partners">شركاء النجاح</router-link></li>
                        <li><router-link to="/blogs"> المقالات</router-link></li>
                        <li><router-link to="/contact-us">تواصل معنا</router-link></li>
                        <li>
                            <router-link to="/join-us" class="btn btn-success rounded">
                                <i class="icon-user"></i> <small>التسجيل كمندوب</small>
                            </router-link>
                        </li>


                    </ul>
                </div>


            </div>
        </div>
        <div class="ltn__utilize-overlay"></div>
    </section>
</template>

<script>
export default {
    data(){
        return {
            cartTotalItems : 0
        }
    },
    async created(){
        await this.viewCart();
    },
    methods: {
        async viewCart(){
            if(localStorage.getItem('carts')){
                this.carts = JSON.parse(localStorage.getItem('carts'));
                this.cartTotalItems = this.carts.length;
            }
        },
    }
}
</script>
