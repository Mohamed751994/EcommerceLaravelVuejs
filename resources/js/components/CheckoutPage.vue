<template>
    <section class="mainSection" v-if="loading">
        <loading></loading>
    </section>
    <section class="mainSection" v-else>

        <inner-banner-component page-title="استكمال عملية الدفع"></inner-banner-component>


        <div class="ltn__checkout-area mb-100">
            <div class="container">
                <div class="row" v-if="carts.length > 0">

                    <div class="col-12"  v-if="errors.length">
                        <ul class="list-unstyled alert alert-danger">
                            <li v-for="error in errors">{{ error }}</li>
                        </ul>
                    </div>
                    <form  @submit.prevent="saveUserInvoice" method="post" class="w-100">
                    <div class="col-lg-12">
                        <div class="ltn__checkout-inner">

                            <div class="ltn__checkout-single-content">
                                <h4 class="title-2"> تفاصيل الفاتورة</h4>
                                <div class="ltn__checkout-single-content-info">
                                        <h6>البيانات الشخصية</h6>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="input-item input-item-name ltn__custom-icon">
                                                    <input type="text" v-model="formData.fname" placeholder="الأسم الأول" >
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-item input-item-name ltn__custom-icon">
                                                    <input type="text" v-model="formData.lname"  placeholder="الأسم الأخير">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-item input-item-email ltn__custom-icon">
                                                    <input type="email" v-model="formData.customer_email" placeholder="البريد الإلكتروني">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-item input-item-phone ltn__custom-icon">
                                                    <input type="number"  @keypress="onlyNumber" dir="ltr" v-model="formData.customer_phone" placeholder="966************">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12">
                                                <h6>العنوان</h6>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="input-item">
                                                            <input type="text" v-model="formData.customer_address" placeholder="ادخل العنوان المراد عليه الطلب ">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-6">
                                                <h6>المدينة </h6>
                                                <div class="input-item">
                                                    <input type="text" v-model="formData.customer_city" placeholder="المدينة">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <h6>الدولة </h6>
                                                <div class="input-item">
                                                    <input type="text"  v-model="formData.customer_state" placeholder="الدولة">
                                                </div>
                                            </div>

                                        </div>
                                        <h6>ملاحظات أخري (غير إلزامي)</h6>
                                        <div class="input-item input-item-textarea ltn__custom-icon">
                                            <textarea v-model="formData.notes" placeholder="ملاحظات أخري تريد إضافتها"></textarea>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="shoping-cart-total">
                            <h4 class="title-2">تفاصيل المنتجات</h4>
                            <table class="table checkout-table">
                                <thead>
                                <tr>
                                    <td>المنتج</td>
                                    <td>الكمية</td>
                                    <td>سعر الحبة</td>
                                    <td>السعر الكلي</td>
                                    <td>حذف</td>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="(cart, n) in carts">
                                    <td>
                                        <div class="">
                                            <img :src="cart.image" width="50" :alt="cart.name" />
                                            <strong>{{cart.name}} - <strong>{{cart.size}}</strong></strong>
                                        </div>
                                    </td>
                                    <td> {{cart.qty}}</td>
                                    <td>  <strong>{{cart.price}}</strong>  ر.س </td>
                                    <td>  <strong>{{ parseFloat(cart.price * cart.qty).toFixed(2) }}</strong>  ر.س </td>
                                    <td>
                                        <button type="button" @click="removeCart(n, cart.id)" class="text-danger">
                                            <i class="fa fa-window-close"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr class="totalPriceTr">
                                    <td><strong>السعر الإجمالي</strong></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><strong><span>{{ parseFloat(totalPrice).toFixed(2) }}</span> ر.س</strong></td>

                                </tr>
                                </tbody>
                            </table>
                            <div class="btn-wrapper text-right mt-4">
                                <button id="submitInvoiceBtn" type="submit" class="theme-btn-1 btn btn-effect-1 rounded w-100"> إتمام الطلب </button>
                            </div>
                        </div>
                    </div>
                    </form>
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
import axios from 'axios';
import Loading from "./partials/Loading.vue";

