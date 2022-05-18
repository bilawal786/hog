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
                                <div class="col-lg-12">
                                    <div class="">
                                        <div class="panel-wrapper collapse in">
                                            <div class="panel-body pa-0">
                                                <div class="col-sm-12 col-xs-12">
                                                    <div class="form-wrap">
                                                        <form method="POST" action="{{route('updateProfile')}}">
                                                            <div class="form-body overflow-hide">
                                                                <div class="form-group">
                                                                    <label class="control-label mb-10" for="exampleInputuname_01">Name:</label>
                                                                    <div class="input-group">
                                                                        <div class="input-group-addon"><i class="icon-user"></i></div>
                                                                        <input type="text" class="form-control" placeholder="Name" name="name" value="{{auth()->user()->name}}">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="control-label mb-10" for="exampleInputEmail_01">Email address:</label>
                                                                    <div class="input-group">
                                                                        <div class="input-group-addon"><i class="icon-envelope-open"></i></div>
                                                                        <input type="email" class="form-control" placeholder="Email" name="email" value="{{auth()->user()->email}}">
                                                                    </div>
                                                                </div>
                                                                {{-- <div class="form-group">
                                                                    <label class="control-label mb-10" for="exampleInputpwd_01">Password</label>
                                                                    <div class="input-group">
                                                                        <div class="input-group-addon"><i class="icon-lock"></i></div>
                                                                        <input type="password" class="form-control" id="exampleInputpwd_01" placeholder="Enter pwd" value="password">
                                                                    </div>
                                                                </div> --}}
                                                            </div>
                                                            <div class="form-actions mt-10">			
                                                                <button type="submit" class="btn btn-success mr-10 mb-30">Update profile</button>
                                                                <button class="btn btn-primary mr-10 mb-30" data-toggle="modal" data-target="#myModal">Change Password</button>
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
                <p>2022 &copy; Hear of Gold</p>
            </div>
        </div>
    </footer>
    <!-- /Footer -->


    {{-- Model --}}
    <div id="myModal" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h5 class="modal-title" id="myModalLabel">Change Password</h5>
                </div>
                <div class="modal-body">
                    <!-- Row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="">
                                <div class="panel-wrapper collapse in">
                                    <div class="panel-body pa-0">
                                        <div class="col-sm-12 col-xs-12">
                                            <div class="form-wrap">
                                                <form action="#">
                                                    <div class="form-body overflow-hide">
                                                       <div class="form-group">
                                                            <label class="control-label mb-10" for="exampleInputpwd_01">Old Password</label>
                                                            <div class="input-group">
                                                                <div class="input-group-addon"><i class="icon-lock"></i></div>
                                                                <input type="password" class="form-control" id="exampleInputpwd_01" placeholder="Old Password">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label mb-10" for="exampleInputpwd_01">New Password</label>
                                                            <div class="input-group">
                                                                <div class="input-group-addon"><i class="icon-lock"></i></div>
                                                                <input type="password" class="form-control" id="exampleInputpwd_01" placeholder="New Password" value="password">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label mb-10" for="exampleInputpwd_01">Conform Password</label>
                                                            <div class="input-group">
                                                                <div class="input-group-addon"><i class="icon-lock"></i></div>
                                                                <input type="password" class="form-control" id="exampleInputpwd_01" placeholder="Conform Password" value="password">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-actions mt-10">			
                                                        <button type="submit" class="btn btn-success mr-10 mb-30">Update profile</button>
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
                <div class="modal-footer">
                    <button type="button" class="btn btn-success waves-effect" data-dismiss="modal">Save</button>
                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Cancel</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
</div>
    
</div>
<!-- /Main Content -->
@endsection
