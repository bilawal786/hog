<template>
    <div>
        <div class="container-fluid pt-25">
            <count-widged></count-widged>
            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-12 col-xs-12">
                    <div class="panel panel-default card-view">
                        <div class="panel-heading">
                            <div class="pull-left">
                                <h6 class="panel-title txt-dark">Ride Requests</h6>
                            </div>
                            <div class="pull-right">
                                <a href="#" class="pull-left inline-block mr-15">
                                    <i class="zmdi zmdi-download"></i>
                                </a>
                                <a href="#" class="pull-left inline-block close-panel" data-effect="fadeOut">
                                    <i class="zmdi zmdi-close"></i>
                                </a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="panel-wrapper collapse in">
                            <div class="panel-body">
                                <div>
                                    <span class="pull-left inline-block capitalize-font txt-dark">
                                        User Requests
                                    </span>
                                    <span class="label label-default pull-right">2</span>
                                    <div class="clearfix"></div>
                                    <hr class="light-grey-hr row mt-10 mb-10" />
                                    <span class="pull-left inline-block capitalize-font txt-dark">
                                        Guest Requests
                                    </span>
                                    <span class="label label-default pull-right">5</span>
                                    <div class="clearfix"></div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default card-view">
								<div class="panel-heading">
								<div class="pull-left">
									<h6 class="panel-title txt-dark">User List</h6>
								</div>
								<div class="clearfix"></div>
							</div>
								<div class="panel-wrapper collapse in">
									<div class="panel-body row">
										<div class="">
											<div class="pl-15 pr-15 mb-15">
												<div class="pull-left">
													<i class="zmdi zmdi-accounts inline-block mr-10 font-16"></i>
													<span class="inline-block txt-dark">Clients</span>
												</div>	
												<span class="inline-block txt-warning pull-right weight-500">12</span>
												<div class="clearfix"></div>
											</div>
											<hr class="light-grey-hr mt-0 mb-15"/>
											<div class="pl-15 pr-15 mb-15">
												<div class="pull-left">
													<i class="zmdi zmdi-truck inline-block mr-10 font-16"></i>
													<span class="inline-block txt-dark">Drivers</span>
												</div>	
												<span class="inline-block txt-danger pull-right weight-500">23</span>
												<div class="clearfix"></div>
											</div>
											<hr class="light-grey-hr mt-0 mb-15"/>
											<div class="pl-15 pr-15 mb-15">
												<div class="pull-left">
													<i class="zmdi zmdi-settings inline-block mr-10 font-16"></i>
													<span class="inline-block txt-dark">Admins</span>
												</div>	
												<span class="inline-block txt-primary pull-right weight-500">43</span>
												<div class="clearfix"></div>
											</div>
										</div>
									</div>
								</div>
							</div>
					
                </div>
                <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                    <div class="panel panel-default card-view panel-refresh">
							<div class="refresh-container">
								<div class="la-anim-1"></div>
							</div>
							<div class="panel-heading">
								<div class="pull-left">
									<h6 class="panel-title txt-dark">Process Leads</h6>
								</div>
								<div class="pull-right">
									<a href="#" class="pull-left inline-block refresh mr-15">
										<i class="zmdi zmdi-replay"></i>
									</a>
									<a href="#" class="pull-left inline-block full-screen mr-15">
										<i class="zmdi zmdi-fullscreen"></i>
									</a>
									<div class="pull-left inline-block dropdown">
										<a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false" role="button"><i class="zmdi zmdi-more-vert"></i></a>
										<ul class="dropdown-menu bullet dropdown-menu-right"  role="menu">
											<li role="presentation"><a href="javascript:void(0)" role="menuitem"><i class="icon wb-reply" aria-hidden="true"></i>Edit</a></li>
											<li role="presentation"><a href="javascript:void(0)" role="menuitem"><i class="icon wb-share" aria-hidden="true"></i>Delete</a></li>
											<li role="presentation"><a href="javascript:void(0)" role="menuitem"><i class="icon wb-trash" aria-hidden="true"></i>New</a></li>
										</ul>
									</div>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="panel-wrapper collapse in">
								<div class="panel-body row pa-0">
									<div class="table-wrap">
										<div class="table-responsive">
											<table class="table table-hover mb-0">
												<thead>
													<tr>
														<th>Campaign</th>
														<th>Client</th>
														<th>Changes</th>
														<th>Budget</th>
														<th>Status</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td><span class="txt-dark weight-500">Facebook</span></td>
														<td>Beavis</td>
														<td><span class="txt-success"><i class="zmdi zmdi-caret-up mr-10 font-20"></i><span>2.43%</span></span></td>
														<td>
															<span class="txt-dark weight-500">$1478</span>
														</td>
														<td>
															<span class="label label-primary">Active</span>
														</td>
													</tr>
													<tr>
														<td><span class="txt-dark weight-500">Youtube</span></td>
														<td>Felix</td>
														<td><span class="txt-success"><i class="zmdi zmdi-caret-up mr-10 font-20"></i><span>1.43%</span></span></td>
														<td>
															<span class="txt-dark weight-500">$951</span>
														</td>
														<td>
															<span class="label label-danger">Closed</span>
														</td>
													</tr>
													<tr>
														<td><span class="txt-dark weight-500">Twitter</span></td>
														<td>Cannibus</td>
														<td><span class="txt-danger"><i class="zmdi zmdi-caret-down mr-10 font-20"></i><span>-8.43%</span></span></td>
														<td>
															<span class="txt-dark weight-500">$632</span>
														</td>
														<td>
															<span class="label label-default">Hold</span>
														</td>
													</tr>
													<tr>
														<td><span class="txt-dark weight-500">Spotify</span></td>
														<td>Neosoft</td>
														<td><span class="txt-success"><i class="zmdi zmdi-caret-up mr-10 font-20"></i><span>7.43%</span></span></td>
														<td>
															<span class="txt-dark weight-500">$325</span>
														</td>
														<td>
															<span class="label label-default">Hold</span>
														</td>
													</tr>
													<tr>
														<td><span class="txt-dark weight-500">Instagram</span></td>
														<td>Hencework</td>
														<td><span class="txt-success"><i class="zmdi zmdi-caret-up mr-10 font-20"></i><span>9.43%</span></span></td>
														<td>
															<span class="txt-dark weight-500">$258</span>
														</td>
														<td>
															<span class="label label-primary">Active</span>
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
        </div>
    </div>
</template>
<script>
import CountWidged from "./countWidged.vue"

export default {
    components: {
        CountWidged
    }
}
</script>