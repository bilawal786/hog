<template>
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default card-view">
                <div class="panel-heading">
                    <div class="pull-left">
                        <h6 class="panel-title txt-dark">Drivers List</h6>
                    </div>
                    <div class="pull-right">
                        <router-link
                            class="btn btn-primary"
                            to="/driver/create"
                        >
                            New Driver
                        </router-link>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <div class="table-wrap">
                            <div class="table-responsive">
                                <table id="" class="table table-hover display pb-30">
                                    <thead>
                                    <tr>
                                        <th>Fist Name</th>
                                        <th>Last Name</th>
                                        <th>E-mail</th>
                                        <th>Phone #</th>
                                        <th>Address</th>
                                        <th>city</th>
                                        <th>Created at</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    <tr v-if="drivers.data == ''">
                                        <td colspan="6" class="tb-empty">No Record Found</td>
                                    </tr>
                                    <tr v-else v-for="driver in drivers.data" :key="driver.id">
                                        <td>{{ driver.first_name }}</td>
                                        <td>{{ driver.last_name }}</td>
                                        <td>{{ driver.email }}</td>
                                        <td>{{ driver.phone }}</td>
                                        <td>
                                            <div class="st-ad">{{ driver.address }}</div>
                                        </td>
                                        <td>
                                            <div class="st-ad">{{ driver.city }}</div>
                                        </td>
                                        <td>
                                            <span class="text-primary">
                                                <set-date :date="driver.created_at" :year="'yes'"></set-date>
                                            </span>
                                        </td>
                                        <td>
                                            <router-link class="btn btn-default btn-icon-anim btn-circle btn-sm"
                                                         :to="'/driver/edit/'+driver.id">
                                                <i class="fa fa-pencil"></i>
                                            </router-link>
                                            <router-link class="btn btn-success btn-icon-anim btn-circle btn-sm"
                                                    :to="'/driver/detail/'+driver.id">
                                                <i class="fa fa-eye"></i>
                                            </router-link>
                                            <button v-if="driver.status==1"
                                                    class="btn btn-danger btn-icon-anim btn-circle btn-sm"
                                                    @click="block(driver.id)"><i
                                                class="fa fa-lock"></i></button>
                                            <button v-if="driver.status==0"
                                                    class="btn btn-warning btn-icon-anim btn-circle btn-sm"
                                                    @click="unblock(driver.id)"><i
                                                class="fa fa-unlock"></i></button>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="">
                            <div class="pull-left" v-if="drivers">Showing {{drivers.from}} to {{drivers.to}} of {{drivers.total}} entries</div>
                            <div class="pull-right">
                                <pagination class="" :show-disabled="true" :router="true" :size="'small'" :limit="2" :data="drivers" :align="'right'" v-on:pagination-change-page="getDriverData"></pagination>
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
    name: "driverListView",
    data(){
        return{
            drivers: null,
        }
    },
    mounted() {
        this.getDriverData();
    },
    methods:{
        getDriverData: function (page = 1) {
            axios.get("admin/web/drivers?page="+page).then((response) => {
                this.drivers = response.data;
            });
        },
        block(id) {
            Swal.fire({
                title: 'Are you sure ?',
                text: "You wanted to block this driver",

                showCancelButton: true,
                confirmButtonColor: 'rgb(34 110 237 / 85%)',
                cancelButtonColor: '#ff2a00',
                confirmButtonText: 'Block'
            }, () => {
            }).then((result) => {
                if (result.value) {
                    axios.put('admin/web/block/driver/' + id, {
                        'status': '0'
                    }).then(response => {
                        this.getDriverData()
                        window.scrollTo(0, 0)
                        switch (response.data.type) {
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
                    })
                }
            })
        },
        unblock(id) {
            Swal.fire({
                title: 'Are you sure ?',
                text: "You wanted to unblock this driver",

                showCancelButton: true,
                confirmButtonColor: 'rgb(34 110 237 / 85%)',
                cancelButtonColor: '#ff2a00',
                confirmButtonText: 'Unblock'
            }, () => {
            }).then((result) => {
                if (result.value) {
                    axios.put('admin/web/unblock/driver/' + id, {
                        'status': '1'
                    }).then(response => {
                        this.getDriverData()
                        window.scrollTo(0, 0)
                        switch (response.data.type) {
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
                    })
                }
            })
        },
    }
}
</script>

<!--<style scoped>-->

<!--</style>-->
