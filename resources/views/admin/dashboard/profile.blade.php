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
                                                    <div class="form-wrap">
                                                        <form method="POST" action="{{route('updateProfile')}}">
                                                            @csrf
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
                                                                <a href="" class="btn btn-primary mr-10 mb-30" data-toggle="modal" data-target="#myModal">Change Password</a>
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
                                                <form method="POST" action="{{route('adminChangePassword')}}">
                                                    @csrf
                                                    <div class="form-body overflow-hide">
                                                       <div class="form-group">
                                                            <label class="control-label mb-10" >Old Password</label>
                                                            <div class="input-group">
                                                                <div class="input-group-addon"><i class="icon-lock"></i></div>
                                                                <input type="password" class="form-control" name="oldPassword" placeholder="Old Password">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label mb-10" >New Password</label>
                                                            <div class="input-group">
                                                                <div class="input-group-addon"><i class="icon-lock"></i></div>
                                                                <input type="password" class="form-control" name="newPassword" placeholder="New Password">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label mb-10" >Conform Password</label>
                                                            <div class="input-group">
                                                                <div class="input-group-addon"><i class="icon-lock"></i></div>
                                                                <input type="password" class="form-control" name="conformPassword" placeholder="Conform Password">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-actions mt-10">			
                                                        <button type="submit" class="btn btn-success mr-10 mb-30">Change Password</button>
                                                        <button type="button" class="btn btn-default mr-10 mb-30" data-dismiss="modal">Cancel</button>
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
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
</div>
    
</div>
<!-- /Main Content -->
@endsection
