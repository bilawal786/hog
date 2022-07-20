<template>
    <div>
        <div class="card-header bg-transparent border-0">
            <h3 class="m-0"><i class="fa fa-question-circle pr-1"></i> Billing Questions</h3>
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
                        <th scope="col">Account</th>
                        <th scope="col">Invoice</th>
                        <th scope="col">Message</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-if="getBilling == ''">
                        <td colspan="7" class="text-center">No Record</td>
                    </tr>
                    <tr v-else v-for="(item, index) in getBilling" :key="index">
                        <th scope="row">{{ index + 1 }}</th>
                        <td>{{ item.Lname }}</td>
                        <td>{{ item.Fname }}</td>
                        <td>{{ item.email }}</td>
                        <td>{{ item.phone }}</td>
                        <td>{{ item.account }}</td>
                        <td>{{ item.invice }}</td>
                        <td>{{ item.message }}</td>
                        <!-- <td>
                            <a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                            <a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                        </td> -->
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
            getBilling: null
        }

    },
    computed: {},
    methods: {
        getUserBillingQuestion: function () {
            axios.get('user/billing/questions',).then(response => {
                this.getBilling = response.data.data
            })
        }
    },
    mounted() {
        this.getUserBillingQuestion()
    }
}
</script>
