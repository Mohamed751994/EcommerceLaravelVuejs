import HomePageComponent from '../components/HomePageComponent.vue';
import ProductList from '../components/ProductList.vue';
import SingleProduct from '../components/SingleProduct.vue';
import CartPage from '../components/CartPage.vue';
import CheckoutPage from "../components/CheckoutPage.vue";
import InvoicePreview from "../components/InvoicePreview.vue";
import About from "../components/About.vue";
import Quality from "../components/Quality.vue";
import Partners from "../components/Partners.vue";
import Contactus from "../components/Contactus.vue";
import Join from "../components/Join.vue";
import Blogs from "../components/Blogs.vue";
import SingleBlog from "../components/SingleBlog.vue";
import NotFoundComponent from "../components/NotFoundComponent.vue";
const router =  [
    { path: '/', name: 'HomePage', component: HomePageComponent },
    { path: '/products', name: 'ProductsList', component: ProductList },
    { path: '/product/:id/:slug', name: 'SingleProduct', component: SingleProduct },
    { path: '/cart', name: 'CartPage', component: CartPage },
    { path: '/checkout', name: 'CheckoutPage', component: CheckoutPage },
    { path: '/invoice/:id', name: 'InvoicePreview', component: InvoicePreview },
    { path: '/about-us', name: 'About', component: About },
    { path: '/quality', name: 'Quality', component: Quality },
    { path: '/partners', name: 'Partners', component: Partners },
    { path: '/contact-us', name: 'Contactus', component: Contactus },
    { path: '/join-us', name: 'Join', component: Join },
    { path: '/blogs', name: 'Blogs', component: Blogs },
    { path: '/blog/:slug', name: 'SingleBlog', component: SingleBlog },
    { path: '/:pathMatch(.*)', component: NotFoundComponent }
];
export default router;
