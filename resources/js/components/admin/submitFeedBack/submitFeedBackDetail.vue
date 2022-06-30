<template>
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default card-view">
                <div class="panel-heading">
                    <div class="pull-left">
                        <h6 class="panel-title txt-dark">Feedback details</h6>
                    </div>
                    <div class="pull-right">
                        <router-link class="btn btn-primary btn-anim btn-sm" to="/admin/form/submit/feedback/list"><i
                            class="fa fa-arrow-left" style="color: #FFF;"></i><span class="btn-text">back</span>
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
                        <h6 class="panel-title txt-dark">Feebback</h6>
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
                                        <td class="border-none">Feebback Name:</td>
                                        <td class="border-none">{{
                                                feedbackDetail.Fname + ' ' + feedbackDetail.Lname
                                            }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Feebback E-mail:</td>
                                        <td>{{ feedbackDetail.email }}</td>
                                    </tr>
                                    <tr>
                                        <td>Feebback Phone</td>
                                        <td>{{ feedbackDetail.phone }}</td>
                                    </tr>
                                    <tr>
                                        <td>Feebback account</td>
                                        <td>{{ feedbackDetail.account }}</td>
                                    </tr>
                                    <tr>
                                        <td>Feebback account</td>
                                        <td>{{ feedbackDetail.message }}</td>
                                    </tr>
                                    <tr>
                                        <td>Feebback Register Date</td>
                                        <td>
                                            <set-date :date="feedbackDetail.created_at" :year="'yes'"></set-date>
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
    name: "submitFeedBackDetail",
    data() {
        return {
            feedbackDetail:{
                Fname:null,
                Lname:null,
                email:null,
                phone:null,
                account:null,
                message:null,
                created_at:null

            },
        }
    },
    mounted() {
        this.getFeedbackDetail(this.$route.params.id)
    },
    methods: {
        getFeedbackDetail: function (id) {
            axios.get('admin/web/form/submit/feedback/' + id).then(response => {
                this.feedbackDetail = response.data
            })
        },
    }
}
</script>

<style scoped>

</style>
