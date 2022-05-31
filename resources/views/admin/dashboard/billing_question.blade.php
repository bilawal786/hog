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

        <div class="row">
          <div class="col-sm-12">
              <div class="panel panel-default card-view">
                  <div class="panel-heading">
                      <div class="pull-left">
                          <h6 class="panel-title txt-dark">Billing Question</h6>
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
                                              <th>Account</th>
                                              <th>Invoice</th>
                                              <th>Message</th>
                                          </tr>
                                      </thead>
                                     
                                      <tbody>
                                        @foreach ($questions as $question)
                                          <tr>
                                            <td>{{$question->Fname}}</td>
                                            <td>{{$question->email}}</td>
                                            <td>{{$question->phone}}</td>
                                            <td>{{$question->account}}</td>
                                            <td>{{$question->invoice}}</td>
                                            <td>{{$question->message}}</td>
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