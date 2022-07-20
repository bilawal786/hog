@extends('admin.layouts.app')
@section('content')
<div class="page-wrapper" style="min-height: 385px;">
    <div class="container-fluid">
        <!-- Title -->
        <div class="row heading-bg">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
              <h5 class="txt-dark">Drivers</h5>
            </div>
            <!-- Breadcrumb -->
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
              <ol class="breadcrumb">
                <li><a href="{{route('dashboard')}}">Dashboard</a></li>
                <li><a href="#"><span>Drivers</span></a></li>
              </ol>
            </div>
            <!-- /Breadcrumb -->
        </div>
      <user-drivers></user-drivers>

        <!-- Footer -->
        <footer class="footer container-fluid pl-30 pr-30">
            <div class="row">
                <div class="col-sm-12">
                    <p>2022 &copy; HOG</p>
                </div>
            </div>
        </footer>
        <!-- /Footer -->

    </div>
</div>

@endsection
@push('script')
    <script src="{{ mix('js/admin/admin_drivers.js') }}" type="text/javascript"></script>
@endpush
