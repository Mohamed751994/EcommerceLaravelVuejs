<template>

    <section class="mainSection" v-if="loading">
        <loading></loading>
    </section>
    <section class="mainSection" v-else>
        <inner-banner-component :page-title="'المقالات  - '+blog.title"></inner-banner-component>

        <div class="container">
            <div class="row my-5">
                <div class="col-md-12 mb-5">
                    <h1 class="mb-2">{{blog.title}}</h1>
                    <div class="d-flex align-items-center attributes mb-4">
                        <div class="admin">
                            <i class="fa fa-user mx-1"></i> بواسطة الأدمن
                        </div>
                        <div class="date mx-2">
                            <i class="fa fa-calendar mx-1"></i> {{blog.created_at}}
                        </div>
                    </div>
                    <p class="mb-3">{{blog.short_description}}</p>

                    <div class="blog-image mb-4">
                        <img :src="blog.image" :alt="blog.alt" class="w-100">
                    </div>
                    <div class="blog-content">
                        <p class="mb-3" v-html="blog.description"></p>
                    </div>
                </div>

                <div class="col-md-12 mb-5" v-if="blogs.length > 0">
                    <h4 class="mb-4"><strong>مقالات أخري</strong></h4>
                    <div class="row m-0">
                        <div  class="col-lg-4 col-md-6 col-12 mb-4" v-for="blog in blogs">
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

export default {
    components: {InnerBannerComponent,Loading},
    props: ['pageName','pageSlug'],
    data() {
        return {
            loading:false,
            blog: '',
            blogs: [],
        }
    },

    async created() {
        // watch the params of the route to fetch the data again
        this.$watch(
            () => this.$route.params,
            () => {
                this.getSingleBlog();
            },
            // fetch the data when the view is created and the data is
            // already being observed
            { immediate: true }
        )
    },
    methods: {
        //Get All Products
        async getSingleBlog() {
            try {
                this.loading = true;
                const response = await axios.get('/api/blog/'+`${this.$route.params.slug}`);
                this.blog = response.data.data.blog;
                this.blogs = response.data.data.blogs;
                this.loading = false;
            } catch (error) {
                console.error(error);
            }
        },

    }
}
</script>
