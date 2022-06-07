<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<title>Admin Dashboard</title>
	<meta name="author" content="Heart of Gold"/>
	<!-- Favicon -->
	@include('admin.includes.header_asset')
</head>
<body>
	<!-- Preloader -->
	{{-- <div class="preloader-it">
		<div class="la-anim-1"></div>
	</div> --}}
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
