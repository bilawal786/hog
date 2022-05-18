@extends('admin.layouts.app')
@section('content')

<div class="page-wrapper">
    <div class="container-fluid pt-25">
        <!-- Title -->
        <div class="row heading-bg">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
              <h5 class="txt-dark">Profile</h5>
            </div>
            <!-- Breadcrumb -->
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
              <ol class="breadcrumb">
                <li><a href="index.html">Dashboard</a></li>
                <li><a href="#"><span>Profile</span></a></li>
              </ol>
            </div>
            <!-- /Breadcrumb -->
        </div>
        <!-- Row -->
        <div class="row">
            <div class="col-lg-9 col-xs-12">
                <div class="panel panel-default card-view">
    
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-wrap">
                                        <form action="" method="POST" enctype="multipart/form-data" class="form-horizontal">
                                            @csrf
                                            <div class="form-body">
                                                <h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-account mr-10"></i>Profile Update</h6>
                                                <hr class="light-grey-hr"/>
                                                
                                             
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Full Name</label>
                                                            <div class="col-md-9">
                                                                <input type="text" class="form-control" placeholder="Phone No." name="phone" value="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">E-mail</label>
                                                            <div class="col-md-9">
                                                                <input type="text" class="form-control" placeholder="Phone No." name="phone" value="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                              
                                                <!-- /Row -->
                                            </div>
                                            <div class="form-actions mt-10">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="row">
                                                            <div class="col-md-offset-3 col-md-9">
                                                                <button type="submit" class="btn btn-success  mr-10">Update</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">

                                                    </div>
                                                </div>
                                            </div>
                                        </form>
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
                <p>2017 &copy; Hound. Pampered by Hencework</p>
            </div>
        </div>
    </footer>
    <!-- /Footer -->
    
</div>
<!-- /Main Content -->
@endsection
