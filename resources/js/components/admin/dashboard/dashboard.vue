<template>
    <div>
        <div class="container-fluid pt-25">
            <count-widged></count-widged>
            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-12 col-xs-12">
                    
					<ride-request-widgets></ride-request-widgets>
					<user-list-widgets></user-list-widgets>
                </div>
                <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
					<latest-leads-widgets></latest-leads-widgets>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import CountWidged from "./leadsCountWidged.vue"
import UserListWidgets from "./userListWidgets.vue"
import RideRequestWidgets from "./rideRequestWidgets.vue"
import LatestLeadsWidgets from "./latestLeadsWidgets.vue"

export default {
    components: {
    CountWidged,
    UserListWidgets,
    RideRequestWidgets,
    LatestLeadsWidgets
}
}
</script>