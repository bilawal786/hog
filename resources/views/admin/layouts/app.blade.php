<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<title>HOG | Dashboard</title>
	<meta name="author" content="Heart of Gold"/>
	<!-- Favicon -->
    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="icon" href="{{asset('images/favicon-16x16.ico')}}" type="image/x-icon">
    <style>

        .c-err{
            margin: 0;
            padding: 0;
            font-size: 0.7rem;
        }
        .c-err-li{
            list-style-type: none;
            color: #df3444;
        }
        .border{
            border: 1px solid #df3444;
        }
    </style>
	@include('admin.includes.header_asset')
</head>
<body>
	<!-- Preloader -->
	<div class="preloader-it">
		<div class="la-anim-1"></div>
	</div>
	<!-- /Preloader -->
    <div class="wrapper theme-4-active pimary-color-red" id="admin">
		@include('admin.includes.navigation')
		@include('admin.includes.left_side_bar')
        @yield('content')
    </div>
    <!-- /#wrapper -->
@include('admin.includes.footer_asset')

</body>
</html>
