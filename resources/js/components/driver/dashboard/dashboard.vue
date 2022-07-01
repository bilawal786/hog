<template>
<div>
	<div class="preloader-it" v-show="loader">
		<div class="la-anim-1"></div>
	</div>
    <div class="container-fluid pt-25">
		<count-leads></count-leads>
		<div class="row" v-if="leadDetail == null">
			<div class="col-sm-12">
				<div class="panel panel-default card-view">
					<div class="panel-heading">
						<div class="pull-left">
							<h6 class="panel-title txt-dark">Rides</h6>
						</div>
						<div class="pull-right">
							<a href="#" class="pull-left inline-block full-screen">
								<i class="zmdi zmdi-fullscreen"></i>
							</a>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="panel-wrapper collapse in">
						<div class="panel-body row pa-0">
							<div class="table-wrap">
								<div class="table-responsive">
									<table class="table display product-overview border-none" id="support_table">
										<thead>
											<tr>
												<th>Client Name</th>
												<th>Notes</th>
												<th>Date</th>
												<th>Time</th>
												<th>Status</th>
												<th>Actions</th>
											</tr>
										</thead>
										<tbody>
											<tr v-for="lead in leads" :key="lead.id">
												<td>{{lead.name}}</td>
												<td>{{lead.notes}}</td>
												<td><date-formate :date="lead.trip_date"></date-formate></td>
												<td><set-time :date="lead.trip_date"></set-time></td>
												<td>
													<span class="label label-primary" v-if="lead.status == 'assign'">{{lead.status}}</span>
													<span class="label label-warning" v-if="lead.status == 'process'">{{lead.status}}</span>
													<span class="label label-danger" v-if="lead.status == 'reject'">{{lead.status}}</span>
													<span class="label label-success" v-if="lead.status == 'complete'">{{lead.status}}</span>
												</td>
												<td>
													<button @click="showLeadDetail(lead.ride_id, lead.id, lead.status)"  class="pr-10 btn btn-primary btn-icon-anim btn-circle btn-sm"><i class="zmdi zmdi-eye"></i></button>
												</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		 <div class="row" v-if="leadDetail">
            <div class="col-sm-12">
                <div class="panel panel-default card-view">
                    <div class="panel-heading">
                        <div class="pull-left">
                            <h6 class="panel-title txt-dark">Ride details</h6>
                        </div>
                        <div class="pull-right">
                            <button class="btn btn-primary btn-anim btn-sm" @click="backToList()">
                                <i class="fa fa-arrow-left" style="color: #fff"></i><span class="btn-text">back</span>
                            </button>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
		<!-- /Row -->
		<div class="row" v-if="leadDetail">
			<div class="col-sm-6">
				<div class="panel panel-default card-view">
					<div class="panel-heading">
						<div class="pull-left">
							<h6 class="panel-title txt-dark">Ride Details</h6>
						</div>
						<div class="pull-right">
							<a href="#" class="pull-left inline-block full-screen">
								<i class="zmdi zmdi-fullscreen"></i>
							</a>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="panel-wrapper collapse in">
						<div class="panel-body row pa-0">
							<div class="table-wrap">
            <div class="table-responsive">
                <table class="table mb-0">
                    <tbody>
                        <tr>
                            <td class="border-none">Name:</td>
                            <td class="border-none">
                               {{leadDetail.Fname+' '+leadDetail.Lname}}
                            </td>
                        </tr>
                        <tr>
                            <td>E-mail:</td>
                            <td>{{leadDetail.email}}</td>
                        </tr>
                        <tr>
                            <td>Phone:</td>
                            <td>{{leadDetail.phone}}</td>
                        </tr>
                        <tr>
                            <td>Message:</td>
                            <td>{{leadDetail.message}}</td>
                        </tr>
						 <tr>
                            <td>Wheelchair:</td>
                            <td>{{leadDetail.wheelchair}}</td>
                        </tr>
						 <tr>
                            <td>Round Trip:</td>
                            <td>{{leadDetail.round_trip}}</td>
                        </tr>
						<tr>
                            <td>Trip Date:</td>
                            <td>
                                <date-formate :date="leadDetail.trip_date" year="yes"></date-formate>
                            </td>
                        </tr>
						<tr>
                            <td>Trip Time:</td>
                            <td>
                                <set-time :date="leadDetail.trip_date"></set-time>
                            </td>
                        </tr>
						<tr>
                            <td>Start Address:</td>
                            <td>{{leadDetail.start_address}}</td>
                        </tr>
						<tr>
                            <td>End Address:</td>
                            <td>{{leadDetail.end_address}}</td>
                        </tr>
						<tr>
                            <td>Distance:</td>
                            <td>{{Math.round(leadDetail.distance)}} Mi</td>
                        </tr>
						<tr>
                            <td>Created Date:</td>
                            <td>
                                <date-formate :date="leadDetail.created_at" year="yes"></date-formate>

                            </td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>

						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="panel panel-default card-view">
					<div class="panel-heading">
						<div class="pull-left">
							<h6 class="panel-title txt-dark">Status</h6>
						</div>
						<div class="pull-right">
							<a class="pull-left inline-block full-screen">
								<i class="zmdi zmdi-fullscreen"></i>
							</a>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="panel-wrapper collapse in">
						<div class="panel-body row">
							<div class="table-responsive">
							<div class="col-sm-6 col-xs-12 mt-15" v-if="status == 'assign'">
								<button class="btn btn-warning btn-rounded btn-block btn-anim" @click="processRide(leadId)"><i class="zmdi zmdi-truck"></i><span class="btn-text">Process</span></button>
							</div>
							<div class="col-sm-6 col-xs-12 mt-15" v-if="status == 'assign'">
								<button class="btn btn-danger btn-rounded btn-block btn-anim" @click="rejectRide(leadId)"><i class="zmdi zmdi-close"></i><span class="btn-text">Reject</span></button>
							</div>
							<div class="col-sm-6 col-xs-12 mt-15" v-if="status == 'process'">
								<button class="btn btn-success btn-rounded btn-block btn-anim" @click="completeRide(leadId)"><i class="zmdi zmdi-check"></i><span class="btn-text">Complete</span></button>
							</div>
							</div>
						</div>
					</div>
				</div>
                <div class="panel panel-default card-view">
                    <div class="panel-heading">
                        <div class="pull-left">
                            <h6 class="panel-title txt-dark">Payment Info</h6>
                        </div>
                        <div class="pull-right">
                            <a href="#" class="pull-left inline-block full-screen">
                                <i class="zmdi zmdi-fullscreen"></i>
                            </a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body row pa-0">
                            <div class="table-wrap">
                                <div class="table-responsive">
                                    <table class="table mb-0">
                                        <tbody>
                                        <tr>
                                            <td class="border-none">Price:</td>
                                            <td class="border-none">
                                                $ {{driverLeadDetail.driver_cost}}
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
			</div>
		</div>
		<!-- /Row -->
    </div>
	</div>
