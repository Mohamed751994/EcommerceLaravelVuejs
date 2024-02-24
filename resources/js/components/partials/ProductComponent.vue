<template>
    <section class="mainSection">
            <div class="row justify-content-center" v-if="loading">
                <loading></loading>
            </div>
            <div class="row justify-content-center" v-else>
            <!-- ltn__product-item -->
            <div  v-for="product in products" :key="product.id" class=" col-lg-4 col-md-6 col-12 ">
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
            <!-- ltn__product-item -->
         </div>
    </section>
</template>

<script>
import axios from 'axios';
import Loading from "./Loading.vue";
export default {
    components: {Loading},
    props: ['pageName'],
    data() {
        return {
            loading:false,
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
        await this.getAllProducts();
        this.viewCart();
    },
    methods: {
        //Get All Products
        async getAllProducts() {
            try {
                this.loading = true;
                const response = await axios.get('/api/products',{params:{pageName:this.pageName}});
                this.products = response.data.data;
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
