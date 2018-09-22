<template>
    <div class="col-md-6 col-xl-4">
                            <div class="block block-rounded">
                                <div class="block-content block-content-full bg-gd-fruit text-center">
                                    <a class="item item-circle mx-auto bg-black-25" href="javascript:void(0)">
                                        <i class="fa-2x si si-handbag text-white"></i>
                                    </a>
                                    <p class="text-white font-size-h3 font-w300 mt-3 mb-0">
                                        Recent Orders
                                    </p>
                                    <p class="text-white-75 mb-0">
                                        Top 5
                                    </p>
                                </div>
                                <div class="block-content block-content-full">
                                    <table class="table table-borderless table-striped table-hover">
                                        <tbody>
                                            <tr v-for="(order, key) in orders" v-bind:key="key">
                                                <td class="text-center" style="width: 40px;">01</td>
                                                <td>
                                                    <strong>{{order.order_code}}</strong>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
</template>
<script>
export default {
    data() {
        return {
            orders: []
        }
    },
    mounted() {
        axios.get('/orders?take=5').then((response) => {
            this.orders = response.data.data;
        });
    }
}
</script>
