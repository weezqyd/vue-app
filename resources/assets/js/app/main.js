
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('login', require('./components/login.vue'));
Vue.component('page-footer', require('./components/page-footer.vue'));
Vue.component('user-dropdown', require('./components/user-dropdown.vue'));
Vue.component('page-header', require('./components/page-header.vue'));
Vue.component('supplier-form', require('./components/supplier-form.vue'));
Vue.component('product-form', require('./products/CreateProduct.vue'));
Vue.component('supplier-list', require('./components/supplier-list.vue'));
Vue.component('product-list', require('./products/product-list.vue'));
Vue.component('edit-product', require('./products/edit-product.vue'));
Vue.component('edit-supplier', require('./components/edit-supplier.vue'));
Vue.component('order-form', require('./orders/new-order.vue'));
Vue.component('order-list', require('./orders/order-list.vue'));
Vue.component('hq-orders', require('./components/hq-orders.vue'));
Vue.component('orders-tile', require('./components/orders-tile.vue'));
const app = new Vue({
    el: '#page-container'
});

