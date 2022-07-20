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
                                            <th>payment</th>
                                            <th>Status</th>
                                            <th>Created at</th>

                                        </tr>
                                        </thead>

                                        <tbody>
                                        <tr v-if="allPayments.data == ''">
                                            <td colspan="6" class="tb-empty">No Record Found</td>
                                        </tr>
                                        <tr v-else v-for="payment in allPayments.data" :key="payment.id">
                                            <td><a :href="'/driver/detail/'+payment.driver_id" >{{payment.driver.first_name+' '+payment.driver.last_name  }}</a></td>
                                            <td>{{ payment.driver.email }}</td>
                                            <td>$ {{payment.payment}}</td>
                                            <td>
                                                <span class="text-primary" v-if="payment.status==0">Pending</span>
                                                <span class="text-warning" v-if="payment.status==1">Process</span>
                                                <span class="text-success" v-if="payment.status==2">Approved</span>
                                            </td>
                                            <td>
                                                <set-date :date="payment.created_at" :year="'yes'"></set-date>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="">
                                <div class="pull-left" v-if="allPayments">Showing {{allPayments.from}} to {{allPayments.to}} of {{allPayments.total}} entries</div>
                                <div class="pull-right">
                                    <pagination class="" :show-disabled="true" :router="false" :size="'small'" :limit="2" :data="allPayments" :align="'right'" v-on:pagination-change-page="getdata"></pagination>
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
    name: "driver_payment_list",
    data(){
        return{
            allPayments:null
        }
    },
    mounted(){
        this.getdata()
    },
    methods:{
        getdata: function (page = 1){
            axios.get('admin/web/payment/driver?page='+page).then(response => {
                this.allPayments=response.data
            })
        }
    }
}
</script>

<style scoped>

</style>
