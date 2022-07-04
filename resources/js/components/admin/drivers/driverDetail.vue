<template>
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default card-view">
                <div class="panel-heading">
                    <div class="pull-left">
                        <h6 class="panel-title txt-dark">Driver detail</h6>
                    </div>
                    <div class="pull-right">
                        <router-link class="btn btn-primary btn-anim btn-sm" to="/driver/list"><i
                            class="fa fa-arrow-left" style="color: #FFF;"></i><span
                            class="btn-text">back</span></router-link>
                    </div>
                    <div class="clearfix"></div>
                </div>

            </div>
        </div>
        <div class="col-sm-6">
            <div class="panel panel-default card-view">
                <div class="panel-heading">
                    <div class="pull-left">
                        <h6 class="panel-title txt-dark">Drivers List</h6>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <div class="table-wrap">
                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <tbody>
                                    <tr>
                                        <td class="border-none">Driver Name:</td>
                                        <td class="border-none">{{ driverDetail.name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Driver E-mail:</td>
                                        <td>{{ driverDetail.email }}</td>
                                    </tr>
                                    <tr>
                                        <td>Driver Phone</td>
                                        <td>{{ driverDetail.phone }}</td>
                                    </tr>
                                    <tr>
                                        <td>Driver Address</td>
                                        <td>{{ driverDetail.address }}</td>
                                    </tr>
                                    <tr>
                                        <td>Driver Register Date</td>
                                        <td>
                                            <set-date :date="driverDetail.created_at" :year="'yes'"></set-date>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "driverDetail",
    data(){
        return{
            driverDetail: {
                name: null,
                email: null,
                phone: null,
                address: null,
                created_at: null,
            },
        }
    },
    mounted() {
        this.showDriverDetail(this.$route.params.id)
    },
    methods:{
        showDriverDetail: function (id) {
            axios.get('admin/web/drivers/' + id).then(response => {
                this.driverDetail = response.data
            })
        },
    }
}
</script>

<style scoped>

</style>
