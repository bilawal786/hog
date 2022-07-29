<template>
    <div class="panel panel-default card-view">
        <div class="panel-wrapper collapse in">
            <div class="panel-body">
                <div class="tab-struct custom-tab-1">

                    <ul role="tablist" class="nav nav-tabs" id="myTabs_7">
                        <li class="active" ><router-link :to="'/request/ride/list'">New Rides</router-link></li>
                        <li class=""><router-link :to="'/request/ride/assign'" >Assign</router-link></li>
                        <li class=""><router-link :to="'/request/ride/process'" >Process</router-link></li>
                        <li class=""><router-link :to="'/request/ride/reject'" >Reject</router-link></li>
                        <li class=""><router-link :to="'/request/ride/complete'" >Complete</router-link></li>
                        <li class="active" style="float: right"><router-link :to="'/request/ride/new'" >Create new Ride</router-link></li>
                    </ul>

                    <div class="tab-content">
                        <new-ride></new-ride>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import NewRide from "./childs/newRide.vue";
export default {
    data() {
        return {

        };
    },
    watch: {

    },
    mounted() {

    },
    methods: {


    },
    components: {
        NewRide,
    }
};
</script>
