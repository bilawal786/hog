<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<title>Hound I Fast build Admin dashboard for any platform</title>
	<meta name="description" content="Hound is a Dashboard & Admin Site Responsive Template by hencework." />
	<meta name="keywords" content="admin, admin dashboard, admin template, cms, crm, Hound Admin, Houndadmin, premium admin templates, responsive admin, sass, panel, software, ui, visualization, web app, application" />
	<meta name="author" content="hencework"/>
	
	<!-- Favicon -->
	<link rel="shortcut icon" href="favicon.ico">
	<link rel="icon" href="favicon.ico" type="image/x-icon">
	
	<!-- Morris Charts CSS -->
    <link href="{{ asset('/vendors/bower_components/morris.js/morris.css')}}" rel="stylesheet" type="text/css"/>
	
	<!-- Data table CSS -->
	<link href="{{ asset('/vendors/bower_components/datatables/media/css/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css"/>
	
	<link href="{{ asset('/vendors/bower_components/jquery-toast-plugin/dist/jquery.toast.min.css')}}" rel="stylesheet" type="text/css">

	<!-- Bootstrap Dropify CSS -->
	<link href="{{ asset('/vendors/bower_components/dropify/dist/css/dropify.min.css')}}" rel="stylesheet" type="text/css"/>

	<link href="{{ asset('vendors/bower_components/datatables/media/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css')}}"/>
		
	<!-- Custom CSS -->
	<link href="{{ asset('/dist/css/style.css')}}" rel="stylesheet" type="text/css">


</head>

