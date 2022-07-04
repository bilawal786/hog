<template>
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default card-view">
                <div class="panel-heading">
                    <div class="pull-left">
                        <h6 class="panel-title txt-dark" v-if="this.$route.params.id">Driver Edit</h6>
                        <h6 class="panel-title txt-dark" v-else>Driver Create</h6>
                    </div>
                    <div class="pull-right">
                        <router-link class="btn btn-primary btn-anim btn-sm" to="/driver/list"><i
                            class="fa fa-arrow-left" style="color: #FFF;"></i><span
                            class="btn-text">back</span></router-link>
                    </div>
                    <div class="clearfix"></div>
                </div>

            </div>
        </div>
        <div class="col-sm-12">
            <div class="panel panel-default card-view">
                <div class="panel-heading">
                    <div class="pull-left">
                        <h6 class="panel-title txt-dark">Create Driver</h6>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <form>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label
                                        class="control-label mb-10"
                                        for="recipient-name"
                                    >Name:</label
                                    >
                                    <input
                                        v-model="create.name"
                                        class="form-control"
                                        type="text"
                                    />
                                    <ul class="c-err" v-if="errorshow">
                                        <li class="c-err-li" v-for="error in errorshow.name" :key="error">{{error}}</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label mb-10"
                                           for="recipient-name">E-mail:</label>
                                    <input
                                        v-model="create.email"
                                        class="form-control"
                                        type="email"
                                    />
                                    <ul class="c-err" v-if="errorshow">
                                        <li class="c-err-li" v-for="error in errorshow.email" :key="error">{{error}}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label
                                        class="control-label mb-10"
                                        for="recipient-name"
                                    >Phone:</label
                                    >
                                    <input
                                        v-model="create.phone"
                                        class="form-control"
                                        type="text"
                                    />
                                    <ul class="c-err" v-if="errorshow">
                                        <li class="c-err-li" v-for="error in errorshow.phone" :key="error">{{error}}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label
                                        class="control-label mb-10"
                                        for="recipient-name"
                                    >Address:</label
                                    >
                                    <textarea
                                        v-model="create.address"
                                        class="form-control"
                                    ></textarea>
                                    <ul class="c-err" v-if="errorshow">
                                        <li class="c-err-li" v-for="error in errorshow.address" :key="error">{{error}}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label
                                        class="control-label mb-10"
                                        for="message-text"
                                    >Password:</label
                                    >
                                    <input
                                        v-model="create.password"
                                        class="form-control"
                                        type="password"
                                    />
                                    <ul class="c-err" v-if="errorshow">
                                        <li class="c-err-li" v-for="error in errorshow.password" :key="error">{{error}}</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label
                                        class="control-label mb-10"
                                        for="message-text"
                                    >Retype Password:</label
                                    >
                                    <input
                                        v-model="create.comfirm_password"
                                        class="form-control"
                                        type="password"
                                    />
                                    <ul class="c-err" v-if="errorshow">
                                        <li class="c-err-li" v-for="error in errorshow.comfirm_password" :key="error">{{error}}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <button class="btn btn-success" type="button" @click="updateDriverData()" v-if="this.$route.params.id">Update</button>
                                <button class="btn btn-success" type="button" @click="saveDriverData()" v-else>Create</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


</template>

<script>
export default {
    name: "driverCreate",
    data(){
        return{
            create: {
                name: null,
                phone: null,
                email: null,
                address: null,
                password: null,
                comfirm_password: null,
            },
            errorshow:null,
        }
    },
    mounted() {
        if(this.$route.params.id){
            this.databyid(this.$route.params.id)
        }
    },
    methods:{
        saveDriverData: function () {
            axios.post("admin/web/drivers", this.create).then((response) => {
                this.create.name=null
                this.create.phone=null
                this.create.email=null
                this.create.address=null
                this.create.password=null
                this.create.comfirm_password=null
                this.errorshow=null
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
            }).catch(err => {
                    this.errorshow = err.response.data.errors
                    // console.log(err.response.data.errors)
            })
        },
        updateDriverData: function () {
            axios.put("admin/web/drivers/"+this.$route.params.id, this.create).then((response) => {
                this.create.name=null
                this.create.phone=null
                this.create.email=null
                this.create.address=null
                this.create.password=null
                this.create.comfirm_password=null
                this.databyid(this.$route.params.id)
                this.errorshow=null
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
            }).catch(err => {
                this.errorshow = err.response.data.errors
                // console.log(err.response.data.errors)
            })
        },
        databyid(id){
            axios.get('admin/web/drivers/'+id).then(response => {
                this.create = response.data
            })
        }
    }
}
</script>

<style scoped>

</style>
