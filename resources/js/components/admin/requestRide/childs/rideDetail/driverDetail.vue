<template>
    <div class="panel panel-default card-view">
<!--        <div class="panel-heading">-->
<!--            <div class="pull-left">-->
<!--                <h6 class="panel-title txt-dark">Ride Status</h6>-->
<!--            </div>-->
<!--            <div class="clearfix"></div>-->
<!--            <div class="panel-wrapper collapse in">-->
<!--                <div class="panel-body">-->
<!--                    {{leadDetail}}-->
<!--                    <span class="label label-primary">Assign</span>-->
<!--                    <span class="label label-warning">process</span>-->
<!--                    <span class="label label-danger">Reject</span>-->
<!--                    <span class="label label-success">Complete</span>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
        <div class="panel-heading">
            <div class="pull-left">
                <h6 class="panel-title txt-dark">Selected Driver</h6>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="panel-wrapper collapse in">
            <div class="panel-body">
                <div class="table-wrap">
                    <div class="table-responsive">
                        <table class="table mb-0" v-if="selectdriver != null">
                            <tbody>
                            <tr>
                                <td class="border-none">Driver Name:</td>
                                <td class="border-none">
                                    {{ selectdriver.first_name + ' ' + selectdriver.last_name }}
                                </td>
                            </tr>
                            <tr>
                                <td>Driver E-mail:</td>
                                <td>{{ selectdriver.email }}</td>
                            </tr>
                            <tr>
                                <td>Driver Phone</td>
                                <td>{{ selectdriver.phone }}</td>
                            </tr>
                            <tr>
                                <td>Driver Address</td>
                                <td>{{ selectdriver.address }}</td>
                            </tr>
                            <tr>
                                <td>Driver Register Date</td>
                                <td>
                                    <set-date :date="selectdriver.created_at" :year="'yes'"></set-date>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    props: {
        rideId: null
    },
    data() {
        return {
            selectdriver: null,
            leadDetail:null
        }
    },
    mounted() {
        this.gedriverDetail(this.rideId)
    },
    methods: {
        gedriverDetail: function (id) {
            axios.get('admin/web/show/lead/'+id).then((res) => {
                this.leadDetail = res.data
                axios.get('admin/web/drivers/' + res.data.driver_id).then((response) => {
                    this.selectdriver = response.data
                });
            });
        },
    }
}
</script>

