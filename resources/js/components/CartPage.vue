<template>
    <section class="mainSection" v-if="loading">
            <loading></loading>
    </section>
    <section class="mainSection" v-else>

        <inner-banner-component page-title="عربة المشتريات"></inner-banner-component>

        <div class="liton__shoping-cart-area mb-100">
            <div class="container">
                <div class="row" v-if="carts.length > 0">
                    <div class="col-lg-8">
                        <div class="shoping-cart-inner">
                            <div class="shoping-cart-table table-responsive">
                                <table class="table table-striped table-bordered">
                                   <thead>
                                       <tr class="text-center">
                                            <th width="20%" class="cart-product-image">الصورة</th>
                                            <th width="40%" class="cart-product-info">الأسم</th>
                                            <th width="30%" class="cart-product-price">الكمية</th>
                                            <th width="10%" class="cart-product-subtotal">حذف</th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="(cart, n) in carts" class="text-center">
                                            <td width="20%" class="cart-product-image">
                                                <img :src="cart.image" :alt="cart.name">
                                            </td>
                                            <td width="40%" class="cart-product-info">
                                                <h5 class="mb-0">{{cart.name}} - <strong>{{cart.size}}</strong></h5>
                                            </td>
                                            <td width="30%" class="cart-product-quantity">
                                                <div class="d-flex align-items-center justify-content-center">
                                                    <input type="number" min="1" :value="cart.qty" name="qtybutton"
                                                           class="cart-plus-minus-box" :id="'qty_product_'+cart.id">
                                                    <button class="btn btn-sm btn-success rounded" @click="updateQtyProductCart(cart)">
                                                        تحديث
                                                    </button>
                                                </div>
                                            </td>
                                            <td width="10%" class="cart-product-remove">
                                                <button @click="removeCart(n, cart.id)" class="text-danger">
                                                    <i class="fa fa-window-close"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="shoping-cart-inner">
                            <div class="shoping-cart-total">
                                <h4>التفاصيل </h4>
                                <table class="table">
                                    <tbody>
                                    <tr>
                                        <td>عدد المنتجات</td>
                                        <td>{{ carts.length }}</td>
                                    </tr>
                                    </tbody>
                                </table>
                                <div class="btn-wrapper text-right">
                                    <router-link to="/checkout" class="theme-btn-1 btn btn-effect-1">
                                        استكمال عملية الشراء
                                    </router-link>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row " v-else>
                    <div class="col-md-12 text-center" id="empty">
                        <img src="/public/frontend/img/nama/cart.png" class="emptyCartImg"><h3 class="mt-5">
                        عربة المشتريات فارغة </h3>
                        <router-link to="/products" class="btn btn-orange rounded">تسوق الآن</router-link>
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
    components: {Loading, InnerBannerComponent},
    data() {
        return {
            carts: [],
            loading:false,
        }
    },
    async created() {
        this.loading = true;
        this.viewCart();
        document.title = " عربة المشتريات | مصنع نما طيبة ";
        let self = this;
        setTimeout(function (){
            self.loading = false;
        }, 1000);
    },
    methods: {
        //View Cart
        viewCart() {
            if (localStorage.getItem('carts')) {
                this.carts = JSON.parse(localStorage.getItem('carts'));
                $('.cartCountHeader').html(this.carts.length);
            }
        },

        //Remove Item in cart list
        removeCart(pro){
            this.carts.splice(pro, 1);
            this.storeCart();
            this.$swal({
                icon: 'success',
                title: 'نجح',
                text: 'تم حذف المنتج من العربة',
                showConfirmButton: false,
                timer: 2000
            });
            },

        //Store Cart In LocalStorage
        async storeCart(){
            let parsed = JSON.stringify(this.carts);
            localStorage.setItem('carts', parsed);
            this.viewCart();
        },

        async updateQtyProductCart(pro)
        {
            pro.qty = parseInt($('#qty_product_' + pro.id).val());
            await this.storeCart();
            this.$swal({
                icon: 'success',
                title: 'نجح',
                text: 'تم تحديث كمية المنتج بنجاح',
                showConfirmButton: false,
                timer: 2000
            });
        }

    }
}
</script>
