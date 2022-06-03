@extends('admin.layouts.app')
@section('content')
<div class="page-wrapper" style="min-height: 385px;">
    <div class="container-fluid">
        <!-- Title -->
        <div class="row heading-bg">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
              <h5 class="txt-dark">Billing Question</h5>
            </div>
            <!-- Breadcrumb -->
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
              <ol class="breadcrumb">
                <li><a href="{{route('dashboard')}}">Dashboard</a></li>
                <li><a href="#"><span>Billing Question</span></a></li>

              </ol>
            </div>
            <!-- /Breadcrumb -->
        </div>

       <billing-request></billing-request>
    </div>
</div>

@endsection
@push('script')
    <script src="{{ mix('js/admin/admin_billingRequest.js') }}" type="text/javascript"></script>
@endpush