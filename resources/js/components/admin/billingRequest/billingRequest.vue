<template>
    <div>
        <div class="row" v-show="panel.allQuestions">
            <div class="col-sm-12">
                <div class="panel panel-default card-view">
                    <div class="panel-heading">
                        <div class="pull-left">
                            <h6 class="panel-title txt-dark">Billing Questions</h6>
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
                                                <th>invoice</th>
                                                <th>Message</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>

                                            <tr v-for="question in questions" :key="question.id">
                                                <td>{{ question.Fname + ' ' + question.Lname }}</td>
                                                <td>{{ question.email }}</td>
                                                <td>{{ question.phone }}</td>
                                                <td>{{ question.account }}</td>
                                                <td>{{ question.invoice }}</td>
                                                <td>{{ question.message }}</td>
                                                <td>
                                                    <button class="btn btn-default btn-icon-anim btn-circle btn-sm"><i
                                                            class="fa fa-pencil"></i></button>
                                                    <button class="btn btn-success btn-icon-anim btn-circle btn-sm"
                                                        @click="getQuestionDetail(question.id)"><i
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
                            <h6 class="panel-title txt-dark">Billing details</h6>
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
    </div>
</template>
<script>
export default {
    data() {
        return {
            questions: null,
            questionDetail:{
                Fname:null,
                Lname:null,
                email:null,
                phone:null,
                account:null,
                invoice:null,
                message:null,
                created_at:null

            },
            panel: {
                allQuestions: true,
                detail: false
            }
        }
    },
    mounted() {
        this.getquestions()
    },
    methods: {
        getquestions: function () {
            axios.get('admin/web/form/billing/request').then(response => {
                this.questions = response.data
                console.log(response.data)
            })
        },
        getQuestionDetail: function (id) {
            this.panel.allQuestions = false
            this.panel.detail = true
            axios.get('admin/web/form/billing/request/' + id).then(response => {
                this.questionDetail = response.data
                console.log(response.data)
            })
        },
        backToList: function () {
            this.panel.allQuestions = true
            this.panel.detail = false

        },
    }
}
</script>