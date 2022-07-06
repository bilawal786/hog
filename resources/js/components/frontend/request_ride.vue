<template>
    <div>
        <div v-if="$route.params.title" class="contact-us-area mr-top-60">
            <div class="container">
                <div class="row">
                    <div class="" style="width: 100%;">
                        <div class="card-header bg-transparent border-0">
                            <h3 class="mb-0"><i class="fa fa-clone pr-1"></i>{{ $route.params.title.type }}</h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-striped">
                                <tr v-show="$route.params.title.Fname">
                                    <th width="25%">First Name</th>
                                    <td width="2%">:</td>
                                    <td>{{ $route.params.title.Fname }}</td>
                                </tr>
                                <tr v-show="$route.params.title.Lname">
                                    <th width="25%">Last Name</th>
                                    <td width="2%">:</td>
                                    <td>{{ $route.params.title.Lname }}</td>
                                </tr>
                                <tr v-show="$route.params.title.email">
                                    <th width="25%">E-mail</th>
                                    <td width="2%">:</td>
                                    <td>{{ $route.params.title.email }}</td>
                                </tr>
                                <tr v-show="$route.params.title.phone">
                                    <th width="25%">Phone #</th>
                                    <td width="2%">:</td>
                                    <td>{{ $route.params.title.phone }}</td>
                                </tr>
                                <tr v-show="$route.params.title.card_on_file">
                                    <th width="25%">Card On Flile Y/N</th>
                                    <td width="2%">:</td>
                                    <td>{{ $route.params.title.card_on_file }}</td>
                                </tr>
                                <tr v-show="$route.params.title.relative">
                                    <th width="25%">Relative</th>
                                    <td width="2%">:</td>
                                    <td>{{ $route.params.title.relative }}</td>
                                </tr>
                                <tr v-show="$route.params.title.relative_no">
                                    <th width="25%">Relative #</th>
                                    <td width="2%">:</td>
                                    <td>{{ $route.params.title.relative_no }}</td>
                                </tr>
                                <tr v-show="$route.params.title.facility">
                                    <th width="25%">Facility</th>
                                    <td width="2%">:</td>
                                    <td>{{ $route.params.title.facility }}</td>
                                </tr>
                                <tr v-show="$route.params.title.account">
                                    <th width="25%">Account</th>
                                    <td width="2%">:</td>
                                    <td>{{ $route.params.title.account }}</td>
                                </tr>
                                <tr v-show="$route.params.title.invoice">
                                    <th width="25%">Invoice</th>
                                    <td width="2%">:</td>
                                    <td>{{ $route.params.title.invoice }}</td>
                                </tr>
                                <tr v-show="$route.params.title.wheelchair">
                                    <th width="25%">wheelchair</th>
                                    <td width="2%">:</td>
                                    <td>{{ $route.params.title.wheelchair }}</td>
                                </tr>
                                <tr v-show="$route.params.title.round_trip">
                                    <th width="25%">Round Trip</th>
                                    <td width="2%">:</td>
                                    <td>{{ $route.params.title.round_trip }}</td>
                                </tr>
                                <tr v-show="$route.params.title.trip_date">
                                    <th width="25%">Trip Date</th>
                                    <td width="2%">:</td>
                                    <td>
                                        <set-date :date="$route.params.title.trip_date" year="yes"></set-date>
                                    </td>
                                </tr>
                                <tr v-show="$route.params.title.trip_date">
                                    <th width="25%">Trip Time</th>
                                    <td width="2%">:</td>
                                    <td>
                                        <set-time :date="$route.params.title.trip_date" year="yes"></set-time>
                                    </td>
                                </tr>
                                <tr v-show="$route.params.title.message">
                                    <th width="25%">Message</th>
                                    <td width="2%">:</td>
                                    <td>{{ $route.params.title.message }}</td>
                                </tr>
                                <tr v-show="$route.params.title.start_address">
                                    <th width="25%">From</th>
                                    <td width="2%">:</td>
                                    <td>{{ $route.params.title.start_address }}</td>
                                </tr>
                                <tr v-show="$route.params.title.end_address">
                                    <th width="25%">To</th>
                                    <td width="2%">:</td>
                                    <td>{{ $route.params.title.end_address }}</td>
                                </tr>
                                <tr v-show="$route.params.title.cost">
                                    <th width="25%">Cost</th>
                                    <td width="2%">:</td>
                                    <td>$ {{ $route.params.title.cost }}</td>
                                </tr>
                            </table>
                            <button class="btn btn-hog" @click="conformData()">Confirm</button>
                            <button class="btn btn-hog" @click="backRoute()">Back to Edit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div v-else>
            <div id="notfound">
                <div class="notfound">
                    <div class="notfound-404">
                        <h1>Oops!</h1>
                        <h2>Your data has been losse</h2>
                    </div>
                    <router-link to="/contact">Go TO contact</router-link>
                </div>
            </div>
        </div>
    </div>
</template>
<script>

export default {
    methods: {
        backRoute: function () {
            this.$router.push({name: 'contact', params: {title: this.$route.params.title}})
        },
        conformData: function () {
            axios.post("send/message", this.$route.params.title)
                .then(response => {
                    if (response) {
                        this.$store.commit("setErrors", {}),
                            this.$router.push({name: 'contact'})
                    }
                });
        }
    },
    mounted() {
        window.scrollTo(0, 0);
    }
}
</script>
