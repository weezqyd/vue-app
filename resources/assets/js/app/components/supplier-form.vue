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
                            <ul v-if="errors" v-for=" error in errors" class="alert alert-danger" v-bind:key="error[index]">
                                <li>{{error[0]}}</li>
                            </ul>
                            <div class="col-sm-10 col-md-8">
                                <div class="form-group">
                                    <label for="block-form8-username">Supplier Name</label>
                                    <input type="text" class="form-control form-control-alt"  v-model="supplier_name" placeholder="Enter the supplier name..">
                                </div>
                                <div class="form-group">
                                    <label class="">Phone Number</label>
                                    <input type="text" class="form-control form-control-alt"  v-model="phone_number" placeholder="Provide phone number">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="block-content block-content-full block-content-sm bg-body-light text-right">
                        <button type="submit" class="btn btn-success">
                            <i class="fa fa-check"></i> Submit
                        </button>
                    </div>
                </div>
            </form>
        </div>
     </div>
</template>
<script>
export default {
    props: ['title'],
    data: function() {
        return {
            supplier_name : '',
            phone_number: '',
            errors: []
        }
    },
    methods: {
        saveSupplier: function(event) {
            event.preventDefault();
            axios.post('/suppliers', {name: this.supplier_name, phone_number: this.phone_number})
            .then(($response) => {
                location.assign('/suppliers')
            }).catch(($error) => {
                this.errors = $error.response.data.errors
            })
        }
    }
}
</script>
