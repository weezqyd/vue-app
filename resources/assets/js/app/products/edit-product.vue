<template>
     <div class="content">
        <div class="col-sm-12">
            <form @submit.prevent="saveSupplier" method="post">
                <div class="block block-rounded block-bordered">
                    <div class="block-header block-header-default block-header-rtl">
                        <h3 class="block-title">{{ title }}</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option">
                                <i class="si si-settings"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content">
                        <div class="row justify-content-center py-sm-3 py-md-5">
                            <div class="col-sm-10 col-md-8">
                                <ul v-if="errors" v-for=" error in errors" class="alert alert-danger list-group" v-bind:key="error[index]">
                                    <li class="">{{error[0]}}</li>
                                </ul>
                                <div class="form-group">
                                    <label for="block-form8-username">Product Name</label>
                                    <input type="text" class="form-control form-control-alt"  v-model="productData.name" placeholder="Enter the supplier name..">
                                </div>
                                <div class="form-group">
                                    <label class="">Product Code</label>
                                    <input type="text" class="form-control form-control-alt"  v-model="productData.product_code" placeholder="Enter a unique product code">
                                </div>
                                <div class="form-group">
                                    <label class="">Supplier</label>
                                    <select v-model="productData.supplier_id" class="form-control">
                                        <option v-for="supplier in suppliers" v-bind:value="supplier.id" v-bind:key="supplier.id">
                                            {{ supplier.name }}
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="block-content block-content-full block-content-sm bg-body-light text-right">
                        <button type="submit" class="btn btn-success">
                            <i class="fa fa-check"></i> Save Changes
                        </button>
                    </div>
                </div>
            </form>
        </div>
     </div>
</template>
<script>
export default {
    props: ['title', 'product'],
    data: function() {
        return {
            productData: {
                id: this.product.id,
                name : this.product.name,
                product_code: this.product.product_code,
                supplier_id: this.product.supplier_id
            },
            errors: [],
            suppliers: []
        }
    },
    mounted() {
        axios.get('/suppliers').then(($response) => {
            this.suppliers = $response.data.data
        });
    },
    methods: {
        saveSupplier: function(event) {
            event.preventDefault();
            axios.patch('/products/'+this.product.id, this.productData)
            .then(($response) => {
                location.assign('/products')
            }).catch(($error) => {
                this.errors = $error.response.data.errors
            })
        }
    }
}
</script>
