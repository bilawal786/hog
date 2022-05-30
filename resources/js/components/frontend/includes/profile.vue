<template>
    <div class="">
        <div class="card-header bg-transparent border-0">
            <h3 class="mb-0"><i class="fa fa-clone pr-1"></i>General Information</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover">
                <tr>
                    <th width="25%">Name</th>
                    <td width="2%">:</td>
                    <td>{{ user.name }}</td>
                </tr>
                <tr>
                    <th width="25%">E-mail</th>
                    <td width="2%">:</td>
                    <td>{{ user.email }}</td>
                </tr>
                <tr>
                    <th width="25%">Phone</th>
                    <td width="2%">:</td>
                    <td>{{ user.phone }}</td>
                </tr>
                <tr>
                    <th width="25%">Address</th>
                    <td width="2%">:</td>
                    <td>{{ user.address }}</td>
                </tr>
            </table>
            <button type="button" class="btn btn-hog" v-on:click="showStar = !showStar">Edit Profile</button>
            <button class="btn btn-hog">Change Password</button>
        </div>
    </div>
</template>
<<script>

import { mapGetters } from "vuex";

export default {
    data(){
        return{
            showStar : false
        }
    },
    mounted() {
        window.scrollTo(0, 0);
    },
    computed: {
        ...mapGetters("auth", ["user"])
    },
    methods:{
        profileChange: function() {
        this.editProfile = !this.editProfile;
        // some code to filter users
        }
    }
};


</script>
