import { createRouter, createWebHistory } from "vue-router";

const routes = [
    {
        path: "/",
        component: () => import('.././components/main/Index.vue'),
        name: "main.index",
    },
    {
        path: "/products",
        component: () => import('.././components/product/Index.vue'),
        name: "product.index",
    },
    {
        path: "/:pathMatch(.*)*",
        component: () => import('.././components/main/404.vue'),
        name: "main.404",
    }
];

const router = createRouter({
    history: createWebHistory(),
    routes,
    linkActiveClass: 'text-orange-500!'
});

export default router;