<template>
    <div class="row">
        <div class="col-sm-12">
            <div class="table-wrap">
                <div class="table-responsive">
                    <table id="" class="table table-hover display pb-30" v-if="rides">
                        <thead>
                        <tr>
                            <th>Last Name</th>
                            <th>First Name</th>
                            <th>Address</th>
                            <th>City</th>
                            <th>W/C or Amb</th>
                            <th>Phone Number</th>
                            <th>Card on File Y/N</th>
                            <th>Relative</th>
                            <th>Relative's #</th>
                            <th>Facility</th>
                            <th>Notes</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-if="rides.data == ''">
                            <td colspan="12" class="tb-empty">No Record Found</td>
                        </tr>
                        <tr v-else v-for="ride in rides.data" :key="ride.id">
                            <td>{{ride.Lname}}</td>
                            <td>{{ ride.Fname}}</td>
                            <td>{{ ride.start_address}}</td>
                            <td>{{ ride.start_city}}</td>
                            <td>{{ ride.wheelchair }}</td>
                            <td>{{ ride.phone }}</td>
                            <td>{{ ride.card_on_file }}</td>
                            <td>{{ ride.relative }}</td>
                            <td>{{ ride.relative_no }}</td>
                            <td>{{ ride.facility }}</td>
                            <td>{{ ride.message }}</td>
                            <td>
                                <button class="btn btn-default btn-icon-anim btn-circle btn-sm"
                                        @click="editRideDetail(ride.id)">
                                    <i class="fa fa-pencil"></i>
                                </button>
                                <router-link class="btn btn-success btn-icon-anim btn-circle btn-sm" :to="'/request/ride/list/'+ride.id">
                                    <i class="fa fa-eye"></i>
                                </router-link>
                                <button class="btn btn-info btn-icon-anim btn-circle btn-sm"
                                        @click="delRideRequest(ride.id)">
                                    <i class="icon-trash"></i>
                                </button>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="" v-if="rides">
                <div class="pull-left" v-if="rides">Showing {{rides.from}} to {{rides.to}} of {{rides.total}} entries</div>
                <div class="pull-right">
                    <pagination class="" :show-disabled="true" :router="false" :size="'small'" :limit="2" :data="rides" :align="'right'" v-on:pagination-change-page="getRides"></pagination>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
export default {
    name: "newRideList",
    data(){
        return{
            rides:null,
        }
    },
    mounted() {
        this.getRides();
    },
    methods:{
        getRides: function (page = 1) {
            axios.get("admin/web/form/request/unassign/ride?page="+page).then((response) => {
                this.rides = response.data;
            });
        },
        delRideRequest: function (id) {
            Swal.fire({
                title: 'Are you sure ?',
                text: "You want to delete this Ride",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: 'rgb(34 110 237 / 85%)',
                cancelButtonColor: '#ff2a00',
                confirmButtonText: 'Yes, Delete it!'
            }, () => {
            }).then((result) => {
                if (result.value) {
                    axios.delete('admin/web/form/request/ride/' + id)
                        .then(response => {
                            window.scrollTo(0, 0)
                            if (response.status == 200) {
                                this.getRides();
                                this.$vToastify.success("successfully Updated");
                            } else {

                            }
                        })
                }
            })
        },
    },

}
</script>

<style scoped>

</style>
