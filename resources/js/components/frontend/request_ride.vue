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
                                <tr v-show="$route.params.title.ridePerson">
                                    <th width="25%">Ride Type</th>
                                    <td width="2%">:</td>
                                    <td>{{ $route.params.title.ridePerson }}</td>
                                </tr>
                                <tr v-if="$route.params.title.ridePerson == 'Someone Else'">
                                    <th width="25%">Else First Name</th>
                                    <td width="2%">:</td>
                                    <td>{{ $route.params.title.else_first_name }}</td>
                                </tr>
                                <tr v-if="$route.params.title.ridePerson == 'Someone Else'">
                                    <th width="25%">Else Last Name</th>
                                    <td width="2%">:</td>
                                    <td>{{ $route.params.title.else_last_name }}</td>
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
                                <tr v-show="$route.params.title.appt_length">
                                    <th width="25%">Approximate Length of Appt</th>
                                    <td width="2%">:</td>
                                    <td>{{ $route.params.title.appt_length }}</td>
                                </tr>
                                <tr v-show="$route.params.title.message">
                                    <th width="25%">Message</th>
                                    <td width="2%">:</td>
                                    <td>{{ $route.params.title.message }}</td>
                                </tr>
                                <tr v-show="$route.params.title.familycaregive">
                                    <th width="25%">Will a caregiver and/or family member be riding along</th>
                                    <td width="2%">:</td>
                                    <td>{{ $route.params.title.familycaregive }}</td>
                                </tr>
                                <tr v-if="$route.params.title.familycaregive == 'yes'">
                                    <th width="25%">how many family member/s?</th>
                                    <td width="2%">:</td>
                                    <td>{{ $route.params.title.num_family_member }}</td>
                                </tr>
                                <tr v-show="$route.params.title.pertaining">
                                    <th width="25%">Anything else we should know pertaining to this ride?</th>
                                    <td width="2%">:</td>
                                    <td>{{ $route.params.title.pertaining }}</td>
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
                            <button class="btn btn-hog" @click="laterpayment()" :disabled="isloadinglater">
                                <span v-if="isloadinglater"><span class="fam fa fa-spinner fa-spin"></span>Loading</span>
                                <span v-else>Payment Later</span>
                            </button>
                            <button class="btn btn-hog" @click="conformData()" :disabled="isloading">
                                <span v-if="isloading"><span class="fam fa fa-spinner fa-spin"></span>Loading</span>
                                <span v-else>Advance Payment</span>
                            </button>
                            <button class="btn btn-hog" @click="backRoute()" :disabled="isloading || isloadinglater">Back to Edit</button>
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
    data(){
        return{
            isloading:false,
            isloadinglater:false
        }
    },
    methods: {
        backRoute: function () {
            this.$router.push({name: 'contact', params: {title: this.$route.params.title}})
        },
        laterpayment: function () {
            this.isloadinglater=true
            axios.post("send/message", this.$route.params.title)
                .then(response => {
                    console.log(response.data)
                    this.isloadinglater=false
                    window.scrollTo(0, 0)
                    switch (response.data.type) {
                        case 'info':
                            toastr.info(response.data.messege);
                            break;
                        case 'success':
                            toastr.success(response.data.messege);
                            break;
                        case 'warning':
                            toastr.warning(response.data.messege);
                            break;
                        case 'error':
                            toastr.error(response.data.messege);
                            break;
                    }
                    this.$router.push({name: 'contact'})
                }).catch(()=>{
                this.isloadinglater=false
            });
        },
        conformData: function () {
            this.isloading=true
            axios.post("send/message", this.$route.params.title)
                .then(response => {
                    if (response) {
                        this.$store.commit("setErrors", {})
                        window.location = "checkout/"+response.data.id;
                        this.isloading=false
                    }
                }).catch(()=>{
                this.isloading=false
            });
        }
    },
    mounted() {
        window.scrollTo(0, 0);
    }
}
</script>
