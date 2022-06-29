<template>
    <div>
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default card-view">
                    <div class="panel-heading">
                        <div class="pull-left">
                            <h6 class="panel-title txt-dark">Payment WithDraw</h6>
                        </div>
                        <div class="pull-right" v-if="payment">
                            <button class="btn btn-primary" @click="requestWithdraw()" :disabled="payment.total == 0">$ {{payment.total}} withDraw</button>
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
                                            <th>payment</th>
                                            <th>Status</th>
                                            <th>Created at</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr v-if="tabledata.data">
                                            <td colspan="6" class="tb-empty">No Record Found</td>
                                        </tr>
<!--                                        <tr v-else v-for="data in tabledata.data" :key="data.id">-->
<!--                                            <td><a :href="'/admin/user/driver/detail/'" >{{data }}</a></td>-->
<!--                                            <td>{{  }}</td>-->
<!--                                            <td>{{  }}</td>-->
<!--                                            <td>-->
<!--                                                <div class="st-ad">{{ }}</div>-->
<!--                                            </td>-->
<!--                                           -->
<!--                                        </tr>-->
                                        </tbody>
                                    </table>
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
    name: "driver_payment_withdraw",
    data(){
        return{
            payment:null,
            tabledata:null,
        }
    },
    mounted() {
        this.getdata()
        this.getdatalist()
    },
    methods:{

        getdata: function (){
            axios.get('admin/web/payment/withdraw').then(response => {
                this.payment=response.data
            })
        },
        getdatalist: function(){
            axios.get('admin/web/driver/leads').then(response => {
                this.tabledata = response.data
            })
        },
        requestWithdraw: function(){
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
                    axios.put('admin/web/payment/driver/'+this.payment.driver_id, {
                        'status' : '1'
                    })
                        .then(response => {
                            window.scrollTo(0, 0)
                            this.getdata()
                            axios.post('admin/web/admin/payment/approve', {
                                'driver_id':this.payment.driver_id,
                                'status' : '0',
                                'with_draw' : this.payment.total
                            }).then(response=>{

                            });
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
    },
}
</script>

<style scoped>

</style>
