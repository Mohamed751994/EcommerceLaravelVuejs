<template>
    <section class="mainSection" v-if="loading">
        <loading></loading>
    </section>
    <section class="mainSection" v-else>
        <!-- SLIDER AREA START (slider-6) -->
        <div class="ltn__slider-area ltn__slider-3 ltn__slider-6">
            <div class="ltn__slide-two-active   arrow-white--">
                <!-- ltn__slide-item  -->
                <div class="ltn__slide-item ltn__slide-item-8 ltn__slide-item-9--- text-color-white bg-image bg-overlay-theme-black-10---" data-bg="/frontend/img/nama/banner.jpg">
                    <div class="overlay"></div>
                    <div class="ltn__slide-item-inner text-center">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12 align-self-center">
                                    <div class="slide-item-info">
                                        <div class="slide-item-info-inner ">
                                            <div class="slide-item-info">
                                                <div class="slide-item-info-inner ">
                                                    <h2 class="slide-title white-color  ">
                                                        مصنع نما طيبة للمنتجات البركانية والخرسانية
                                                    </h2>
                                                    <div class="btn-wrapper ">
                                                        <a href="#" class="theme-btn-1 btn btn-round">تسوق الآن</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--  -->
            </div>
        </div>
        <!-- SLIDER AREA END -->


        <!-- PRODUCT AREA START -->
        <div class="ltn__product-area ltn__product-gutter  pt-50 pb-40---">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title-area text-center">
                            <h2 class="section-title section-title-border">منتجاتنا</h2>
                        </div>
                    </div>
                </div>
                <product-component pageName="home"></product-component>
            </div>
        </div>
        <!-- PRODUCT SLIDER AREA END -->


        <!--About Us-->
        <div class="aboutus my-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title-area text-center">
                            <h2 class="section-title section-title-border">معلومات عن المصنع</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <h4><strong>أهدافنا</strong></h4>
                        <p>ايجاد بيئة عمل متكاملة, نستثمر من خلالها أعلى الكفائات والخبرات البشرية, لمواكبة احتياجات ومتطلبات السوق السعودى والعربى بشكل عام. مع مسيرة ااتطوير والتنمية التى تشهدها المملكة بكافة مناحى الحياة والمجنمع ومصممون على التميز فى كل مجالات أعمالنا وفق فلسفة تنتهج الجودة المتكاملة باستخدام ما نملكه من قدرات فنية وموارد بشرية والاستعانة بأحدث ما توصلت اليه التكنولوجيا الحديثة من برامج.</p>
                        <div class="my-3">
                            <a class="btn btn-orange rounded" href="/public/frontend/img/nama/NamaTaiba-profile.pdf" download="">
                                تحميل ملف نما طيبة
                            </a>
                        </div>
                        <img class="mt-3" src="/public/frontend/img/nama/about.png" width="100%" alt="namaTeba factory" />
                    </div>
                    <div class="col-md-6">
                        <h4><strong>لماذا نحن</strong></h4>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <div class="aboutBox">
                                    <h5> سهولة التلييس  </h5>
                                    <p>
                                        يمتاز البك البركانى بسطحه الخشن وهذا يساعد على تماسك اللياسة مع توفير أو الغاء عملية الطرطشة كما أن طبقة اللياسة تصبح أقل سماكة مما يوفر فى الأسمنت
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="aboutBox">
                                    <h5> خفيف الوزن </h5>
                                    <p>
                                        يعتبر أخف وزن بكثير من البلك الأسمنتى والبلك الطينى الحامل من نفس المقاس
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="aboutBox">
                                    <h5>القوة والمتانة  </h5>
                                    <p>
                                        نتيجة ارتفاع قوة الضغط المستخدمة فى التصنيع فان مقاومته للضغط عالية جدا
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="aboutBox">
                                    <h5>سهولة التمديدات </h5>
                                    <p>
                                        يمكن قص البلك البركانى بدون أن ينكسر وتجرى التمديدات على الفجوة الخارجية مع المحتفظة على قوة البلك وعزله الحرارى
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="aboutBox">
                                    <h5> يقبل تركيب المسامير  </h5>
                                    <p>
                                        يتحمل البلك البركاني عملية تركيب المسامير فى الجدران بكفاءة عالية خاصة عند تركيب المفصلات للأبواب والمسامير ولتثبيت الرخام والحجر
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="aboutBox">
                                    <h5> مقاوم للحريق </h5>
                                    <p>
                                        يعتبر من أفضل أنواع البلك على الاطلاق فى مقاومة النار واللهب المباشر حيث أن المادة الأولية هى مادة خاملة غير قابلة للاحتراق
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!--End About Us-->


        <!-- Certificates and accrediations-->
        <div class="my-5 certificates">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title-area text-center">
                            <h2 class="section-title section-title-border"> الشهادات والإعتمادات</h2>
                            <p>مصنع نما طيبة حاصل على جميع الشهادات والاعتمادات من الجهات السعودية المختصة</p>
                        </div>
                    </div>

                </div>
                <div class="row align-content-center justify-content-center">
                    <div class="col-md-3 mb-3">
                        <div class="logoClientBox">
                            <img src="/public/frontend/img/nama/clients/1.png" alt="nameTeba Clients" />
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="logoClientBox">
                            <img src="/public/frontend/img/nama/clients/2.png" alt="nameTeba Clients" />
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="logoClientBox">
                            <img src="/public/frontend/img/nama/clients/3.png" alt="nameTeba Clients" />
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="logoClientBox">
                            <img src="/public/frontend/img/nama/clients/4.png" alt="nameTeba Clients" />
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="logoClientBox">
                            <img src="/public/frontend/img/nama/clients/5.png" alt="nameTeba Clients" />
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="logoClientBox">
                            <img src="/public/frontend/img/nama/clients/6.png" alt="nameTeba Clients" />
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="logoClientBox">
                            <img src="/public/frontend/img/nama/clients/7.png" alt="nameTeba Clients" />
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="logoClientBox">
                            <img src="/public/frontend/img/nama/clients/8.png" alt="nameTeba Clients" />
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="logoClientBox">
                            <img src="/public/frontend/img/nama/clients/9.png" alt="nameTeba Clients" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end Certificates and accrediations-->

        <!-- partners-->
        <div class="my-5 certificates">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title-area text-center">
                            <h2 class="section-title section-title-border">  شركاء النجاح</h2>
                        </div>
                    </div>

                </div>
                <div class="row align-content-center justify-content-between">
                    <div class="col-md-2 mb-3">
                        <div class="logoClientBox">
                            <img src="/public/frontend/img/nama/clients/10.png" alt="nameTeba Partner" />
                        </div>
                    </div>
                    <div class="col-md-2 mb-3">
                        <div class="logoClientBox">
                            <img src="/public/frontend/img/nama/clients/12.png" alt="nameTeba Clients" />
                        </div>
                    </div>
                    <div class="col-md-2 mb-3">
                        <div class="logoClientBox">
                            <img src="/public/frontend/img/nama/clients/13.png" alt="nameTeba Clients" />
                        </div>
                    </div>
                    <div class="col-md-2 mb-3">
                        <div class="logoClientBox">
                            <img src="/public/frontend/img/nama/clients/14.png" alt="nameTeba Clients" />
                        </div>
                    </div>
                    <div class="col-md-2 mb-3">
                        <div class="logoClientBox">
                            <img src="/public/frontend/img/nama/clients/15.png" alt="nameTeba Clients" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end partners-->

        <!-- contactus-->
        <div class="my-5 pt-50 contactus">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title-area text-center">
                            <h2 class="section-title section-title-border">  تواصل معنا</h2>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="ltn__contact-address-area mb-60">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="ltn__contact-address-item ltn__contact-address-item-4 box-shadow">
                                            <div class="ltn__contact-address-icon">
                                                <i class="icon-location-pin"></i>
                                            </div>
                                            <h3>العنوان</h3>
                                            <p>الادارة : المدينة المنورة - شارع الملك عبد العزيز - مبنى الخمرى بلازا - الدور السابع - مكتب 13<br>
                                                المصنع : المنطقة الصناعية الجديدة مدن شارع (63)</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="ltn__contact-address-item ltn__contact-address-item-4 box-shadow">
                                            <div class="ltn__contact-address-icon">
                                                <i class="icon-phone"></i>
                                            </div>
                                            <h3>رقم الهاتف</h3>
                                            <p>0555301707   <br>
                                                0500361234 <br>
                                                0505301707</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="ltn__contact-address-item ltn__contact-address-item-4 box-shadow">
                                            <div class="ltn__contact-address-icon">
                                                <i class="icon-envelope"></i>
                                            </div>
                                            <h3>البريد الإلكتروني</h3>
                                            <p>Nama-sales@khomrigroup.com</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="ltn__contact-address-item ltn__contact-address-item-4 box-shadow">
                                            <div class="ltn__contact-address-icon">
                                                <i class="icon-speedometer"></i>
                                            </div>
                                            <h3>أوقات العمل </h3>
                                            <p>جميع أيام الأسبوع </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <iframe height="500px" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d207372.2748200199!2d39.20856832109524!3d24.27699447824544!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x15bddb1beeced1e1%3A0xca956231a42fbcb4!2z2YXYtdmG2Lkg2YbZhdinINi32YrYqNipINmE2YTZhdmG2KrYrNin2Kog2KfZhNio2LHZg9in2YbZitipINmI2KfZhNin2LPZhdmG2KrZitip!5e0!3m2!1sen!2seg!4v1668497082937!5m2!1sen!2seg" class="" width="100%" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>

            </div>
        </div>
        <!-- end contactus-->

    </section>
</template>

<script>
import ProductComponent from "./partials/ProductComponent.vue";
import Loading from "./partials/Loading.vue";
export default {
    components: {Loading, ProductComponent},
    data(){
        return{
            loading:false,
        }
    },
    async created() {
        this.loading = true;
        document.title = " الصفحة الرئيسية | مصنع نما طيبة للبلك البركاني ";
        let self = this;
        setTimeout(function (){
            self.loading = false;
        }, 1000);
    },
}
</script>
