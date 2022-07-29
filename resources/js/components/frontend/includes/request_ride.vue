<template>
    <div>
        <div class="card-header bg-transparent border-0">
            <h3 class="m-0"><i class="fa fa-ambulance pr-1"></i> Request A Ride</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">Last Name</th>
                        <th scope="col">First Name</th>
                        <th scope="col">W/c Or Amb</th>
                        <th scope="col">Phone Number</th>
                        <th scope="col">Notes</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-if="getRequestRide == ''">
                        <td colspan="11" class="text-center">No Record</td>
                    </tr>
                    <tr v-else v-for="(item, index) in getRequestRide" :key="index">
                        <td>{{ item.Lname }}</td>
                        <td>{{ item.Fname }}</td>
                        <td>{{ item.wheelchair }}</td>
                        <td>{{ item.phone }}</td>
                        <td>{{ item.message }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            getRequestRide: null
        }

    },
    computed: {},
    methods: {
        getUserRequestRide: function () {
            axios.get('user/request/ride',).then(response => {
                this.getRequestRide = response.data.data
            })
        }
    },
    mounted() {
        this.getUserRequestRide()
    }
}
</script>
