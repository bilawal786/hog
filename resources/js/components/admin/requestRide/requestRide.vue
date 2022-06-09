<template>
    <div>
        <div class="panel panel-default card-view">
            <div class="panel-wrapper collapse in">
                <div class="panel-body">
                    <div class="tab-struct custom-tab-1">
                        <ul role="tablist" class="nav nav-tabs" id="myTabs_7">
                            <li class="active" role="presentation"><a aria-expanded="true" data-toggle="tab" role="tab"
                                    href="#new_ride">New Rides</a></li>
                            <li role="presentation" class=""><a data-toggle="tab" role="tab"
                                    href="#assign" aria-expanded="false">Assign</a></li>
                            <li role="presentation" class=""><a data-toggle="tab" role="tab"
                                    href="#process" aria-expanded="false">Process</a></li>
                            <li role="presentation" class=""><a data-toggle="tab"  role="tab"
                                    href="#reject" aria-expanded="false">Reject</a></li>
                            <li role="presentation" class=""><a data-toggle="tab" role="tab"
                                    href="#complete" aria-expanded="false">Complete</a></li>
                        </ul>
                        <div class="tab-content">
                            <div id="new_ride" class="tab-pane fade active in" role="tabpanel">
                                <new-ride></new-ride>
                            </div>
                            <div id="assign" class="tab-pane fade" role="tabpanel">
                                <assign-ride></assign-ride>
                            </div>
                            <div id="process" class="tab-pane fade" role="tabpanel">
                                <process-ride></process-ride>
                            </div>
                            <div id="reject" class="tab-pane fade" role="tabpanel">
                                <reject-ride></reject-ride>
                            </div>
                            <div id="complete" class="tab-pane fade" role="tabpanel">
                                <complete-ride></complete-ride>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import NewRide from "./childs/newRide.vue";
import AssignRide from "./childs/assign.vue";
import RejectRide from "./childs/reject.vue";
import ProcessRide from "./childs/process.vue";
import CompleteRide from "./childs/complete.vue";
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
        AssignRide,
        RejectRide,
        ProcessRide,
        CompleteRide,
    }
};
</script>