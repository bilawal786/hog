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
                                                <td class="border-none">Last Name:</td>
                                                <td class="border-none">
                                                    {{ rideDetail.Lname }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="border-none">First Name:</td>
                                                <td class="border-none">
                                                    {{ rideDetail.Fname }}
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
                                                <td>Card on file</td>
                                                <td>{{ rideDetail.card_on_file }}</td>
                                            </tr>
                                            <tr>
                                                <td>Rider Relative</td>
                                                <td>{{ rideDetail.relative }}</td>
                                            </tr>
                                            <tr>
                                                <td>Rider Relative No.</td>
                                                <td>{{ rideDetail.relative_no }}</td>
                                            </tr>
                                            <tr>
                                                <td>Rider Facility</td>
                                                <td>{{ rideDetail.facility }}</td>
                                            </tr>
                                            <tr>
                                                <td>W/C or Amb</td>
                                                <td>{{ rideDetail.wheelchair }}</td>
                                            </tr>
                                            <tr>
                                                <td>Round Trip</td>
                                                <td>{{ rideDetail.round_trip }}</td>
                                            </tr>
                                            <tr v-if="rideDetail.round_trip=='yes'">
                                                <td>Waiting</td>
                                                <td>{{ rideDetail.waiting }} Hour</td>
                                            </tr>
                                            <tr>
                                                <td>Rider Trip Date</td>
                                                <td>
                                                    <set-date :date="rideDetail.trip_date" :year="'yes'"></set-date>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Rider Trip Time</td>
                                                <td>
                                                    <set-time :date="rideDetail.trip_date"></set-time>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Rider Notes</td>
                                                <td>{{ rideDetail.message }}</td>
                                            </tr>
                                            <tr>
                                                <td>Start Location</td>
                                                <td>{{ rideDetail.start_address+', '+rideDetail.start_city+', '+rideDetail.start_country }}</td>
                                            </tr>
                                            <tr>
                                                <td>End Location</td>
                                                <td>{{ rideDetail.end_address+', '+rideDetail.end_city+', '+rideDetail.end_country}}</td>
                                            </tr>
                                            <tr>
                                                <td>Distance</td>
                                                <td>{{ Math.round(rideDetail.distance) }} Mi</td>
                                            </tr>
                                            <tr>
                                                <td>Cost</td>
                                                <td>$ {{ rideDetail.cost }}</td>
                                            </tr>
                                            <tr>
                                                <td>Created Ride Date</td>
                                                <td>
                                                    <set-date :date="rideDetail.created_at" :year="'yes'"></set-date>
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
