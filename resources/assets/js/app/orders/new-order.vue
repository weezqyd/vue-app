<template>
    <div class="content">
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
                <div class="col-xs-12">
                    <form class="form-horizontal mb-4" method="post" v-on:submit.prevent="saveOrder">
                        <ul v-if="errors" v-for=" error in errors" class="alert alert-danger list-group" v-bind:key="error[index]">
                                <li class="">{{error[0]}}</li>
                            </ul>
                        <div class="row">
                            
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="example-if-email">Order Code</label>
                                    <input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0"  v-model="order.order_code" placeholder="Order Code">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="headquaters">Headquaters</label>
                                    <select class="form-control mb-2 mr-sm-2 mb-sm-0" v-model="order.headquater_id">
                                        <option v-for="headquater in headquaters" v-bind:value="headquater.id">{{headquater.name}}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    props: ['title'],
    data() {
        return {
            order: {
                headquater_id: '',
                order_code:''
            },
            headquaters: [],
            errors: []
        }
    },
    mounted() {
        this.getHeadquaters();
    },
    methods: {
        saveOrder() {
            axios.post('/orders', this.order).then(($response) => {
                location.assign('/orders')
            }).catch(($error) => {
                this.errors = $error.response.data.errors;
            })
        },
        getHeadquaters() {
            axios.get('/headquaters').then((response) => {
                this.headquaters = response.data.data;
            });
        }
    }
}
</script>
