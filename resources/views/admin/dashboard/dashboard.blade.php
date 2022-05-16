@extends('admin.layouts.app')
@section('content')'

<div class="page-wrapper">
	<div class="container-fluid pt-25">
		<!-- Row -->
		<div class="row">
			<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
				<div class="panel panel-default card-view pa-0">
					<div class="panel-wrapper collapse in">
						<div class="panel-body pa-0">
							<div class="sm-data-box bg-red">
								<div class="container-fluid">
									<div class="row">
										<div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
											<span class="txt-light block counter"><span class="counter-anim">914,001</span></span>
											<span class="weight-500 uppercase-font txt-light block font-13">visits</span>
										</div>
										<div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
											<i class="zmdi zmdi-male-female txt-light data-right-rep-icon"></i>
										</div>
									</div>	
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
				<div class="panel panel-default card-view pa-0">
					<div class="panel-wrapper collapse in">
						<div class="panel-body pa-0">
							<div class="sm-data-box bg-yellow">
								<div class="container-fluid">
									<div class="row">
										<div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
											<span class="txt-light block counter"><span class="counter-anim">46.41</span>%</span>
											<span class="weight-500 uppercase-font txt-light block">bounce rate</span>
										</div>
										<div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
											<i class="zmdi zmdi-redo txt-light data-right-rep-icon"></i>
										</div>
									</div>	
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
				<div class="panel panel-default card-view pa-0">
					<div class="panel-wrapper collapse in">
						<div class="panel-body pa-0">
							<div class="sm-data-box bg-green">
								<div class="container-fluid">
									<div class="row">
										<div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
											<span class="txt-light block counter"><span class="counter-anim">4,054,876</span></span>
											<span class="weight-500 uppercase-font txt-light block">pageviews</span>
										</div>
										<div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
											<i class="zmdi zmdi-file txt-light data-right-rep-icon"></i>
										</div>
									</div>	
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
				<div class="panel panel-default card-view pa-0">
					<div class="panel-wrapper collapse in">
						<div class="panel-body pa-0">
							<div class="sm-data-box bg-blue">
								<div class="container-fluid">
									<div class="row">
										<div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
											<span class="txt-light block counter"><span class="counter-anim">46.43</span>%</span>
											<span class="weight-500 uppercase-font txt-light block">growth rate</span>
										</div>
										<div class="col-xs-6 text-center  pl-0 pr-0 pt-25  data-wrap-right">
											<div id="sparkline_4" style="width: 100px; overflow: hidden; margin: 0px auto;"></div>
										</div>
									</div>	
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /Row -->
		
		<!-- Row -->
		<div class="row">
			<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
				<div class="panel panel-default card-view">
					<div class="panel-heading">
						<div class="pull-left">
							<h6 class="panel-title txt-dark">user statistics</h6>
						</div>
						<div class="pull-right">
							<span class="no-margin-switcher">
								<input type="checkbox" id="morris_switch"  class="js-switch" data-color="#ff2a00" data-secondary-color="#2879ff" data-size="small"/>	
							</span>	
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="panel-wrapper collapse in">
						<div class="panel-body">
							<div id="morris_extra_line_chart" class="morris-chart" style="height:293px;"></div>
							<ul class="flex-stat mt-40">
								<li>
									<span class="block">Weekly Users</span>
									<span class="block txt-dark weight-500 font-18"><span class="counter-anim">3,24,222</span></span>
								</li>
								<li>
									<span class="block">Monthly Users</span>
									<span class="block txt-dark weight-500 font-18"><span class="counter-anim">1,23,432</span></span>
								</li>
								<li>
									<span class="block">Trend</span>
									<span class="block">
										<i class="zmdi zmdi-trending-up txt-success font-24"></i>
									</span>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>

		</div>
		<!-- /Row -->
		

	</div>
	
	<!-- Footer -->
	<footer class="footer container-fluid pl-30 pr-30">
		<div class="row">
			<div class="col-sm-12">
				<p>2022 &copy; Coding Crust</p>
			</div>
		</div>
	</footer>
	<!-- /Footer -->
	
</div>
@endsection