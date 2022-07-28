<template>
    <div>
        <router-view></router-view>
    </div>
</template>
<script>
import NewRide from "./childs/newRide.vue";
import AssignRide from "./childs/assign.vue";
import RejectRide from "./childs/reject.vue";
import ProcessRide from "./childs/process.vue";
import CompleteRide from "./childs/complete.vue";
export default {
    components: {
        NewRide,
        AssignRide,
        RejectRide,
        ProcessRide,
        CompleteRide,
    }
};
</script>
