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
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default card-view">
                    <div class="panel-heading">
                        <div class="pull-left">
                            <h6 class="panel-title txt-dark">Drivers List</h6>
                        </div>
                        <div class="pull-right">
                            <button class="btn  btn-primary" alt="default" data-toggle="modal" data-target=".bs-example-modal-lg">New Driver</button>
                            <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            <h5 class="modal-title" id="myLargeModalLabel">New Drivers</h5>
                                        </div>
                                        <form method="POST" action="{{ route('add.drivers')}}">
                                            @csrf
                                        <div class="modal-body">
                                            
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="recipient-name" class="control-label mb-10">Name:</label>
                                                            <input type="text" class="form-control" name="driverName">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="recipient-name" class="control-label mb-10">E-mail:</label>
                                                            <input type="email" class="form-control" name="driverEmail">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="recipient-name" class="control-label mb-10">Phone:</label>
                                                            <input type="text" class="form-control" name="driverPhone">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="recipient-name" class="control-label mb-10">Address:</label>
                                                            <textarea class="form-control" name="driverAddress"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="message-text" class="control-label mb-10">Password:</label>
                                                            <input type="password" class="form-control" name="driverPassword">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="message-text" class="control-label mb-10">Retype Password:</label>
                                                            <input type="password" class="form-control" name="driverPassword_confirm">
                                                        </div>
                                                    </div>
                                                </div>
                                            
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-success">Save</button>
                                        </div>
                                    </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                            <div class="table-wrap">
                                <div class="table-responsive">
                                    <table id="datable_1" class="table table-hover display  pb-30" >
                                        <thead>
                                            <tr>
                                                <th>Driver Name</th>
                                                <th>E-mail</th>
                                                <th>Phone #</th>
                                                <th>Address</th>
                                                <th>Created at</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                       
                                        <tbody>
                                          @foreach ($drivers as $driver)
                                            <tr>
                                              <td>{{$driver->name}}</td>
                                              <td>{{$driver->email}}</td>
                                              <td>{{$driver->phone}}</td>
                                              <td>{{$driver->address}}</td>
                                              <td>{{date('d-m-Y', strtotime($driver->created_at))}}</td>
                                              <td>
                                                <button class="btn btn-default btn-icon-anim btn-circle btn-sm"><i class="fa fa-pencil"></i></button>
                                                <button class="btn btn-success btn-icon-anim btn-circle btn-sm"><i class="fa fa-eye"></i></button>
												<button class="btn btn-primary btn-icon-anim btn-circle btn-sm"><i class="fa fa-lock"></i></button>
												<button class="btn btn-info btn-icon-anim btn-circle btn-sm"><i class="icon-trash"></i></button>
                                              </td>
                                          </tr>
                                          @endforeach
                                            
                                        </tbody>
                                    </table>
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