<template>
    <div>
        <div class="row" v-show="panel.allOthers">
            <div class="col-sm-12">
                <div class="panel panel-default card-view">
                    <div class="panel-heading">
                        <div class="pull-left">
                            <h6 class="panel-title txt-dark">Others</h6>
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
                                                <th>Message</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>

                                            <tr v-for="other in others" :key="other.id">
                                                <td>{{ other.Fname + ' ' + other.Lname }}</td>
                                                <td>{{ other.email }}</td>
                                                <td>{{ other.phone }}</td>
                                                <td>{{ other.message }}</td>
                                                <td>
                                                    <button class="btn btn-default btn-icon-anim btn-circle btn-sm"><i
                                                            class="fa fa-pencil"></i></button>
                                                    <button class="btn btn-success btn-icon-anim btn-circle btn-sm"
                                                        @click="getOtherDetail(other.id)"><i
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
                            <h6 class="panel-title txt-dark">Other details</h6>
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
                        <td>{{ otherDetail.created_at }}</td>
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
            others: null,
            otherDetail:{
                Fname:null,
                Lname:null,
                email:null,
                phone:null,
                account:null,
                message:null,
                created_at:null

            },
            panel: {
                allOthers: true,
                detail: false
            }
        }
    },
    mounted() {
        this.getOthers()
    },
    methods: {
        getOthers: function () {
            axios.get('admin/web/form/others').then(response => {
                this.others = response.data
            })
        },
        getOtherDetail: function (id) {
            this.panel.allOthers = false
            this.panel.detail = true
            axios.get('admin/web/form/others/' + id).then(response => {
                this.otherDetail = response.data
            })
        },
        backToList: function () {
            this.panel.allOthers = true
            this.panel.detail = false

        },
    }
}
</script>