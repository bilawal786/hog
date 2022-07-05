<template>
    <div>
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default card-view">
                    <div class="panel-heading">
                        <div class="pull-left">
                            <h6 class="panel-title txt-dark">Payment List</h6>
                        </div>
                        <div class="pull-right">

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
                                            <th>Driver Name</th>
                                            <th>E-mail</th>
                                            <th>payment Request</th>
                                            <th>Created at</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        <tr v-if="withdraws.data == ''">
                                            <td colspan="7" class="tb-empty">No Record Found</td>
                                        </tr>
                                        <tr v-else v-for="withdraw in withdraws.data" :key="withdraw.id">
                                            <td><a :href="'/admin/user/driver/detail/'+withdraw.driver_id" >{{ withdraw.driver.name }}</a></td>
                                            <td>{{ withdraw.driver.email }}</td>
                                            <td>{{ withdraw.with_draw }}</td>
                                            <td>
                                                <set-date :date="withdraw.created_at" :year="'yes'"></set-date>
                                            </td>
                                            <td>
                                                <button class="btn btn-sm btn-warning" v-if="withdraw.status == '0'" @click="acceptRequest(withdraw.id, withdraw.driver_id)">Process</button>
                                                <button class="btn btn-sm btn-success" v-if="withdraw.status == '1'" disable>Approved</button>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="">
                                <div class="pull-left" v-if="withdraws">Showing {{withdraws.from}} to {{withdraws.to}} of {{withdraws.total}} entries</div>
                                <div class="pull-right">
                                    <pagination class="" :show-disabled="true" :router="false" :size="'small'" :limit="2" :data="withdraws" :align="'right'" v-on:pagination-change-page="getdata"></pagination>
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
export default {
    name: "driver_payment_request",
    data(){
        return{
            withdraws:null
        }
    },
    mounted(){
        this.getdata()
    },
    methods:{
        getdata: function(page = 1){
            axios.get('admin/web/admin/payment/approve?page='+page).then(response => {
                this.withdraws = response.data
                console.log(response.data)
            })
        },
        acceptRequest: function (id, driverId){

            Swal.fire({
                title: 'Are you sure ?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: 'rgb(34 110 237 / 85%)',
                cancelButtonColor: '#ff2a00',
                confirmButtonText: 'Withdraw!'
            },() => {
            }).then((result) => {
                if (result.value) {

                    axios.put('admin/web/admin/payment/approve/'+id, {
                        'status': 1
                    }).then(response => {
                        axios.put('admin/web/payment/driver/'+driverId, {
                            'status' : '2'
                        }).then(res => {
                            this.getdata()

                        })
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
                    })


                }
            })





        }
    }
}
</script>

<style scoped>

</style>
