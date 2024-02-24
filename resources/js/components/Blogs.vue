<template>

    <section class="mainSection">
        <inner-banner-component page-title="المقالات"></inner-banner-component>
        <div class="container">
            <div class="row justify-content-center" v-if="loading">
                <loading></loading>
            </div>
            <div class="row" v-else>
                <!-- ltn__product-item -->
                <div v-if="blogs.length > 0" class="col-lg-4 col-md-6 col-12 mb-4" v-for="blog in blogs">
                    <div class="blog-item">
                        <div class="blog-image">
                            <router-link :to="'/blog/'+blog.slug_url"><img :src="blog.image" :alt="blog.alt"></router-link>
                        </div>
                        <div class="blog-content">
                            <h3 class="title">
                                <router-link :to="'/blog/'+blog.slug_url"> {{blog.title}}</router-link>
                            </h3>
                            <div class="d-flex align-items-center attributes mb-4">
                                <div class="admin">
                                    <i class="fa fa-user mx-1"></i> بواسطة الأدمن
                                </div>
                                <div class="date mx-2">
                                    <i class="fa fa-calendar mx-1"></i> {{blog.created_at}}
                                </div>
                            </div>
                            <p class="description">{{blog.short_description}}</p>
                            <router-link class="readmore" :to="'/blog/'+blog.slug_url">اقرأ المزيد <i class="mx-2 fa fa-arrow-left"></i></router-link>
                        </div>
                    </div>
                </div>
                <div class="col-12 text-center" v-else>
                    <h1 class="my-5">لا يوجد مقالات في الوقت الحالي</h1>
                </div>
                <!-- ltn__product-item -->
            </div>
        </div>
    </section>
</template>

<script>
import axios from 'axios';
import Loading from "./partials/Loading.vue";
import InnerBannerComponent from "./includes/InnerBannerComponent.vue";
export default {
    components: {Loading,InnerBannerComponent},
    props: ['pageName'],
    data() {
        return {
            loading:false,
            blogs: [],
        }
    },
    async created() {
        await this.getAllBlogs();
    },
    methods: {
        //Get All Products
        async getAllBlogs() {
            try {
                this.loading = true;
                const response = await axios.get('/api/blogs');
                this.blogs = response.data.data;
                this.loading = false;
            } catch (error) {
                console.error(error);
            }
        },
    }
}
</script>
