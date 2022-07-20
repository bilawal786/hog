@extends('admin.layouts.app')
@section('content')

<div class="page-wrapper">
    <div class="container-fluid">
        <!-- Title -->
        <div class="row heading-bg">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
              <h5 class="txt-dark">Profile</h5>
            </div>
            <!-- Breadcrumb -->
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
              <ol class="breadcrumb">
                <li><a href="{{route('dashboard')}}">Dashboard</a></li>
                <li><a href="#"><span>Profile</span></a></li>
              </ol>
            </div>
            <!-- /Breadcrumb -->
        </div>
        <!-- Row -->
        @if(count($errors) > 0 )

            <ul class="p-0 m-0" style="list-style: none;">
                @foreach($errors->all() as $error)
                <li><p class="alert alert-info">{{$error}}</p></li>
                @endforeach
            </ul>
        @endif
        @if(Session::has('message'))
        <p class="alert alert-info">{{ Session::get('message') }}</p>
        @endif
        <div class="row">
            <div class="col-lg-9 col-xs-12">
                <div class="panel panel-default card-view">

                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="">
                                        <div class="panel-wrapper collapse in">
                                            <div class="panel-body pa-0">
                                                <div class="col-sm-12 col-xs-12">
                                                   <admin-profile></admin-profile>
                                                </div>
                                            </div>
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
    </div>
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
<!-- /Main Content -->
@endsection
@push('script')
    <script src="{{ mix('js/admin/admin_profile.js') }}" type="text/javascript"></script>
@endpush