export default {
    components: {Loading, InnerBannerComponent},
    data() {
        return {
            loading:false,
            carts: [],
            totalPrice: 0,
            errors: [],
            formData: {
                fname: '',
                lname: '',
                customer_email: '',
                customer_phone: '',
                customer_address:'',
                customer_state:'',
                customer_city:'',
                notes: '',
                products:'',
                total:'',
            }
        }
    },
    async created() {
        this.loading = true;
        this.viewCart();
        this.totalPriceFunction();
        document.title = "  استكمال عملية الدفع | مصنع نما طيبة ";
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
            this.totalPriceFunction();
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

        //Calculate Cart Total Price
        totalPriceFunction(){
            let totalPrice = 0;
            this.carts.forEach((item, i) => {
                totalPrice += item.price * item.qty;
            });
            this.totalPrice =  totalPrice;
        },


        //saveUserInvoice
        saveUserInvoice()
        {
            var $submitBtn  = $('#submitInvoiceBtn');
            $submitBtn.html(" <div class='loader4'></div> ");
            $submitBtn.attr("disabled", true);
            //Frontend Validation Error
            this.errors = [];

            if (this.formData.fname === '') {
                this.errors.push('الأسم الأول مطلوب');
            }
            if (this.formData.lname === '') {
                this.errors.push('الأسم الأخير مطلوب');
            }
            if (this.formData.customer_email === '') {
                this.errors.push('البريد الإلكتروني مطلوب');
            }
            else if (!this.validEmail(this.formData.customer_email)) {
                this.errors.push("صيغة البريد الإلكتروني غير صحيحة");
            }
            if (this.formData.customer_phone === '') {
                this.errors.push('رقم الهاتف مطلوب');
            }
            if (this.formData.customer_address === '') {
                this.errors.push('العنوان بالتفصيل مطلوب');
            }
            if (this.formData.customer_state === '') {
                this.errors.push(' حقل الدولة مطلوب');
            }
            if (this.formData.customer_city === '') {
                this.errors.push(' المدينة مطلوبة');
            }
            if (!this.errors.length) {
                //send data here
                let self = this;
                axios.post('/api/invoice', {
                    customer_name: this.formData.fname+' '+this.formData.lname,
                    customer_email: this.formData.customer_email,
                    customer_phone: this.formData.customer_phone,
                    customer_address: this.formData.customer_address+' - '+this.formData.customer_city+' - '+this.formData.customer_state,
                    notes: this.formData.notes,
                    products: this.carts,
                    totalPrice: this.totalPrice,
                }).then(response => {

                    if(response.data.status)
                    {
                       $('form')[0].reset();
                        $submitBtn.html('إتمام الطلب');
                        $submitBtn.attr("disabled", false);
                        localStorage.clear();
                        $('.cartCountHeader').html('0');
                        this.$swal({
                            icon: 'success',
                            title: 'نجح',
                            text: 'تم إنشاء الطلب بنجاح',
                            showConfirmButton: false,
                            timer: 2000
                        });
                        this.$router.push({
                            name: 'InvoicePreview',
                            params: { id: response.data.data.id}
                        });
                    }
                    else
                    {
                        $submitBtn.html('إتمام الطلب');
                        $submitBtn.attr("disabled", false);
                    }

                }).catch(error => {
                    console.log('error')
                    $submitBtn.html('إتمام الطلب');
                    $submitBtn.attr("disabled", false);
                });
            }
            else
            {
                $submitBtn.html('إتمام الطلب');
                $submitBtn.attr("disabled", false);
                window.scrollTo({
                    top: 0,
                    behavior: "smooth"
                });
            }
        },

        //validate input email
        validEmail(email) {
            var re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return re.test(email);
        },

        //validate input number
        onlyNumber($event) {
            //console.log($event.keyCode); //keyCodes value
            let keyCode = ($event.keyCode ? $event.keyCode : $event.which);
            if ((keyCode < 48 || keyCode > 57)) { // 46 is dot
                $event.preventDefault();
            }
        },


    }
}
</script>
