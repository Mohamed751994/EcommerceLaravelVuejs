<template>
    <section class="mainSection" v-if="loading">
        <loading></loading>
    </section>
    <section class="mainSection" v-else>

        <inner-banner-component page-title="كل الفواتير"></inner-banner-component>
        <div class="liton__shoping-cart-area mb-100">
            <div class="container">
                <div class="row">
                    <div class="col-12 table-responsive" v-if="invoices.length > 0">
                        <table class="table table-bordered table-striped text-center">
                            <thead>
                            <th>رقم الفاتورة</th>
                            <th>اسم العميل</th>
                            <th> البريد الإلكتروني</th>
                            <th>رقم الهاتف</th>
                            <th></th>
                            </thead>
                            <tbody>
                            <tr v-for="invoice in invoices">
                                <td>{{invoice.invoiceID}}</td>
                                <td>{{invoice.customer_name}}</td>
                                <td>{{invoice.customer_email}}</td>
                                <td>{{invoice.customer_phone}}</td>
                                <td>
                                    <router-link :to="'/invoice/'+invoice.id" class="btn btn-sm btn-success">
                                        الذهاب إلي الفاتورة
                                    </router-link>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-12 text-center" v-else>
                        <h4>لا يوجد فواتير </h4>
                    </div>
                </div>
            </div>
        </div>

    </section>
</template>

<script>
import InnerBannerComponent from "./includes/InnerBannerComponent.vue";
import Loading from "./partials/Loading.vue";
import axios from 'axios';
export default {
    components: {InnerBannerComponent,Loading},
    data(){
        return{
            loading:false,
            invoices: [],
        }
    },
    async created() {
        this.loading = true;
        document.title = "  كل الفواتير | مصنع نما طيبة ";
        await this.getInvoices();
        let self = this;
        setTimeout(function (){
            self.loading = false;
        }, 1000);
    },
    methods: {
        async getInvoices()
        {
            try {
                const response = await axios.get('/api/invoices');
                this.invoices = response.data.data;
            } catch (error) {
                console.error(error);
            }
        },

    }
}
</script>