</template>
<script>
import DateFormate from '../../dateSet.vue'
import SetTime from '../../setTime.vue'
import CountLeads from './driverDashboardContLeads.vue'
export default{
    data(){
        return{
			loader:true,
			leads:null,
			leadDetail:null,
			status:null,
			leadId:null,
            leadCost:null,
            driverLeadDetail:null
        }
    },
    mounted(){
		this.getLeads()
    },
    methods:{
		getLeads: function(){
            axios.get('admin/web/show/driver/leads').then(response => {
				if(response.status == 200){
					this.leads = response.data;
					console.log(response.data)
				}
			})
        },
		showLeadDetail: function(Rid, Lid, status){
			axios.get('admin/web/form/request/ride/'+Rid).then(response => {
                console.log(Lid)
                console.log(Rid)
                this.driverLead(Lid)
				this.leadDetail = response.data
                // this.leadCost = cost
				this.status = status
				this.leadId = Lid
			})
		},
        driverLead: function(id){
            axios.get('admin/web/show/driver/leads/'+id).then(response => {
                this.driverLeadDetail = response.data
                console.log(response)
            })
        },
		processRide: function(id){
			Swal.fire({
                title: 'Are you sure ?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: 'rgb(34 110 237 / 85%)',
                cancelButtonColor: '#ff2a00',
                confirmButtonText: 'Yes, Change it!'
            }, () => {
            }).then((result) => {
                if (result.value) {
					axios.put('admin/web/show/driver/leads/'+id, {
						'status' : 'process',
						'process': 'yes'
					}).then(response => {
						if(response.status == 200){
							this.leadDetail=null,
							this.status=null,
							this.leadId=null,
							this.getLeads()
						}
					})
                }
            })
		},
		rejectRide: function(id){
			Swal.fire({
                title: 'Are you sure ?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: 'rgb(34 110 237 / 85%)',
                cancelButtonColor: '#ff2a00',
                confirmButtonText: 'Yes, Change it!'
            }, () => {
            }).then((result) => {
                if (result.value) {
					axios.put('admin/web/show/driver/leads/'+id, {
						'status' : 'reject',
						'reject' : 'yes'
					}).then(response => {
						if(response.status == 200){
							this.leadDetail=null,
							this.status=null,
							this.leadId=null,
							this.getLeads()
						}
					})
                }
            })
		},
		completeRide: function(id){
			Swal.fire({
                title: 'Are you sure ?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: 'rgb(34 110 237 / 85%)',
                cancelButtonColor: '#ff2a00',
                confirmButtonText: 'Yes, Change it!'
            }, () => {
            }).then((result) => {
                if (result.value) {
					axios.put('admin/web/show/driver/leads/'+id, {
						'status' : 'complete',
						'complete': 'yes'
					}).then(response => {
						if(response.status == 200){
                            this.driverLead(id);
                            this.addDriverPayment();
							this.leadDetail=null,
							this.status=null,
							this.leadId=null,
							this.getLeads()
						}
					})
                }
            })
		},

        addDriverPayment: function(){
            axios.post('admin/web/payment/driver', {
                'driver_id':this.driverLeadDetail.driver_id,
                'ride_id':this.driverLeadDetail.ride_id,
                'payment' : this.driverLeadDetail.driver_cost,
                'status': 0
            }).then(response => {

            })
        },
		backToList: function(){
			this.leadDetail=null,
			this.status=null,
			this.leadId=null,
			this.loader=false,
			this.getLeads()
		}
    },
	components: {
		DateFormate,
		SetTime,
		CountLeads
	}
}
</script>
