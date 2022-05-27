<template>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">E-mail</th>
                <th scope="col">Phone #</th>
                <th scope="col">Account</th>
                <th scope="col">Message</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="(item, index) in getRequestRide" :key="index">
                <th scope="row">{{index+1}}</th>
                <td>{{item.Fname}}</td>
                <td>{{item.email}}</td>
                <td>{{item.phone}}</td>
                <td>{{item.account}}</td>
                <td>{{item.message}}</td>
                <td>
                    <a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                    <a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                </td>
            </tr>
        </tbody>
    </table>
</template>
<script>
export default {
    data(){
        return{
            getRequestRide:null
        }

    },
    computed:{
        
    },
    methods:{
        getUserRequestRide: function(){
            axios.get('user/request/ride', ).then(response => {
                this.getRequestRide = response.data.data
            })
        }
    },
     mounted(){
         this.getUserRequestRide()
     } 
}
</script>