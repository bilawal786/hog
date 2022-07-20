<template>
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default card-view">
                <div class="panel-heading">
                    <div class="pull-left">
                        <h6 class="panel-title txt-dark">Billing Update</h6>
                    </div>
                    <div class="pull-right">
                        <router-link class="btn btn-primary btn-anim btn-sm" to="/question/list"><i
                            class="fa fa-arrow-left" style="color: #FFF;"></i><span class="btn-text">back</span>
                        </router-link>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="panel panel-default card-view">
                <div class="panel-heading">
                    <div class="pull-left">
                        <h6 class="panel-title txt-dark"></h6>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <form>
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label mb-10">First Name</label>
                                            <input type="text" class="form-control" placeholder="First Name" v-model="question.Fname">
                                            <ul class="c-err" v-if="errorshow">
                                                <li class="c-err-li" v-for="error in errorshow.Fname" :key="error">{{error}}</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label mb-10">Last Name</label>
                                            <input type="text" class="form-control" placeholder="Last Name" v-model="question.Lname">
                                            <ul class="c-err" v-if="errorshow">
                                                <li class="c-err-li" v-for="error in errorshow.Lname" :key="error">{{error}}</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!--/span-->
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label mb-10">E-Mail</label>
                                            <input type="email" class="form-control" placeholder="E-mail" v-model="question.email">
                                            <ul class="c-err" v-if="errorshow">
                                                <li class="c-err-li" v-for="error in errorshow.email" :key="error">{{error}}</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label mb-10">Phone</label>
                                            <input type="text" class="form-control" placeholder="Phone" v-model="question.phone">
                                            <ul class="c-err" v-if="errorshow">
                                                <li class="c-err-li" v-for="error in errorshow.phone" :key="error">{{error}}</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!--/span-->
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label mb-10">Account</label>
                                            <input type="text" class="form-control" placeholder="Account" v-model="question.account">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label mb-10">Invoice</label>
                                            <input type="text" class="form-control" placeholder="Invoice" v-model="question.invice">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label mb-10">Message</label>
                                            <textarea class="form-control" rows="5" v-model="question.message"></textarea>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="form-actions mt-10">
                                <button type="button" class="btn btn-success  mr-10" @click="updatebyid()" :disabled="isloading">
                                    <span v-if="isloading"><i class="fam fa fa-spinner fa-spin"></i>Loading</span>
                                    <span v-else>Update</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "billingRequestCreate",
    data(){
        return{
            isloading:false,
            question:{
                Fname: null,
                Lname: null,
                email: null,
                phone: null,
                account:null,
                invice:null,
                message:null,
            },
            errorshow:null
        }
    },
    mounted(){
        this.getQuestionDetail(this.$route.params.id)
    },
    methods:{
        getQuestionDetail: function (id) {
            axios.get('admin/web/form/billing/request/' + id).then(response => {
                this.question = response.data
                console.log('zohaib')
            })
        },
        updatebyid: function(){
            this.isloading=true
            axios.put('admin/web/form/billing/request/'+this.$route.params.id, this.question).then(response => {
                window.scrollTo(0, 0)
                this.isloading=false
                this.question.Fname=null
                this.question.Lname=null
                this.question.email=null
                this.question.phone=null
                this.question.account=null
                this.question.invice=null
                this.question.message=null
                this.getQuestionDetail(this.$route.params.id)
                switch(response.data.type){
                    case 'info':
                        toastr.info(response.data.messege);
                        break;
                    case 'success':
                        toastr.success(response.data.messege);
                        break;
                    case 'warning':
                        toastr.warning(response.data.messege);
                        break;
                    case 'error':
                        toastr.error(response.data.messege);
                        break;
                }
            }).catch(err=>
            {
                this.isloading=false
                this.errorshow = err.response.data.errors
            })
        }
    }
}
</script>

<style scoped>

</style>
