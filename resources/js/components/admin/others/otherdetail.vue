<template>
    <div class="row">
        <div class="col-sm-12">

            <div class="panel panel-default card-view">
                <div class="panel-heading">
                    <div class="pull-left">
                        <h6 class="panel-title txt-dark">Other details</h6>
                    </div>
                    <div class="pull-right">
                        <router-link class="btn btn-primary btn-anim btn-sm" :to="{name: 'otherList'}"><i class="fa fa-arrow-left" style="color: #FFF;"></i><span class="btn-text">back</span></router-link>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="panel panel-default card-view">
                <div class="panel-heading">
                    <div class="pull-left">
                        <h6 class="panel-title txt-dark">Other</h6>
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
                                        <td class="border-none">Other Name:</td>
                                        <td class="border-none">{{ otherDetail.Fname+' '+otherDetail.Lname }}</td>
                                    </tr>
                                    <tr>
                                        <td>Other E-mail:</td>
                                        <td>{{ otherDetail.email }}</td>
                                    </tr>
                                    <tr>
                                        <td>Other Phone</td>
                                        <td>{{ otherDetail.phone }}</td>
                                    </tr>
                                    <tr>
                                        <td>Other account</td>
                                        <td>{{ otherDetail.account }}</td>
                                    </tr>
                                    <tr>
                                        <td>Other account</td>
                                        <td>{{ otherDetail.message }}</td>
                                    </tr>
                                    <tr>
                                        <td>Other Register Date</td>
                                        <td>
                                            <set-date :date="otherDetail.created_at" :year="'yes'"></set-date>
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
    name: "otherdetail",
    data(){
        return{
            otherDetail: {
                Fname: null,
                Lname: null,
                email: null,
                phone: null,
                account: null,
                message: null,
                created_at: null
            }
        }
    },
    mounted() {
        this.getOtherDetail(this.$route.params.id)
    },
    methods:{
        getOtherDetail: function (id) {
            axios.get('admin/web/form/others/' + id).then(response => {
                this.otherDetail = response.data
            })
        },
    }
}
</script>
