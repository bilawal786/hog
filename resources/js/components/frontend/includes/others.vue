<template>
    <div>
        <div class="card-header bg-transparent border-0">
            <h3 class="m-0"><i class="fa fa-info-circle pr-1"></i> Request A Ride</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">Last Name</th>
                        <th scope="col">First Name</th>
                        <th scope="col">E-mail</th>
                        <th scope="col">Phone #</th>
                        <th scope="col">Message</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-if="getOthers == ''">
                        <td colspan="5" class="text-center">No Record</td>
                    </tr>
                    <tr v-else v-for="(item, index) in getOthers" :key="index">
                        <th scope="row">{{ index + 1 }}</th>
                        <td>{{ item.Lname }}</td>
                        <td>{{ item.Fname }}</td>
                        <td>{{ item.email }}</td>
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
            getOthers: null
        }

    },
    computed: {},
    methods: {
        getUserOthers: function () {
            axios.get('user/contact/others',).then(response => {
                this.getOthers = response.data.data
            })
        }
    },
    mounted() {
        this.getUserOthers()
    }
}
</script>
