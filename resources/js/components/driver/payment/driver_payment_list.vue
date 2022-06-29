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
                                            <th>Action</th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        <tr>
                                            <td><a :href="'/admin/user/driver/detail/'" >{{ }}</a></td>
                                            <td>{{  }}</td>
                                            <td>{{  }}</td>
                                            <td>
                                                <div class="st-ad">{{ }}</div>
                                            </td>
                                            <td>
<!--                                                <set-date :date="payment.created_at" :year="'yes'"></set-date>-->
                                            </td>
                                            <td>
                                                <!--                                                <router-link class="btn btn-default btn-icon-anim btn-circle btn-sm">-->
                                                <!--                                                    <i class="fa fa-pencil"></i>-->
                                                <!--                                                </router-link>-->
                                                <!--                                                <router-link class="btn btn-success btn-icon-anim btn-circle btn-sm">-->
                                                <!--                                                    <i class="fa fa-eye"></i>-->
                                                <!--                                                </router-link>-->
                                            </td>
                                        </tr>
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
    name: "driver_payment_list"
}
</script>

<style scoped>

</style>
