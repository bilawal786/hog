@extends('admin.layouts.app')
@section('content')

<div class="page-wrapper">
	@if (Auth::user()->role == 'admin')
		<admin-dashboard></admin-dashboard>
	@endif
	@if (Auth::user()->role == 'driver')
		<driver-dashboard></driver-dashboard>
	@endif
		

	
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
@push('script')
	<script src="{{ mix('js/admin/driver_dashboard.js') }}" type="text/javascript"></script>
@endpush