<body>
	<!-- Preloader -->
	<div class="preloader-it">
		<div class="la-anim-1"></div>
	</div>
	<!-- /Preloader -->
    <div class="wrapper theme-4-active pimary-color-red">
		<!-- Top Menu Items -->
		<nav class="navbar navbar-inverse navbar-fixed-top">
			<div class="mobile-only-brand pull-left">
				<div class="nav-header pull-left">
					<div class="logo-wrap">
						<a href="index.html">
							<img class="brand-img" src="{{ asset('images/logo.png') }}" alt="brand"/>
							<span class="brand-text">HOG</span>
						</a>
					</div>
				</div>	
				<a id="toggle_nav_btn" class="toggle-left-nav-btn inline-block ml-20 pull-left" href="javascript:void(0);"><i class="zmdi zmdi-menu"></i></a>
				<a id="toggle_mobile_search" data-toggle="collapse" data-target="#search_form" class="mobile-only-view" href="javascript:void(0);"><i class="zmdi zmdi-search"></i></a>
				<a id="toggle_mobile_nav" class="mobile-only-view" href="javascript:void(0);"><i class="zmdi zmdi-more"></i></a>
				
			</div>
			<div id="mobile_only_nav" class="mobile-only-nav pull-right">
				<ul class="nav navbar-right top-nav pull-right">
			
			
			
					<li class="dropdown auth-drp">
						<a href="#" class="dropdown-toggle pr-0" data-toggle="dropdown"><img src="{{ asset('dist/img/user1.png')}}" alt="user_auth" class="user-auth-img img-circle"/><span class="user-online-status"></span></a>
						<ul class="dropdown-menu user-auth-dropdown" data-dropdown-in="flipInX" data-dropdown-out="flipOutX">
							<li>
								<a href="{{ url('admin/profile')}}"><i class="zmdi zmdi-account"></i><span>Profile</span></a>
							</li>
							<li class="divider"></li>
							<li>
								<a href="{{route('admin.logout')}}"><i class="zmdi zmdi-power"></i><span>Log Out</span></a>
							</li>
						</ul>
					</li>
				</ul>
			</div>	
		</nav>
		<!-- /Top Menu Items -->
		
		<!-- Left Sidebar Menu -->
		<div class="fixed-sidebar-left">
			<ul class="nav navbar-nav side-nav nicescroll-bar">
				<li class="navigation-header">
					<span>Main</span> 
					<i class="zmdi zmdi-more"></i>
				</li>
				<li>
					<a class="active" href="{{ route('dashboard')}}" data-toggle="collapse" data-target="#dashboard_dr">
						<div class="pull-left">
							<i class="zmdi zmdi-landscape mr-20"></i>
							<span class="right-nav-text">Dashboard</span>
						</div>
						
						<div class="clearfix"></div></a>
				</li>
				<li>
					<a class="" href="{{ route('generalsetting')}}"  >
						<div class="pull-left">
							<i class="zmdi zmdi-settings mr-20"></i>
							<span class="right-nav-text">Gernal Setting</span>
						</div>
						<div class="clearfix"></div>
					</a>
				</li>
				<li>
					<a class="" data-toggle="collapse" data-target="#dashboard_dr"><div class="pull-left">
						<i class="zmdi zmdi-account mr-20"></i>
						<span class="right-nav-text">Users</span>
					</div>
					<div class="pull-right">
						<i class="zmdi zmdi-caret-down"></i>
					</div>
					<div class="clearfix"></div>
				</a>
					<ul id="dashboard_dr" class="collapse collapse-level-1">
						<li>
							<a class="active-page" href="{{ route('clients')}}">Clients</a>
						</li>
						<li>
							<a  href="{{ route('drivers')}}">Drivers</a>
						</li>
					</ul>
				</li>
				<li>
					<a class="" data-toggle="collapse" data-target="#forms"><div class="pull-left">
						<i class="zmdi zmdi-file-text mr-20"></i>
						<span class="right-nav-text">Forms</span>
					</div>
					<div class="pull-right">
						<i class="zmdi zmdi-caret-down"></i>
					</div>
					<div class="clearfix"></div>
				</a>
					<ul id="forms" class="collapse collapse-level-1">
						<li>
							<a class="active-page" href="{{ route('submit.feedback')}}">Submit FeedBack</a>
						</li>
						<li>
							<a  href="{{ route('billing.question')}}">Billing Question</a>
						</li>
						<li>
							<a  href="{{ route('request.ride')}}">Request Ride</a>
						</li>
						<li>
							<a  href="{{ route('other')}}">Others</a>
						</li>
					</ul>
				</li>
				
			</ul>
		</div>
		<!-- /Left Sidebar Menu -->
		
		<!-- Right Sidebar Menu -->
	
		<!-- /Right Sidebar Menu -->
		
        
        @yield('content')
        
 
    </div>
    <!-- /#wrapper -->
	
	<!-- JavaScript -->
	
    <!-- jQuery -->
    <script src="{{ asset('/vendors/bower_components/jquery/dist/jquery.min.js')}}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>

	<!-- Bootstrap Daterangepicker JavaScript -->
	<script src="{{ asset('/vendors/bower_components/dropify/dist/js/dropify.min.js')}}"></script>
    
	<!-- Data table JavaScript -->
	<script src="{{ asset('/vendors/bower_components/datatables/media/js/jquery.dataTables.min.js')}}"></script>

	<script src="{{ asset('vendors/bower_components/bootstrap-validator/dist/validator.min.js')}}"></script>
	
	

	<!-- Form Flie Upload Data JavaScript -->
	<script src="{{ asset('/dist/js/form-file-upload-data.js')}}"></script>
	
	<!-- simpleWeather JavaScript -->
	<script src="{{ asset('/vendors/bower_components/moment/min/moment.min.js')}}"></script>
	<script src="{{ asset('/vendors/bower_components/simpleWeather/jquery.simpleWeather.min.js')}}"></script>
	<script src="{{ asset('/dist/js/simpleweather-data.js')}}"></script>
	
	<!-- Progressbar Animation JavaScript -->
	<script src="{{ asset('/vendors/bower_components/waypoints/lib/jquery.waypoints.min.js')}}"></script>
	<script src="{{ asset('/vendors/bower_components/jquery.counterup/jquery.counterup.min.js')}}"></script>
	
	
	
	<!-- Sparkline JavaScript -->
	<script src="{{ asset('/vendors/jquery.sparkline/dist/jquery.sparkline.min.js')}}"></script>
	
	
	
	<!-- ChartJS JavaScript -->
	<script src="{{ asset('/vendors/chart.js/Chart.min.js')}}"></script>
	
	<!-- Morris Charts JavaScript -->
    <script src="{{ asset('/vendors/bower_components/raphael/raphael.min.js')}}"></script>
    <script src="{{ asset('/vendors/bower_components/morris.js/morris.min.js')}}"></script>
    <script src="{{ asset('/vendors/bower_components/jquery-toast-plugin/dist/jquery.toast.min.js')}}"></script>
	
	
	
	
	<!-- Data table JavaScript -->
	<script src="{{ asset('vendors/bower_components/datatables/media/js/jquery.dataTables.min.js')}}"></script>
	<script src="{{ asset('dist/js/dataTables-data.js')}}"></script>

	<!-- Slimscroll JavaScript -->
	<script src="{{ asset('/dist/js/jquery.slimscroll.js')}}"></script>

	<!-- Owl JavaScript -->
	<script src="{{ asset('/vendors/bower_components/owl.carousel/dist/owl.carousel.min.js')}}"></script>

	<!-- Switchery JavaScript -->
	<script src="{{ asset('/vendors/bower_components/switchery/dist/switchery.min.js')}}"></script>

	<!-- Fancy Dropdown JS -->
	<script src="{{ asset('/dist/js/dropdown-bootstrap-extended.js')}}"></script>

	<!-- Init JavaScript -->
	<script src="{{ asset('/dist/js/init.js')}}"></script>
	<script src="{{ asset('/dist/js/dashboard-data.js')}}"></script>



</body>

</html>
