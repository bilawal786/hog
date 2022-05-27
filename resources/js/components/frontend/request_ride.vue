<template>
    <div>
        <top-header></top-header>
        <navigation-bar></navigation-bar>
             <div class="contact-us-area mr-top-60" v-if="$route.params.title">
                <div class="container">
                    <div class="row">
                        <div class="" style="width: 100%;">
                            <div class="card-header bg-transparent border-0">
                                <h3 class="mb-0"><i class="fa fa-clone pr-1"></i>{{$route.params.title.type}}</h3>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered">
                                <tr v-show="$route.params.title.Fname">
                                    <th width="25%">First Name</th>
                                    <td width="2%">:</td>
                                    <td>{{$route.params.title.Fname}}</td>
                                </tr>
                                <tr v-show="$route.params.title.Lname">
                                    <th width="25%">Last Name</th>
                                    <td width="2%">:</td>
                                    <td>{{$route.params.title.Lname}}</td>
                                </tr>
                                <tr v-show="$route.params.title.email">
                                    <th width="25%">E-mail</th>
                                    <td width="2%">:</td>
                                    <td>{{$route.params.title.email}}</td>
                                </tr>
                                <tr v-show="$route.params.title.phone">
                                    <th width="25%">Phone #</th>
                                    <td width="2%">:</td>
                                    <td>{{$route.params.title.phone}}</td>
                                </tr>
                                <tr v-show="$route.params.title.account">
                                    <th width="25%">Account</th>
                                    <td width="2%">:</td>
                                    <td>{{$route.params.title.account}}</td>
                                </tr>
                                <tr v-show="$route.params.title.invoice">
                                    <th width="25%">Invoice</th>
                                    <td width="2%">:</td>
                                    <td>{{$route.params.title.invoice}}</td>
                                </tr>
                                <tr v-show="$route.params.title.wheelchair">
                                    <th width="25%">wheelchair</th>
                                    <td width="2%">:</td>
                                    <td>{{$route.params.title.wheelchair}}</td>
                                </tr>
                                <tr v-show="$route.params.title.round_trip">
                                    <th width="25%">Round Trip</th>
                                    <td width="2%">:</td>
                                    <td>{{$route.params.title.round_trip}}</td>
                                </tr>
                                <tr v-show="$route.params.title.trip_date">
                                    <th width="25%">Trip Date</th>
                                    <td width="2%">:</td>
                                    <td>{{$route.params.title.trip_date}}</td>
                                </tr>
                                <tr v-show="$route.params.title.message">
                                    <th width="25%">Message</th>
                                    <td width="2%">:</td>
                                    <td>{{$route.params.title.message}}</td>
                                </tr>
                                <tr v-show="$route.params.title.start_address">
                                    <th width="25%">From</th>
                                    <td width="2%">:</td>
                                    <td>{{$route.params.title.start_address}}</td>
                                </tr>
                                <tr v-show="$route.params.title.end_address">
                                    <th width="25%">To</th>
                                    <td width="2%">:</td>
                                    <td>{{$route.params.title.end_address}}</td>
                                </tr>
                                <tr v-show="$route.params.title.cost">
                                    <th width="25%">Cost</th>
                                    <td width="2%">:</td>
                                    <td>{{$route.params.title.cost}}</td>
                                </tr>
                                </table>
                                <button class="btn btn-hog" @click="conformData()" >Confirm</button>
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
    <web-footer></web-footer>
    </div>
</template>
<script>
import TopHeader from './includes/TopHeader.vue';
import NavigationBar from './includes/navigationbar.vue';
import WebFooter from './includes/footer.vue'
export default {
     components: { TopHeader, NavigationBar, WebFooter },
     methods:{
         backRoute: function(){
              this.$router.push({ name: 'contact', params: {title: this.$route.params.title }})
         },
         conformData: function(){
              axios.post("send/message", this.$route.params.title)
                .then(response => {
                    if (response) {
                        this.$store.commit("setErrors", {}),
                        this.$router.push({ name: 'contact'})
                    }
                });
         }
     },
     mounted() {
          window.scrollTo(0, 0);
     }
}
</script>
