<template>
    <section class="mainSection" v-if="loading">
        <loading></loading>
    </section>
    <section class="mainSection" v-else>

        <inner-banner-component page-title="الجودة"></inner-banner-component>
        <div class="liton__shoping-cart-area mb-100">
            <div class="container">
                <div class="row mb-4">
                    <div class="col text-end">

                        <div class="flex flex-col items-end gap-10">

                            <div class="text-left">
                                <h1 class="text-3xl font-bold my-5 them-head-color">
                                    مميزات بركانى نما طيبة
                                </h1>
                                <h1 class="text-3xl  font-semibold mb-6 them-head-color">مصادر انتاجنا</h1>
                                <p class="">يُنتج مصنع نما طيبة أنواع عديدة من البلك البركاني باستخدام مواد بوزلانية
                                    خالية من الشوائب يتم جلبها من الجبال البركانية التي تشتهر بها منطقة المدينة المنورة
                                    وتكون مواد خام على هيئة بودرة بركانية وحصى بركاني مقاس ( 3/8 in ) وتنعكس جودتهما
                                    ومدى نقائهما على جودة البلك البركاني . وحرصاً منا في مصنع نما طيبة على تقديم منتجات
                                    عالية الجودة للعملاء، نقوم بانتقاء المواد الخام المستخدمة في التصنيع من مواد
                                    بوزلانية نقية وأسمنت مقاوم نختارها جميعها بعناية من أفضل المصادر والموردين لنتمكن
                                    وبثقة من توريد ما يحتاجه عملاؤنا في المملكة العربية السعودية من منتجات بركانية مهما
                                    كانت كمياتها وأنواعها وبأعلى ضمانات الجودة.</p>
                            </div>

                            <div class="text-left ">
                                <h1 class="text-3xl  font-semibold mb-6 them-head-color">سهولة التلييس</h1>
                                <p class="">يمتاز البك البركانى بسطحه الخشن وهذا يساعد على تماسك اللياسة مع توفير أو
                                    الغاء عملية الطرطشة كما أن طبقة اللياسة تصبح أقل سماكة مما يوفر فى الأسمنت.</p>
                            </div>

                            <div class="text-left">
                                <h1 class="text-3xl  font-semibold mb-6 them-head-color">يقبل تركيب
                                    المسامير </h1>
                                <p class="">يتحمل البلك البركاني عملية تركيب المسامير فى الجدران بكفاءة عالية خاصة عند
                                    تركيب المفصلات للأبواب والمسامير ولتثبيت الرخام والحجر</p>
                            </div>

                            <div class="text-left ">
                                <h1 class="text-3xl  font-semibold mb-6 them-head-color">العزل الحرارى
                                </h1>
                                <p class="">يمتاز البلك البركاني بانخفاض التوصيل الحرارى حيث لا يتجاوز قيمته (1.25) مما
                                    يكسبه ميزة العزل الحرارى الذى يمنع الى حد كبير من انتقال الحرارة من خارج المبنى الى
                                    داخله والعكس</p>
                            </div>

                            <div class="text-left ">
                                <h1 class="text-3xl  font-semibold mb-6 them-head-color">القوة والمتانة
                                </h1>
                                <p class="">نتيجة ارتفاع قوة الضغط المستخدمة فى التصنيع فان مقاومته للضغط عالية جدا</p>
                            </div>

                            <div class="text-left ">
                                <h1 class="text-3xl  font-semibold mb-6 them-head-color">خفيف الوزن</h1>
                                <p class="">يعتبر أخف وزن بكثير من البلك الإسمنتي والبلك الطيني الحامل من نفس المقاس</p>
                            </div>

                            <div class="text-left">
                                <h1 class="text-3xl  font-semibold mb-6 them-head-color">سهولة التمديدات
                                </h1>
                                <p class="">يمكن قص البلك البركاني بدون أن ينكسر وتجرى التمديدات على الفجوة الخارجية مع
                                    المحتفظة على قوة البلك وعزله الحرارى </p>
                            </div>

                            <div class="text-left">
                                <h1 class="text-3xl  font-semibold mb-6 them-head-color">مقاوم للملوحة</h1>
                                <p class="">يصنع البلك من مادة البوزلان التي تستخدم كمادة أولية فى صناعة الأسمن
                                    البوزلانى المقاوم للملوحة مما يقلل من عملية التآكل</p>
                            </div>

                            <div class="text-left ">
                                <h1 class="text-3xl  font-semibold mb-6 them-head-color">مقاوم للحريق</h1>
                                <p class="">يعتبر من أفضل أنواع البلك على الاطلاق فى مقاومة النار واللهب المباشر حيث أن
                                    المادة الأولية هى مادة خاملة غير قابلة للاحتراق </p>
                            </div>

                            <div class="text-left">
                                <h1 class="text-3xl font-bold my-5 them-head-color">الاختبارات</h1>
                                <h1 class="text-3xl font-semibold mb-6 them-head-color">اختبار الضغط</h1>
                                <p class="rtl">أظهرت نتائج الاختبارات للعينات المرسلة فوة ضغط فاقت ( Mpa 8 ) وهى نتيجة
                                    ممتازة جدا حيث تشترط هيئة المواصفات السعودية SASO بأن لا تقل اختبارات الضغط عن ( Mpa
                                    4 )</p>
                            </div>

                            <div class="text-left ">
                                <h1 class="text-3xl font-semibold mb-6 them-head-color">اختبار امتصاص
                                    الماء</h1>
                                <p class="">ويجرى هذا الاختبار (معدل الامتصاصية) لكل من الأسطح الخارجية والداخلية حيث
                                    يتضمن الزيادة فى كتلة عينات البلك الناتجة عن امتصاص الماء ولأن البلك مسامى فهو قابل
                                    لامتصاص الرطوبة من الطقس كما له قابلية معاكسة اذا ارتفعت معدلات جفافه بحيث يسحب فى
                                    هذه العملية الماء من الخلطة الاسمنتية المستخدمة فى ربط وحداته أثناء البناء فيتسبب فى
                                    عدم كفاية الماء داخل الخلطة الإسمنتية وبالتالي يمنع التفاعل الهيدروليكي اللازم
                                    لصلابتها وهو ما قد يتسبب فى فشل هذه العملية ويقلل بشكل عام من قوة البناء مما يبرز
                                    أهمية هذا العامل بالنسبة للعميل . وبهذا الخصوص تجاوزت عيناتنا هذا الاختبار حيث كانت
                                    نسبة امتصاصها للماء أقل من 10% وتعد نسبة جيدة مقارنة بالبلك الخرساني التي تتجاوز
                                    نسبة امتصاصه للماء 15%</p>
                            </div>

                            <div class="text-left">
                                <h1 class="text-3xl font-semibold mb-6 them-head-color">اختبار مقاومة
                                    الحرائق </h1>
                                <p class="">يستهدف اختبار مقاومة الحرائق تقييم المواد الداخلة فى تصنيع المنتجات التي
                                    تمنع أو تؤخر مرور درجات الحرارة العالية واللهب والغازات الساخنة تحت ظروف الاستخدام
                                    القياسية فيتم تحديد مقاومة تلك المواد فى المنتجات من خلال اختبار محدد للمقاومة عن
                                    طريق اجراء اختبارات مقاومة الحريق بقياس متانة مادة أو منتج فى اختبار المقاومة
                                    باستخدام معايير محددة قابلة للقياس ويتم الكشف عن وظيفة هيكلية لهذه المادة أو المنتج
                                    من خلال محاكاة أنواع معينة من الحرائق فى بيئات معملية متقدمة . وقد أظهرت النتائج بعد
                                    اختبار عيناتنا مقاومتها العالية للحريق حيث نجحت فى مقاومة السنة النار لما يقرب من 3
                                    ساعات بفضل المواد الداخلة فى تصنيع البلك البركاني والمكونة من البوزلان الطبيعي
                                    العازل والمقاوم للحريق.</p>
                            </div>

                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="cert">
                            <img src="/public/frontend/img/nama/cert/1.jpeg" width="100%" />
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="cert">
                            <img src="/public/frontend/img/nama/cert/2.png" width="100%" />
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="cert">
                            <img src="/public/frontend/img/nama/cert/3.jpeg" width="100%" />
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="cert">
                            <img src="/public/frontend/img/nama/cert/4.jpeg" width="100%" />
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <div class="cert">
                            <img src="/public/frontend/img/nama/cert/5.jpeg" width="100%" />
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="cert">
                            <img src="/public/frontend/img/nama/cert/6.jpeg" width="100%" />
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="cert">
                            <img src="/public/frontend/img/nama/cert/7.jpeg" width="100%" />
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="cert">
                            <img src="/public/frontend/img/nama/cert/8.jpeg" width="100%" />
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="cert">
                            <img src="/public/frontend/img/nama/cert/9.jpeg" width="100%" />
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="cert">
                            <img src="/public/frontend/img/nama/cert/10.jpeg" width="100%" />
                        </div>
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
    components: {InnerBannerComponent,Loading},
    data(){
        return{
            loading:false,
        }
    },
    async created() {
        this.loading = true;
        document.title = "  الجودة | مصنع نما طيبة ";
        let self = this;
        setTimeout(function (){
            self.loading = false;
        }, 1000);
    },
}
</script>
