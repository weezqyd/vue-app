<template>
    <div class="col-xl-12 js-appear-enabled animated fadeIn" data-toggle="appear">
                            <!-- Users -->
                            <div class="block block-rounded block-mode-loading-refresh">
                                <div class="block-header block-header-default">
                                    <h3 class="block-title">Supplier List</h3>
                                </div>
                                <div class="block-content block-content-full block-content-sm bg-body-dark">
                                    <form action="be_pages_dashboard.html" method="post" onsubmit="return false;">
                                        <input type="text" class="form-control form-control-alt" placeholder="Search Suppliers..">
                                    </form>
                                </div>
                                <div class="block-content">
                                    <table class="table table-striped table-hover table-borderless table-vcenter font-size-sm">
                                        <thead>
                                            <tr class="text-uppercase">
                                                <th class="font-w700 text-center" style="width: 120px;">Avatar</th>
                                                <th class="font-w700">Name</th>
                                                <th class="d-none d-sm-table-cell font-w700">Phone Number</th>
                                                <th class="font-w700 text-center" style="width: 60px;"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="supplier in suppliers" v-bind:key="supplier.id">
                                                <td class="text-center">
                                                    <img class="img-avatar img-avatar32 img-avatar-thumb" src="/media/avatars/avatar0.jpg" alt="">
                                                </td>
                                                <td>
                                                    <div class="font-w600 font-size-base">{{supplier.name}}</div>
                                                    <div class="text-muted">demo@example.com</div>
                                                </td>
                                                <td class="d-none d-sm-table-cell font-size-base">
                                                    <span class="badge badge-dark">{{supplier.phone_number}}</span>
                                                </td>
                                                <td class="text-center d-sm-table-cell">
                                                    <a v-bind:href="'/suppliers/'+ supplier.id +'/edit'" data-toggle="tooltip" data-placement="left" title="" class="js-tooltip-enabled" data-original-title="Edit User">
                                                        <i class="si si-pencil"></i>
                                                    </a>
                                                    <a href="#" v-on:click.prevent="deleteSupplier(supplier.id)" data-toggle="tooltip" data-placement="left" title="" class="js-tooltip-enabled" data-original-title="Edit User">
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
            suppliers : []
        }
    },
    mounted() {
        this.getSuppliers();
    },
    methods: {
         getSuppliers() {
             axios.get('/suppliers').then(($response) => {
                this.suppliers = $response.data.data;
            });
        },
        deleteSupplier(id) {
            axios.delete('/suppliers/'+id).then(($response) => {
                this.getSuppliers();
            })
        }
    }
}
</script>

