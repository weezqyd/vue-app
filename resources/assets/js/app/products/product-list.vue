<template>
    <div class="col-xl-12 js-appear-enabled animated fadeIn" data-toggle="appear">
                            <!-- Users -->
                            <div class="block block-rounded block-mode-loading-refresh">
                                <div class="block-header block-header-default">
                                    <h3 class="block-title">Product List</h3>
                                </div>
                                <div class="block-content block-content-full block-content-sm bg-body-dark">
                                    <form action="be_pages_dashboard.html" method="post" onsubmit="return false;">
                                        <input type="text" class="form-control form-control-alt" placeholder="Search products..">
                                    </form>
                                </div>
                                <div class="block-content">
                                    <table class="table table-striped table-hover table-borderless table-vcenter font-size-sm">
                                        <thead>
                                            <tr class="text-uppercase">
                                                <th class="font-w700 text-center" style="width: 120px;">Image</th>
                                                <th class="font-w700">Product Name</th>
                                                <th class="d-none d-sm-table-cell font-w700">Product Code</th>
                                                <th class="d-none d-sm-table-cell font-w700">Supplier</th>
                                                <th class="font-w700 text-center" style="width: 60px;"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="product in products" v-bind:key="product.id">
                                                <td class="text-center">
                                                    <img class="img-avatar img-avatar32 img-avatar-thumb" src="/media/avatars/avatar0.jpg" alt="">
                                                </td>
                                                <td>
                                                    <div class="font-w600 font-size-base">{{product.name}}</div>
                                                </td>
                                                <td class="d-none d-sm-table-cell font-size-base">
                                                    <span class="badge badge-dark">{{product.product_code}}</span>
                                                </td>
                                                <td>
                                                    <div class="-sm-table-cell">
                                                        {{product.supplier_name}}
                                                    </div>
                                                </td>
                                                <td class="d-sm-table-cell">
                                                    <a v-bind:href="'/products/'+ product.id +'/edit'" data-toggle="tooltip" data-placement="left" title="" class="js-tooltip-enabled" data-original-title="Edit User">
                                                        <i class="fa fa-fw fa-pencil-alt"></i>
                                                    </a>
                                                    <a href="#" v-on:click.prevent="deleteProduct(product.id)" data-toggle="tooltip" data-placement="left" title="" class="js-tooltip-enabled" data-original-title="Edit User">
                                                        <i class="fa fa-fw fa-trash"></i>
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
            products : []
        }
    },
    mounted() {
        this.getProducts();
    },
    methods: {
         getProducts() {
             axios.get('/products').then(($response) => {
                this.products = $response.data.data;
            });
        },
        deleteProduct(id) {
            axios.delete('/products/'+id).then(($response) => {
                this.getProducts();
            })
        }
    }
}
</script>

