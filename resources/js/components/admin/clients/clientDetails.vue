<template>
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default card-view">
                <div class="panel-heading">
                    <div class="pull-left">
                        <h6 class="panel-title txt-dark">Client detail</h6>
                    </div>
                    <div class="pull-right">
                        <router-link class="btn btn-primary btn-anim btn-sm" to="/client/list">
                            <i class="fa fa-arrow-left" style="color: #FFF;"></i>
                            <span class="btn-text">back</span>
                        </router-link>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="panel panel-default card-view">
                <div class="panel-heading">
                    <div class="pull-left">
                        <h6 class="panel-title txt-dark">Clients Personal Details</h6>
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <div class="table-wrap">
                            <div class="table-responsive">
                                <table class="table  mb-0">
                                    <tbody>
                                    <tr>
                                        <td class="border-none">First Name:</td>
                                        <td class="border-none">{{ clientDetail.first_name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Last Name:</td>
                                        <td>{{ clientDetail.last_name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Client E-mail:</td>
                                        <td>{{ clientDetail.email }}</td>
                                    </tr>
                                    <tr>
                                        <td>Client Phone</td>
                                        <td>{{ clientDetail.phone }}</td>
                                    </tr>
                                    <tr>
                                        <td>Client Address</td>
                                        <td>{{ clientDetail.address }}</td>
                                    </tr>
                                    <tr>
                                        <td>Client city</td>
                                        <td>{{ clientDetail.city }}</td>
                                    </tr>
                                    <tr>
                                        <td>Client Register Date</td>
                                        <td><set-date :date="clientDetail.created_at" :year="'yes'"></set-date></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="panel panel-default card-view">
                <div class="panel-heading">
                    <div class="pull-left">
                        <h6 class="panel-title txt-dark">Clients Ride Request</h6>
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <div class="table-wrap">
                            <div class="table-responsive">

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
    name: "clientDetails",
    data(){
        return{
            clientDetail: {
                name: null,
                email: null,
                phone: null,
                address: null,
                created_at: null
            },
        }
    },
    mounted() {
        this.getClientDetail(this.$route.params.id)
    },
    methods:{
        getClientDetail: function (id) {
            axios.get('admin/web/clients/' + id).then(response => {
                this.clientDetail = response.data
            })
        },
    }
}
</script>

<style scoped>

</style>
