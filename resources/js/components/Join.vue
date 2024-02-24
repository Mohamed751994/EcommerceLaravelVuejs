<template>
    <section class="mainSection" v-if="loading">
        <loading></loading>
    </section>
    <section class="mainSection" v-else>

        <inner-banner-component page-title="انضم الينا كمندوب"></inner-banner-component>

        <div class="liton__shoping-cart-area mb-100">
            <div class="container">
                <div class="row">
                    <div class="col-12"  v-if="errors.length">
                        <ul class="list-unstyled alert alert-danger">
                            <li v-for="error in errors">{{ error }}</li>
                        </ul>
                    </div>
                    <form  @submit.prevent="joinUsForm" method="post" class="w-100">
                        <div class="col-lg-12">
                            <div class="ltn__checkout-inner">

                                <div class="ltn__checkout-single-content">
                                    <div class="ltn__checkout-single-content-info">
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
                                                    <input type="email" v-model="formData.email" placeholder="البريد الإلكتروني">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-item input-item-phone ltn__custom-icon">
                                                    <input type="number"  @keypress="onlyNumber" dir="ltr" v-model="formData.phone" placeholder="966************">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12">
                                                <h6>العنوان</h6>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="input-item">
                                                            <input type="text" v-model="formData.address" placeholder="ادخل العنوان  ">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-6">
                                                <h6>المدينة </h6>
                                                <div class="input-item">
                                                    <input type="text" v-model="formData.city" placeholder="المدينة">
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
                                <div class="btn-wrapper text-right mt-4">
                                    <button id="submitJoinBtn" type="submit" class="theme-btn-1 btn btn-effect-1 rounded w-100"> ارسال الطلب </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </section>
</template>

<script>
import InnerBannerComponent from "./includes/InnerBannerComponent.vue";
import Loading from "./partials/Loading.vue";
import axios from "axios";
export default {
    components: {InnerBannerComponent,Loading},
    data(){
        return{
            loading:false,
            errors: [],
            formData: {
                fname: '',
                lname: '',
                email: '',
                phone: '',
                address:'',
                city:'',
                notes: '',
            }
        }
    },
    async created() {
        this.loading = true;
        document.title = "  انضم الينا كمندوب | مصنع نما طيبة ";
        let self = this;
        setTimeout(function (){
            self.loading = false;
        }, 1000);
    },
    methods:{


        //joinUsForm
        joinUsForm()
        {
            var $submitBtn  = $('#submitJoinBtn');
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
            if (this.formData.email === '') {
                this.errors.push('البريد الإلكتروني مطلوب');
            }
            else if (!this.validEmail(this.formData.email)) {
                this.errors.push("صيغة البريد الإلكتروني غير صحيحة");
            }
            if (this.formData.phone === '') {
                this.errors.push('رقم الهاتف مطلوب');
            }
            if (this.formData.address === '') {
                this.errors.push('العنوان بالتفصيل مطلوب');
            }
            if (this.formData.city === '') {
                this.errors.push(' المدينة مطلوبة');
            }
            if (!this.errors.length) {
                //send data here
                let self = this;
                axios.post('/api/join', {
                    name: this.formData.fname+' '+this.formData.lname,
                    email: this.formData.email,
                    phone: this.formData.phone,
                    address: this.formData.address+' - '+this.formData.city,
                    notes: this.formData.notes,
                }).then(response => {

                    if(response.data.status)
                    {
                        $('form')[0].reset();
                        $submitBtn.html('ارسال الطلب');
                        $submitBtn.attr("disabled", false);
                        this.$swal({
                            icon: 'success',
                            title: 'شكراً لك',
                            text: 'تم ارسال الطلب بنجاح سوف يتم التواصل معك في خلال 24 ساعة',
                            showConfirmButton: false,
                            timer: 2000
                        });
                    }
                    else
                    {
                        $submitBtn.html('ارسال الطلب');
                        $submitBtn.attr("disabled", false);
                    }

                }).catch(error => {
                   // this.errors.push(error.response.data.errors);
                    var allErrors = error.response.data.errors;
                    var $this =this;
                    $.each(allErrors, function (key, val) {
                        $this.errors.push(val);
                    });
                    $submitBtn.html('ارسال الطلب');
                    $submitBtn.attr("disabled", false);
                    window.scrollTo({
                        top: 0,
                        behavior: "smooth"
                    });
                });
            }
            else
            {
                $submitBtn.html('ارسال الطلب');
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
