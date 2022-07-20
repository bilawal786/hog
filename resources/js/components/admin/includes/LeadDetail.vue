<template>

        <div class="panel panel-default card-view">
                    <div class="panel-heading">
                        <div class="pull-left">
                            <h6 class="panel-title txt-dark">Request Ride</h6>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                            <div class="table-wrap">
                                <div class="table-responsive">
                                    <table class="table mb-0">
                                        <tbody>
                                            <tr>
                                                <td class="border-none">Rider Name:</td>
                                                <td class="border-none">
                                                    {{ rideDetail.Fname + " " + rideDetail.Lname }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Rider E-mail:</td>
                                                <td>{{ rideDetail.email }}</td>
                                            </tr>
                                            <tr>
                                                <td>Rider Phone</td>
                                                <td>{{ rideDetail.phone }}</td>
                                            </tr>
                                            <tr>
                                                <td>Rider wheelchair</td>
                                                <td>{{ rideDetail.wheelchair }}</td>
                                            </tr>
                                            <tr>
                                                <td>Rider Round Trip</td>
                                                <td>{{ rideDetail.round_trip }}</td>
                                            </tr>
                                            <tr>
                                                <td>Rider Trip Date</td>
                                                <td>{{ rideDetail.trip_date }}</td>
                                            </tr>
                                            <tr>
                                                <td>Rider Message</td>
                                                <td>{{ rideDetail.message }}</td>
                                            </tr>
                                            <tr>
                                                <td>Start Location</td>
                                                <td>{{ rideDetail.start_address }}</td>
                                            </tr>
                                            <tr>
                                                <td>End Location</td>
                                                <td>{{ rideDetail.end_address }}</td>
                                            </tr>
                                            <tr>
                                                <td>Distance</td>
                                                <td>{{ rideDetail.distance }}</td>
                                            </tr>
                                            <tr>
                                                <td>Cost</td>
                                                <td>{{ rideDetail.cost }}</td>
                                            </tr>
                                            <tr>
                                                <td>Created Ride Date</td>
                                                <td>{{ 
                                                    new Date(rideDetail.created_at).getDate() + '-' + 
                                                    new Date(rideDetail.created_at).getMonth() + '-' +
                                                    new Date(rideDetail.created_at).getFullYear()
                                                }}</td>
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
export default{
    props:{
        rideDetail:null,
    },
    data(){
        return{

        }
    }
}
</script>