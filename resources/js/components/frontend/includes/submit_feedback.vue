<template>
    <div>
        <div class="card-header bg-transparent border-0">
            <h3 class="m-0"><i class="fa fa-comments-o pr-1"></i> Feedbacks</h3>
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
                        <th scope="col">Message</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="(item, index) in getFeedbacks" :key="index">
                        <td>{{ item.Lname }}</td>
                        <td>{{ item.Fname }}</td>
                        <td>{{ item.email }}</td>
                        <td>{{ item.phone }}</td>
                        <td>{{ item.account }}</td>
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
            getFeedbacks: null
        }

    },
    mounted() {
        this.getUserFeedBack()
    },
    methods: {
        getUserFeedBack: function () {
            axios.get('user/submit/feedback',).then(response => {
                this.getFeedbacks = response.data.data
            })
        }
    }
}
</script>
