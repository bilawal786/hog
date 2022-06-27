<template>
    <div>
        <router-view></router-view>
<!--        <driver-list-view></driver-list-view>-->
        <!-- /Row -->

    </div>
</template>
<script>
// import DriverCreate from "./driverCreate";
// import DriverListView from "./driverListView";

export default {
    data() {
        return {
            // drivers: null,

            formShow: false,

            // panel: {
            //     allDrivers: true,
            //     detail: false
            // }
        };
    },
    mounted() {

    },
    methods: {




        backToList: function () {
            this.panel.allDrivers = true
            this.panel.detail = false
        }
    },
    components: {
        // DriverCreate,
        // DriverListView,
    }
};
</script>
<style scoped>
.st-ad {
    white-space: nowrap;
    width: 150px;
    overflow: hidden;
    text-overflow: ellipsis;
}
</style>
