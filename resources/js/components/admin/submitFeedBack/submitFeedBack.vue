<template>
    <div>
         <div class="row">
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
                                  <table id="" class="table table-hover display  pb-30" >
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
                                            <td>{{feedback.Fname+' '+feedback.Lname}}</td>
                                            <td>{{feedback.email}}</td>
                                            <td>{{feedback.phone}}</td>
                                            <td>{{feedback.account}}</td>
                                            <td>{{feedback.message}}</td>
                                            <td>
                                                 <button class="btn btn-default btn-icon-anim btn-circle btn-sm"><i class="fa fa-pencil"></i></button>
                          <button class="btn btn-success btn-icon-anim btn-circle btn-sm" @click="showDriverDetail(driver.id)">
                            <i class="fa fa-eye"></i>
                          </button>
                          <button
                            class="
                              btn btn-primary btn-icon-anim btn-circle btn-sm
                            "
                          >
                            <i class="fa fa-lock"></i>
                          </button>
                          <button
                            class="btn btn-info btn-icon-anim btn-circle btn-sm"
                          >
                            <i class="icon-trash"></i>
                          </button>
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
    </div>
</template>
<script>
export default{
    data(){
        return{
            feedbacks:null
        }
    },
    mounted(){
        this.getFeedbacks()
    },
    methods:{
        getFeedbacks: function(){
            axios.get('admin/web/form/submit/feedback').then(response => {
                this.feedbacks = response.data
                console.log(response.data)
            })
        }
    }
}
</script>