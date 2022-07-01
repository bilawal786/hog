<template>
    <div class="">
        <div class="card-header bg-transparent border-0">
            <h3 class="mb-0"><i class="fa fa-clone pr-1"></i>General Information</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover input-content" v-if="user && passwordEdit == false">
                <tr>
                    <th width="25%">First Name</th>
                    <td width="2%">:</td>
                    <td>
                        <span v-if="profileEdit==true">
                            <input type="text" placeholder="Name*" class="form-control" v-model="user.first_name">
                             <div class="contact-valid" v-if="errors.first_name">
                                {{ errors.first_name[0] }}
                            </div>
                        </span>
                        <span v-if="profileEdit==false">
                            {{ user.first_name }}
                        </span>
                    </td>
                </tr>
                <tr>
                    <th width="25%">Last Name</th>
                    <td width="2%">:</td>
                    <td>
                        <span v-if="profileEdit==true">
                            <input type="text" placeholder="Name*" class="form-control" v-model="user.last_name">
                             <div class="contact-valid" v-if="errors.last_name">
                                {{ errors.last_name[0] }}
                            </div>
                        </span>
                        <span v-if="profileEdit==false">
                            {{ user.last_name }}
                        </span>
                    </td>
                </tr>
                <tr>
                    <th width="25%">E-mail</th>
                    <td width="2%">:</td>
                    <td>
                        <span v-if="profileEdit==true">
                            <input type="email" placeholder="Email*" class="form-control" v-model="user.email">
                            <div class="contact-valid" v-if="errors.email">
                                {{ errors.email[0] }}
                            </div>
                        </span>
                        <span v-if="profileEdit==false">
                            {{ user.email }}
                        </span>
                    </td>
                </tr>
                <tr>
                    <th width="25%">Phone</th>
                    <td width="2%">:</td>
                    <td >
                        <span v-if="profileEdit==true">
                            <input type="number" placeholder="Phone" class="form-control" v-model="user.phone">
                        </span>
                        <span v-if="profileEdit==false">
                            {{ user.phone }}
                        </span>
                    </td>
                </tr>
                <tr>
                    <th width="25%">Address</th>
                    <td width="2%">:</td>
                    <td>
                        <span v-if="profileEdit==true">
                            <input type="text" placeholder="Address" class="form-control" v-model="user.address">
                        </span>
                        <span v-if="profileEdit==false">
                            {{ user.address }}
                        </span>
                    </td>
                </tr>
                <tr>
                    <th width="25%">City</th>
                    <td width="2%">:</td>
                    <td>
                        <span v-if="profileEdit==true">
                            <input type="text" placeholder="Address" class="form-control" v-model="user.city">
                        </span>
                        <span v-if="profileEdit==false">
                            {{ user.city }}
                        </span>
                    </td>
                </tr>
            </table>
            <table class="table table-bordered table-hover input-content" v-if="passwordEdit == true">
                <tr>
                    <th width="25%">Old Password*</th>
                    <td width="2%">:</td>
                    <td>
                        <input type="Password" placeholder="Old Password*" class="form-control" v-model="password.old_password">
                             <div class="contact-valid" v-if="errors.old_password">
                                {{ errors.old_password[0] }}
                            </div>
                    </td>
                </tr>
                <tr>
                    <th width="25%">New Password*</th>
                    <td width="2%">:</td>
                    <td>
                        <input type="Password" placeholder="New Password*" class="form-control" v-model="password.new_password">
                        <div class="contact-valid" v-if="errors.new_password">
                            {{ errors.new_password[0] }}
                        </div>
                    </td>
                </tr>
                <tr>
                    <th width="25%">Confirm Password*</th>
                    <td width="2%">:</td>
                    <td >
                        <input type="Password" placeholder="Confirm Password*" class="form-control" v-model="password.confirm_password">
                        <div class="contact-valid" v-if="errors.confirm_password">
                            {{ errors.confirm_password[0] }}
                        </div>
                    </td>
                </tr>
            </table>

            <button type="button" class="btn btn-hog" @click="profileEdit = true" v-if="profileEdit==false">Edit Profile</button>
            <button type="button" class="btn btn-hog" @click="profileUpdate()" v-if="profileEdit==true">Update Profile</button>
            <button class="btn btn-hog" @click="passwordEdit = true" v-if="passwordEdit==false">Change Password</button>
            <button class="btn btn-hog" @click="passwordUpdate()" v-if="passwordEdit==true">Update Password</button>
        </div>

    </div>
</template>
<<script>

import { mapGetters } from "vuex";

export default {
    data(){
        return{
            profileEdit : false,
            passwordEdit: false,
            password:{
                old_password:null,
                new_password:null,
                confirm_password:null
            }
        }
    },
    mounted() {
        window.scrollTo(0, 0);
        this.$store.commit("auth/setErrors", {});
    },
    computed: {
        ...mapGetters("auth", ["user", "errors"])
    },
    methods:{
        profileChange: function() {
        this.editProfile = !this.editProfile;
        // some code to filter users
        },
        profileUpdate(){
            axios.put('update/profile/'+this.user.id, this.user).then(response => {
                if(response.status == 200){
                    this.profileEdit = false
                    this.passwordEdit = false
                    this.$store.commit("auth/setErrors", {});
                    window.scrollTo(0, 0);
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
                }

            })
        },
        passwordUpdate(){
            axios.put('update/password/'+this.user.id, this.password).then(response => {
                if(response.status == 200){
                    this.profileEdit = false
                    this.passwordEdit = false
                    this.$store.commit("auth/setErrors", {});
                    window.scrollTo(0, 0);
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
                }

            })
        }
    }
};


</script>
