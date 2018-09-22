<template>
    <div class="col-xl-12 js-appear-enabled animated fadeIn" data-toggle="appear">
                            <!-- Users -->
                            <div class="block block-rounded block-mode-loading-refresh">
                                <div class="block-header block-header-default">
                                    <h3 class="block-title">Order List</h3>
                                </div>
                                <div class="block-content">
                                    <table class="table table-striped table-hover table-borderless table-vcenter font-size-sm">
                                        <thead>
                                            <tr class="text-uppercase">
                                                <th class="font-w700 text-center" style="width: 50px;">#</th>
                                                <th class="d-none d-sm-table-cell font-w700">Product Code</th>
                                                <th class="d-none d-sm-table-cell font-w700">Order Date</th>
                                                <th class="d-none d-sm-table-cell font-w700">Headquaters</th>
                                                <th class="font-w700 text-center" style="width: 60px;"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="(order, index) in orders" v-bind:key="order.id">
                                                <td class="text-center">
                                                    {{++index}}
                                                </td>
                                                <td>
                                                    <div class="font-w600 font-size-base">{{order.order_code}}</div>
                                                </td>
                                                <td class="d-none d-sm-table-cell font-size-base">
                                                    <span class="badge badge-dark">{{order.created_at}}</span>
                                                </td>
                                                <td>
                                                    <div class="-sm-table-cell">
                                                        {{order.hq}}
                                                    </div>
                                                </td>
                                                <td class="d-sm-table-cell">
                                                    <a href="#" v-on:click.prevent="deleteOrder(order.id)" data-toggle="tooltip" data-placement="left" title="" class="js-tooltip-enabled" data-original-title="Edit User">
                                                        <i class="si si-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- END Users -->
                        </div>
</template>
<script>
export default {
    data() {
        return {
            orders : []
        }
    },
    mounted() {
        this.getOrders();
    },
    methods: {
         getOrders() {
             axios.get('/orders').then(($response) => {
                this.orders = $response.data.data;
            });
        },
        deleteOrder(id) {
            axios.delete('/orders/'+id).then(($response) => {
                this.getOrders();
            })
        }
    }
}
</script>

