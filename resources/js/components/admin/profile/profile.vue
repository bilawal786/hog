<template>
    <div class="form-wrap">
        <form>
            <div class="form-body overflow-hide">
                <div class="form-group">
                    <label class="control-label mb-10" for="exampleInputuname_01">Name:</label>
                    <div class="input-group">
                        <div class="input-group-addon"><i class="icon-user"></i></div>
                        <input type="text" class="form-control" placeholder="Name" v-model="profile.name">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label mb-10" for="exampleInputEmail_01">Email address:</label>
                    <div class="input-group">
                        <div class="input-group-addon"><i class="icon-envelope-open"></i></div>
                        <input type="email" class="form-control" placeholder="Email" v-model="profile.email">
                    </div>
                </div>
                <!-- <div class="form-group">
                                                                    <label class="control-label mb-10" for="exampleInputpwd_01">Password</label>
                                                                    <div class="input-group">
                                                                        <div class="input-group-addon"><i class="icon-lock"></i></div>
                                                                        <input type="password" class="form-control" id="exampleInputpwd_01" placeholder="Enter pwd" value="password">
                                                                    </div>
                                                                </div> -->
            </div>
            <div class="form-actions mt-10">
                <button type="button" class="btn btn-success mr-10 mb-30" @click="updateUserData()">Update profile</button>
                <a href="" class="btn btn-primary mr-10 mb-30" data-toggle="modal" data-target="#myModal">Change
                    Password</a>
            </div>
        </form>
        <!-- Model  -->
        <div id="myModal" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h5 class="modal-title" id="myModalLabel">Change Password</h5>
                    </div>
                    <div class="modal-body">
                        <!-- Row -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="">
                                    <div class="panel-wrapper collapse in">
                                        <div class="panel-body pa-0">
                                            <div class="col-sm-12 col-xs-12">
                                                <div class="form-wrap">
                                                    <form>
                                                        <div class="form-body overflow-hide">
                                                            <div class="form-group">
                                                                <label class="control-label mb-10">Old Password</label>
                                                                <div class="input-group">
                                                                    <div class="input-group-addon"><i
                                                                            class="icon-lock"></i></div>
                                                                    <input type="password" class="form-control"
                                                                        name="oldPassword" placeholder="Old Password" v-model="password.oldPassword">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label mb-10">New Password</label>
                                                                <div class="input-group">
                                                                    <div class="input-group-addon"><i
                                                                            class="icon-lock"></i></div>
                                                                    <input type="password" class="form-control"
                                                                        name="newPassword" placeholder="New Password" v-model="password.newPassword">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label mb-10">Conform
                                                                    Password</label>
                                                                <div class="input-group">
                                                                    <div class="input-group-addon"><i
                                                                            class="icon-lock"></i></div>
                                                                    <input type="password" class="form-control"
                                                                        name="conformPassword"
                                                                        placeholder="Conform Password" v-model="password.conformPassword">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-actions mt-10">
                                                            <button type="button"
                                                                class="btn btn-success mr-10 mb-30"
                                                                @click="changePassword()">Change
                                                                Password</button>
                                                            <button type="button" class="btn btn-default mr-10 mb-30"
                                                                data-dismiss="modal">Cancel</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            profile: {
                name: null,
                email: null
            },
            password:{
                oldPassword:null,
                newPassword:null,
                conformPassword:null
            }
        }
    },
    mounted() {
        this.getUserData()
    },
    methods: {
        getUserData: function () {
            axios.get('admin/web/profile').then(response => {
                this.profile = response.data
                console.log(response.data.id)
            })
        },
        updateUserData: function () {
            Swal.fire({
                title: 'Are you sure ?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: 'rgb(34 110 237 / 85%)',
                cancelButtonColor: '#ff2a00',
                confirmButtonText: 'Yes, Change it!'
            }, () => {
            }).then((result) => {
                if (result.value) {
                    axios.put('admin/web/profile/'+this.profile.id, this.profile).then(response => {
                        window.scrollTo(0, 0)
                        if (response.status == 200) {
                            this.$vToastify.success("successfully Updated");
                        } else {

                        }
                    })
                }
            })
        },
        changePassword: function(){
            Swal.fire({
                title: 'Are you sure ?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: 'rgb(34 110 237 / 85%)',
                cancelButtonColor: '#ff2a00',
                confirmButtonText: 'Yes, Change it!'
            }, () => {
            }).then((result) => {
                if (result.value) {
                    axios.post('web/profile/change/password', this.password).then(response => {
                        window.scrollTo(0, 0)
                        if (response.status == 200) {
                            this.$vToastify.success("successfully Updated");
                        } else {

                        }
                    })
                }
            })
        }
    }

}
</script>