<template>
    <div class="col-md-6 col-xl-4">
        <div class="block block-rounded">
            <div class="block-content block-content-full bg-primary-darker text-center">
                <a class="item item-circle mx-auto bg-black-25" href="javascript:void(0)">
                    <i class="fab fa-2x fa-steam-symbol text-white"></i>
                </a>
                <p class="text-white font-size-h3 font-w300 mt-3 mb-0">
                    Headquaters Orders
                </p>
                <p class="text-white-75 mb-0">
                    Top 5
                </p>
            </div>
            <div class="block-content block-content-full">
                <table class="table table-borderless table-striped table-hover">
                    <tbody>
                        <tr v-for="(hq, index) in hqs" v-bind:key="index">
                            <td class="text-center" style="width: 40px;">{{++index}}</td>
                            <td>
                                <strong>{{hq.name}}</strong>
                            </td>
                            <td class="text-center" style="width: 40px;">
                                <strong class="text-success">{{hq.order_count}}</strong>
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
            hqs: {}
        }
    },
    mounted() {
        axios.get('/headquaters').then((response) => {
            return this.hqs = response.data.data;
        });
    }
}
</script>

