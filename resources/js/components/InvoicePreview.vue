<template>
    <section class="mainSection" v-if="loading">
        <loading></loading>
    </section>
    <section class="mainSection" v-else>

        <div class="ltn__product-area ltn__product-gutter  pt-50 pb-40---">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 mx-auto my-4">
                        <button class="btn btn-orange w-100 m-0 rounded mb-3" @click="print">طباعة الفاتورة</button>
                        <div id="invoicePreview" class="row invoicePreview">
                            <div class="invoiceHeader d-flex align-items-center justify-content-around w-100">
                                <div class="col-md-4">
                                    <img src="/public/frontend/img/nama/logo.png" width="200" />
                                </div>
                                <div class="col-md-7">
                                    <h3 class="mb-0 text-white">عرض فاتورة طلب شراء</h3>
                                </div>
                            </div>

                            <div class="col-md-12 my-3 mt-4">

                                <h4 class="title-2 mb-3">  رقم الفاتورة : <strong> {{invoice.invoiceID}}</strong> </h4>

                                <h4 class="title-2 mb-1">بيانات العميل</h4>
                                <div class="row">
                                    <div class="col-md-6">
                                        <ul class="list-unstyled">
                                            <li> الأسم : <strong>{{invoice.customer_name}}</strong> </li>
                                            <li> البريد الإلكتروني : <strong>{{invoice.customer_email}}</strong> </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-6">
                                        <ul class="list-unstyled">
                                            <li> رقم الهاتف : <strong>{{invoice.customer_phone}}</strong> </li>
                                            <li> العنوان : <strong>{{invoice.customer_address}}</strong> </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12 mt-3">
                                <div class="shoping-cart-total">
                                    <h4 class="title-2">تفاصيل المنتجات</h4>
                                    <table class="table checkout-table">
                                        <thead>
                                        <tr>
                                            <td>المنتج</td>
                                            <td>الكمية</td>
                                            <td>سعر الحبة</td>
                                            <td>السعر الكلي</td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr v-for="product in invoice.products">
                                            <td>
                                                <div class="">
                                                    <img :src="product.image" width="50" :alt="product.name" />
                                                    <strong>{{product.name}}</strong>
                                                </div>
                                            </td>
                                            <td> {{product.qty}}</td>
                                            <td>  <strong>{{product.price}}</strong>  ر.س </td>
                                            <td>  <strong>{{ parseFloat(product.price * product.qty).toFixed(2) }}</strong>  ر.س </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-12 text-center my-4">
                                <h4><strong>السعر الإجمالي : </strong> <strong><span>{{invoice.totalPrice}}</span> ر.س</strong></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
import InnerBannerComponent from "./includes/InnerBannerComponent.vue";
import ProductComponent from "./partials/ProductComponent.vue";
import Loading from "./partials/Loading.vue";

import axios from 'axios';
export default {
    components: {Loading, ProductComponent, InnerBannerComponent},
    data() {
        return {
            invoice: '',
            loading:false,
        }
    },
    async created() {
        this.loading = true;
        document.title = " الفاتورة | مصنع نما طيبة ";
        await this.getInvoiceDetails();
        let self = this;
        setTimeout(function (){
            self.loading = false;
        }, 1000);
    },
    methods: {
        async getInvoiceDetails()
        {
            try {
                const response = await axios.get('/api/invoice/'+this.$route.params.id);
                this.invoice = response.data.data;
            } catch (error) {
                console.error(error);
            }
        },
        print () {
            // Pass the element id here
            this.$htmlToPaper('invoicePreview');
        }
    }
}
</script>
