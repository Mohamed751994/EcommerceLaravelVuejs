<template>

    <section class="mainSection" v-if="loading">
        <loading></loading>
    </section>
    <section class="mainSection" v-else>
        <inner-banner-component :page-title="'منتجاتنا  - '+product.name"></inner-banner-component>

        <div class="container">
            <div class="row my-5">
                <div class="col-md-12">
                    <h1 class="my-4">{{product.name}} - <strong>({{product.size}})</strong></h1>
                    <p v-html="product.description"></p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-6 mb-4">
                    <div class="product-image">
                        <img class="productImg1" :src="product.image" :alt="product.alt" style="width: 100%;">
                    </div>
                </div>
                <div class="col-lg-3 col-6 mb-4">
                    <div class="product-image">
                        <img class="productImg2" :src="product.image" :alt="product.alt" style="width: 100%;">
                    </div>
                </div>
                <div class="col-lg-3 col-6 mb-4">
                    <div class="product-image">
                        <img class="productImg3" :src="product.image" :alt="product.alt" style="width: 100%;">
                    </div>
                </div>
                <div class="col-lg-3 col-6 mb-4">
                    <div class="product-details">
                        <h6>{{product.name}}</h6>
                        <p class="my-4">{{product.size}}</p>
                        <a v-if="!checkIfItemExists(product.id)" href="#" title="اضف للعربة" :id="'addToCart_'+product.id" @click.prevent="addCart(product)">
                            <span class="cart-text">
                                <i class="fa fa-cart-plus mx-2"></i> اضف للعربة
                            </span>
                        </a>
                        <router-link v-else to="/cart" title="الذهاب للعربة" class="go_to_cart" :id="'goToCart_'+product.id">
                            <span class="cart-text">
                                <i class="fa fa-shopping-cart mx-2"></i> الذهاب للعربة
                            </span>
                        </router-link>
                        <router-link  to="/cart" title="الذهاب للعربة" class="go_to_cart d-none" :id="'goToCartHide_'+product.id">
                            <span class="cart-text">
                                <i class="fa fa-shopping-cart mx-2"></i> الذهاب للعربة
                            </span>
                        </router-link>
                    </div>
                </div>
            </div>
        </div>

        <div class="container my-5">
            <div class="row related-products">
                <div class="col-12">
                    <h4 class="title mt-4">منتجات متشابهة</h4>
                </div>
                <div  v-for="product in products" :key="product.id" class=" col-lg-3 col-md-6 col-12 ">
                    <div class="ltn__product-item text-center singleProductItem">
                        <div class="fixed_imgs_product_card d-flex justify-content-between align-items-center">
                            <img src="/public/frontend/img/nama/quality.png"  :alt="product.alt" />
                            <img src="/public/frontend/img/nama/vision.png"  :alt="product.alt" />
                            <img src="/public/frontend/img/nama/code.png"  :alt="product.alt" />
                        </div>
                        <div class="product-img">
                            <router-link :to="'/product/'+product.id+'/'+product.slug"><img class="productImg" :src="product.image" :alt="product.alt"></router-link>
                            <div class="product-hover-action product-hover-action-2">
                                <ul>
                                    <li>
                                        <router-link :to="'/product/'+product.id+'/'+product.slug" title="تفاصيل المنتج">
                                            <i class="fa fa-eye"></i>
                                        </router-link>
                                    </li>
                                    <li class="add-to-cart">
                                        <a v-if="!checkIfItemExists(product.id)" href="#" title="اضف للعربة" :id="'addToCart_'+product.id" @click.prevent="addCart(product)">
                                        <span class="cart-text">
                                            <i class="fa fa-cart-plus mx-2"></i> اضف للعربة
                                        </span>
                                        </a>
                                        <router-link v-else to="/cart" title="الذهاب للعربة" class="go_to_cart" :id="'goToCart_'+product.id">
                                        <span class="cart-text">
                                            <i class="fa fa-shopping-cart mx-2"></i> الذهاب للعربة
                                        </span>
                                        </router-link>
                                        <router-link  to="/cart" title="الذهاب للعربة" class="go_to_cart d-none" :id="'goToCartHide_'+product.id">
                                        <span class="cart-text">
                                            <i class="fa fa-shopping-cart mx-2"></i> الذهاب للعربة
                                        </span>
                                        </router-link>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-info">
                            <h2 class="product-title"><router-link :to="'/product/'+product.id+'/'+product.slug">{{ product.name }} </router-link></h2>
                            <div class="product-price">
                                <small>{{ product.size }}</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

</template>

<script>
import axios from 'axios';
import Loading from "./partials/Loading.vue";
import InnerBannerComponent from "./includes/InnerBannerComponent.vue";
import ProductComponent from "./partials/ProductComponent.vue";


export default {
    components: {InnerBannerComponent,Loading,ProductComponent},
    props: ['pageName','pageSlug'],
    data() {
        return {
            loading:false,
            product: '',
            products: [],
            carts: [],
            addToCart: {
                id: '',
                name: '',
                size: '',
                slug: '',
                description: '',
                price: '',
                image:'',
                qty: 1
            },
        }
    },

    async created() {
        // watch the params of the route to fetch the data again
        this.$watch(
            () => this.$route.params,
            () => {
                 this.getSingleProduct();
            },
            // fetch the data when the view is created and the data is
            // already being observed
            { immediate: true }
        )
        this.viewCart();
    },
    methods: {
        //Get All Products
        async getSingleProduct() {
            try {
                this.loading = true;
                const response = await axios.get('/api/product/'+`${this.$route.params.id}`+'/'+`${this.$route.params.slug}`);
                this.product = response.data.data.product;
                this.products = response.data.data.products;
                this.loading = false;
            } catch (error) {
                console.error(error);
            }
        },

        //View Cart
        viewCart(){
            if(localStorage.getItem('carts')){
                this.carts = JSON.parse(localStorage.getItem('carts'));
                $('.cartCountHeader').html(this.carts.length);
            }
        },

        //Check if product in cart or not
        checkIfItemExists(id) {
            const items = localStorage.getItem('carts')
            let itemExists = false
            if (items) {
                const itemsData = JSON.parse(items)
                itemExists =  itemsData.find(item => item.id === id)
            }

            return itemExists
        },

        //Add To Cart
        async addCart(pro){
            this.addToCart.id = pro.id;
            this.addToCart.name = pro.name;
            this.addToCart.size = pro.size;
            this.addToCart.description = pro.description;
            this.addToCart.price = pro.price;
            this.addToCart.image = pro.image;
            this.addToCart.qty = 1;
            if(this.checkIfItemExists(pro.id))
            {

            }
            else
            {
                this.carts.push(this.addToCart);
                this.addToCart = {};
                await this.storeCart();
                $('#addToCart_'+pro.id).hide();
                $('#goToCartHide_'+pro.id).removeClass('d-none');
                this.$swal({
                    icon: 'success',
                    title: 'نجح',
                    text: 'تم إضافة المنتج إلي العربة',
                    showConfirmButton: false,
                    timer: 2000
                });
            }
        },

        //Store Cart In LocalStorage
        async storeCart(){
            let parsed = JSON.stringify(this.carts);
            localStorage.setItem('carts', parsed);
            this.viewCart();
        },
    }
}
</script>
