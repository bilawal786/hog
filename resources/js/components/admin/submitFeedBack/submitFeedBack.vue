<template>
    <div>
        <div class="row" v-show="panel.allfeedbacks">
            <div class="col-sm-12">
                <div class="panel panel-default card-view">
                    <div class="panel-heading">
                        <div class="pull-left">
                            <h6 class="panel-title txt-dark">FeedBacks</h6>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                            <div class="table-wrap">
                                <div class="table-responsive">
                                    <table id="" class="table table-hover display  pb-30">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>E-mail</th>
                                                <th>Phone #</th>
                                                <th>Account</th>
                                                <th>Message</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>

                                            <tr v-for="feedback in feedbacks" :key="feedback.id">
                                                <td>{{ feedback.Fname + ' ' + feedback.Lname }}</td>
                                                <td>{{ feedback.email }}</td>
                                                <td>{{ feedback.phone }}</td>
                                                <td>{{ feedback.account }}</td>
                                                <td>{{ feedback.message }}</td>
                                                <td>
                                                    <button class="btn btn-default btn-icon-anim btn-circle btn-sm"><i
                                                            class="fa fa-pencil"></i></button>
                                                    <button class="btn btn-success btn-icon-anim btn-circle btn-sm"
                                                        @click="getFeedbackDetail(feedback.id)"><i
                                                            class="fa fa-eye"></i></button>
                                                    <button class="btn btn-primary btn-icon-anim btn-circle btn-sm"><i
                                                            class="fa fa-lock"></i></button>
                                                    <button class="btn btn-info btn-icon-anim btn-circle btn-sm"><i
                                                            class="icon-trash"></i></button>
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
        <div class="row" v-show="panel.detail">
            <div class="col-sm-12">

                <div class="panel panel-default card-view">
                    <div class="panel-heading">
                        <div class="pull-left">
                            <h6 class="panel-title txt-dark">Feedback details</h6>
                        </div>
                        <div class="pull-right">
                            <button class="btn btn-primary btn-anim btn-sm" @click="backToList()"><i class="fa fa-arrow-left" style="color: #FFF;"></i><span class="btn-text">back</span></button>
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
                        <td class="border-none">{{ feedbackDetail.Fname+' '+feedbackDetail.Lname }}</td>
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
                        <td>{{ feedbackDetail.created_at }}</td>
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
    </div>
</template>
<script>
export default {
    data() {
        return {
            feedbacks: null,
            feedbackDetail:{
                Fname:null,
                Lname:null,
                email:null,
                phone:null,
                account:null,
                message:null,
                created_at:null

            },
            panel: {
                allfeedbacks: true,
                detail: false
            }
        }
    },
    mounted() {
        this.getFeedbacks()
    },
    methods: {
        getFeedbacks: function () {
            axios.get('admin/web/form/submit/feedback').then(response => {
                this.feedbacks = response.data
                console.log(response.data)
            })
        },
        getFeedbackDetail: function (id) {
            this.panel.allfeedbacks = false
            this.panel.detail = true
            axios.get('admin/web/form/submit/feedback/' + id).then(response => {
                this.feedbackDetail = response.data
                console.log(response.data)
            })
        },
        backToList: function () {
            this.panel.allfeedbacks = true
            this.panel.detail = false

        },
    }
}
</script>