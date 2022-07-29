
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Heart of Gold | Login</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="icon" href="{{asset('images/favicon-16x16.ico')}}" type="image/x-icon">
    <!-- vector map CSS -->
    <link href="{{asset('vendors/bower_components/jasny-bootstrap/dist/css/jasny-bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
    <!-- Custom CSS -->
    <link href="{{asset('dist/css/style.css')}}" rel="stylesheet" type="text/css">
    <style>
        .page-wrapper.auth-page {
            background: #000000;
        }
        .fam{
            margin-left: -12px;
            margin-right: 8px;
        }
    </style>
</head>
<body>
<!--Preloader-->
<div class="preloader-it">
    <div class="la-anim-1"></div>
</div>
<!--/Preloader-->

<div class="wrapper pa-0">
    <header class="sp-header">
        <div class="sp-logo-wrap pull-left">
            <a href="">
                <img class="brand-img mr-10" src="{{asset('images/heart-of-gold.png')}}" alt="brand"/>
            </a>
        </div>
        <div class="form-group mb-0 pull-right">

        </div>
        <div class="clearfix"></div>
    </header>

    <!-- Main Content -->
    <div class="page-wrapper pa-0 ma-0 auth-page">
        <div class="container-fluid">
            <!-- Row -->
            <div class="table-struct full-width full-height">
                <div class="table-cell vertical-align-middle auth-form-wrap">
                    <div class="auth-form  ml-auto mr-auto no-float">
                        <div class="row">
                            <div class="col-sm-12 col-xs-12">
                                <div class="mb-30">
                                    <h3 class="text-center txt-dark mb-10">Sign in to Heart of Gold</h3>

                                </div>
                                <div class="form-wrap">
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                                            <label class="control-label mb-10" for="exampleInputEmail_2">Email:</label>
                                            <input type="email" placeholder="Enter email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                            @error('email')
                                            <span class="help-block"> {{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                                            <label class="pull-left control-label mb-10" for="exampleInputpwd_2">Password:</label>
                                            <div class="clearfix"></div>
                                            <input type="password" placeholder="Enter Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                            @error('password')
                                            <span class="help-block"> {{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <div class="checkbox checkbox-primary pr-10 pull-left">
                                                <input id="checkbox_2" type="checkbox">
                                                <label for="checkbox_2"> Keep me logged in</label>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="form-group text-center">
                                            <button type="submit" class="btn btn-info btn-rounded">
                                                sign in
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Row -->
        </div>

    </div>
    <!-- /Main Content -->

</div>
<!-- /#wrapper -->

<!-- JavaScript -->

<!-- jQuery -->
<script src="{{asset('vendors/bower_components/jquery/dist/jquery.min.js')}}"></script>

<!-- Bootstrap Core JavaScript -->
<script src="{{asset('vendors/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<script src="{{asset('vendors/bower_components/jasny-bootstrap/dist/js/jasny-bootstrap.min.js')}}"></script>

<!-- Slimscroll JavaScript -->
<script src="{{asset('dist/js/jquery.slimscroll.js')}}"></script>

<!-- Init JavaScript -->
<script src="{{asset('dist/js/init.js')}}"></script>
</body>
</html>
