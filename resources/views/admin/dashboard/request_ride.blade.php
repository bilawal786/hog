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

        <div class="row">
          <div class="col-sm-12">
              <div class="panel panel-default card-view">
                  <div class="panel-heading">
                      <div class="pull-left">
                          <h6 class="panel-title txt-dark">Request Ride</h6>
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
                                              <th>Name</th>
                                              <th>E-mail</th>
                                              <th>Phone #</th>
                                              <th>wheelchair</th>
                                              <th>round trip</th>
                                              <th>Date</th>
                                              <th>Thime</th>
                                              <th>Message</th>
                                              <th>Distance</th>
                                              <th>Start Location</th>
                                              <th>End Location</th>
                                              <th>Cost</th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                        @foreach ($rides as $ride)
                                          <tr>
                                            <td>{{$ride->Fname}}</td>
                                            <td>{{$ride->email}}</td>
                                            <td>{{$ride->phone}}</td>
                                            <td>{{$ride->wheelchair}}</td>
                                            <td>{{$ride->round_trip}}</td>
                                            <td>{{$ride->trip_date}}</td>
                                            <td>{{$ride->trip_date}}</td>
                                            <td>{{$ride->message}}</td>
                                            <td>{{$ride->distance}}</td>
                                            <td>{{$ride->start_address}}</td>
                                            <td>{{$ride->end_address}}</td>
                                            <td>{{$ride->cost}}</td>
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
    </div>
</div>

@endsection