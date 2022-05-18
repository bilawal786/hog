@extends('admin.layouts.app')
@section('content')

<div class="page-wrapper">
    <div class="container-fluid">
        
        <!-- Title -->
        <div class="row heading-bg">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
              <h5 class="txt-dark">General Setting</h5>
            </div>
            <!-- Breadcrumb -->
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
              <ol class="breadcrumb">
                <li><a href="index.html">Dashboard</a></li>
                <li><a href="#"><span>General-Setting</span></a></li>
              </ol>
            </div>
            <!-- /Breadcrumb -->
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default card-view">
    
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-wrap">
                                        <form action="{{route('updategeneralsetting')}}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                                            @csrf
                                            <div class="form-body">
                                                <h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-account mr-10"></i>Logo Upload</h6>
                                                <hr class="light-grey-hr"/>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Header logo</label>
                                                            <div class="col-md-9">
                                                        
                                                        <div class="clearfix"></div>
                                                        <p class="text-muted" >Your logo size<code>50 x 50</code></p>
                                                        <div class="mt-40">
                                                            <input type="file" id="input-file-now-custom-1" class="dropify" name="header_logo" data-default-file="{{ asset($generaldata->header_logo) }}"/>
                                                        </div>	
                                                        <br>
                                                    </div>
                                                    </div>

                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Footer logo</label>
                                                            <div class="col-md-9">
                                                        
                                                        <div class="clearfix"></div>
                                                        <p class="text-muted" >Your logo size<code>50 x 50</code></p>
                                                        <div class="mt-40">
                                                            <input type="file" id="input-file-now-custom-1" class="dropify" name="footer_logo" data-default-file="{{ asset($generaldata->footer_logo) }}"/>
                                                            
                                                        </div>	
                                                        <br>
                                                    </div>
                                                    </div>

                                                    </div>
                                                </div>
                                                <h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-account mr-10"></i>About's Info</h6>
                                                <hr class="light-grey-hr"/>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3" for="inputEmail">E-mail</label>
                                                            <div class="col-md-9">
                                                                <input type="email" class="form-control" id="inputEmail" placeholder="Email" data-error="Bruh, that email address is invalid" required name="email" value="{{$generaldata->email}}">
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Phone No.</label>
                                                            <div class="col-md-9">
                                                                <input type="text" class="form-control" placeholder="Phone No." name="phone" value="{{$generaldata->phone}}">
                    
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                </div>
                                                <!-- /Row -->
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Footer About</label>
                                                            <div class="col-md-9">
                                                                <textarea class="form-control" rows="5" name="footer_about">{{$generaldata->footer_about}}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                             
                                                <h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-account-box mr-10"></i>Address</h6>
                                                <hr class="light-grey-hr"/>
                                                <!-- /Row -->
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Mailing Address</label>
                                                            <div class="col-md-9">
                                                                <textarea class="form-control" rows="5" name="mailing_address">{{$generaldata->mailing_address}}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Office Address</label>
                                                            <div class="col-md-9">
                                                                <textarea class="form-control" rows="5" name="office_address">{{$generaldata->office_address}}</textarea>
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
</div>
@endsection