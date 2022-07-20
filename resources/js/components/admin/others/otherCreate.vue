<template>
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default card-view">
                <div class="panel-heading">
                    <div class="pull-left">
                        <h6 class="panel-title txt-dark">Other</h6>
                    </div>
                    <div class="pull-right">
                        <router-link class="btn btn-primary btn-anim btn-sm" :to="{name : 'otherList'}"><i
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
                                            <input type="text" class="form-control" placeholder="First Name" v-model="other.Fname">
                                            <ul class="c-err" v-if="errorshow">
                                                <li class="c-err-li" v-for="error in errorshow.Fname" :key="error">{{error}}</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label mb-10">Last Name</label>
                                            <input type="text" class="form-control" placeholder="Last Name" v-model="other.Lname">
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
                                            <input type="email" class="form-control" placeholder="E-mail" v-model="other.email">
                                            <ul class="c-err" v-if="errorshow">
                                                <li class="c-err-li" v-for="error in errorshow.email" :key="error">{{error}}</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label mb-10">Phone</label>
                                            <input type="text" class="form-control" placeholder="Phone" v-model="other.phone">
                                            <ul class="c-err" v-if="errorshow">
                                                <li class="c-err-li" v-for="error in errorshow.phone" :key="error">{{error}}</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!--/span-->
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label mb-10">Message</label>
                                            <textarea class="form-control" rows="5" v-model="other.message"></textarea>
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
    name: "otherCreate",
    data(){
        return{
            isloading:false,
            other:{
                Fname: null,
                Lname: null,
                email: null,
                phone: null,
                message:null,
            },
            errorshow:null
        }
    },
    mounted(){
        this.getData(this.$route.params.id)
    },
    methods:{
        getData: function (id) {
            axios.get('admin/web/form/others/' + id).then(response => {
                this.other = response.data
            })
        },
        updatebyid: function(){
            this.isloading=true
            axios.put('admin/web/form/others/'+this.$route.params.id, this.other).then(response => {
                window.scrollTo(0, 0)
                this.isloading=false
                this.other.Fname=null
                this.other.Lname=null
                this.other.email=null
                this.other.phone=null
                this.other.message=null
                this.getData(this.$route.params.id)
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
