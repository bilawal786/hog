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
	
    <link href="{{ mix('css/app.css') }}" type="text/css" rel="stylesheet"/>

	<!-- Morris Charts CSS -->
    <link href="{{ asset('vendors/bower_components/morris.js/morris.css')}}" rel="stylesheet" type="text/css"/>
	
	<!-- Data table CSS -->
	<link href="{{ asset('vendors/bower_components/datatables/media/css/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css"/>
	
	<link href="{{ asset('vendors/bower_components/jquery-toast-plugin/dist/jquery.toast.min.css')}}" rel="stylesheet" type="text/css">
		
	<!-- Custom CSS -->
	<link href="{{ asset('dist/css/style.css')}}" rel="stylesheet" type="text/css">
</head>
<body>

	@include('admin.dashboard.includes.header')
    @yield('dashboard')
	@include('admin.dashboard.includes.footer')

<script src="{{ mix('js/app.js') }}" type="text/javascript"></script>
	<!-- JavaScript -->
	
    <!-- jQuery -->
    <script src="{{ asset('vendors/bower_components/jquery/dist/jquery.min.js')}}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('vendors/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    
	<!-- Data table JavaScript -->
	<script src="{{ asset('vendors/bower_components/datatables/media/js/jquery.dataTables.min.js')}}"></script>
	
	<!-- Slimscroll JavaScript -->
	<script src="{{ asset('dist/js/jquery.slimscroll.js')}}"></script>
	
	<!-- simpleWeather JavaScript -->
	<script src="{{ asset('vendors/bower_components/moment/min/moment.min.js')}}"></script>
	<script src="{{ asset('vendors/bower_components/simpleWeather/jquery.simpleWeather.min.js')}}"></script>
	<script src="{{ asset('dist/js/simpleweather-data.js')}}"></script>
	
	<!-- Progressbar Animation JavaScript -->
	<script src="{{ asset('vendors/bower_components/waypoints/lib/jquery.waypoints.min.js')}}"></script>
	<script src="{{ asset('vendors/bower_components/jquery.counterup/jquery.counterup.min.js')}}"></script>
	
	<!-- Fancy Dropdown JS -->
	<script src="{{ asset('dist/js/dropdown-bootstrap-extended.js')}}"></script>
	
	<!-- Sparkline JavaScript -->
	<script src="{{ asset('vendors/jquery.sparkline/dist/jquery.sparkline.min.js')}}"></script>
	
	<!-- Owl JavaScript -->
	<script src="{{ asset('vendors/bower_components/owl.carousel/dist/owl.carousel.min.js')}}"></script>
	
	<!-- ChartJS JavaScript -->
	<script src="{{ asset('vendors/chart.js/Chart.min.js')}}"></script>
	
	<!-- Morris Charts JavaScript -->
    <script src="{{ asset('vendors/bower_components/raphael/raphael.min.js')}}"></script>
    <script src="{{ asset('vendors/bower_components/morris.js/morris.min.js')}}"></script>
    <script src="{{ asset('vendors/bower_components/jquery-toast-plugin/dist/jquery.toast.min.js')}}"></script>
	
	<!-- Switchery JavaScript -->
	<script src="{{ asset('vendors/bower_components/switchery/dist/switchery.min.js')}}"></script>
	
	<!-- Init JavaScript -->
	<script src="{{ asset('dist/js/init.js')}}"></script>
	<script src="{{ asset('dist/js/dashboard-data.js')}}"></script>
</body>

</html>
