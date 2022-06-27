<template>
    <div class="row">
        <div class="col-sm-12">

            <div class="panel panel-default card-view">
                <div class="panel-heading">
                    <div class="pull-left">
                        <h6 class="panel-title txt-dark">Billing details</h6>
                    </div>
                    <div class="pull-right">
                        <router-link class="btn btn-primary btn-anim btn-sm" to="/admin/form/billing/question/list"><i class="fa fa-arrow-left" style="color: #FFF;"></i><span class="btn-text">back</span></router-link>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="panel panel-default card-view">
                <div class="panel-heading">
                    <div class="pull-left">
                        <h6 class="panel-title txt-dark">Billing Question</h6>
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
                                        <td class="border-none">Billing Question Name:</td>
                                        <td class="border-none">{{ questionDetail.Fname+' '+questionDetail.Lname }}</td>
                                    </tr>
                                    <tr>
                                        <td>Billing Question E-mail:</td>
                                        <td>{{ questionDetail.email }}</td>
                                    </tr>
                                    <tr>
                                        <td>Billing Question Phone</td>
                                        <td>{{ questionDetail.phone }}</td>
                                    </tr>
                                    <tr>
                                        <td>Billing Question Account</td>
                                        <td>{{ questionDetail.account }}</td>
                                    </tr>
                                    <tr>
                                        <td>Billing Question Invoice</td>
                                        <td>{{ questionDetail.Invoice }}</td>
                                    </tr>
                                    <tr>
                                        <td>Billing Question Message</td>
                                        <td>{{ questionDetail.message }}</td>
                                    </tr>
                                    <tr>
                                        <td>Billing Question Register Date</td>
                                        <td>{{ questionDetail.created_at }}</td>
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
    name: "billingRequestDetail",
    data(){
        return{
            questionDetail:{
                Fname:null,
                Lname:null,
                email:null,
                phone:null,
                account:null,
                invoice:null,
            }
        }
    },
    mounted(){
        this.getQuestionDetail(this.$route.params.id)
    },
    methods:{
        getQuestionDetail: function (id) {
            axios.get('admin/web/form/billing/request/' + id).then(response => {
                this.questionDetail = response.data
            })
        },
    }
}
</script>

<style scoped>

</style>
