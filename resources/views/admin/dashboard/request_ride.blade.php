@extends('admin.layouts.app')
@section('content')
<div class="page-wrapper" style="min-height: 385px;">
    <div class="container-fluid">
        <!-- Title -->
        <div class="row heading-bg">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
              <h5 class="txt-dark">Request Ride</h5>
            </div>
            <!-- Breadcrumb -->
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
              <ol class="breadcrumb">
                <li><a href="{{route('dashboard')}}">Dashboard</a></li>
                <li><a href="#"><span>Request Ride</span></a></li>

              </ol>
            </div>
            <!-- /Breadcrumb -->
        </div>
        <request-ride></request-ride>
    </div>
</div>

@endsection
@push('style')
<link href="{{ asset('vendors/bower_components/select2/dist/css/select2.min.css') }}" rel="stylesheet" type="text/css"/>
@endpush
@push('script')
    
    <!-- jQuery -->
		<script src="{{ asset('vendors/bower_components/jquery/dist/jquery.min.js')}}"></script>
		<!-- Select2 JavaScript -->
		<script src="{{ asset('vendors/bower_components/select2/dist/js/select2.full.min.js')}}"></script>
		<!-- Form Advance Init JavaScript -->
		<script src="{{ asset('dist/js/form-advance-data.js')}}"></script>
        
        <script src="{{ mix('js/admin/admin_requestRide.js') }}" type="text/javascript"></script>
@endpush