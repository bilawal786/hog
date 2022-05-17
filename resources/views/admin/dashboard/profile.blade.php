@extends('admin.layouts.app')
@section('content')

<div class="page-wrapper">
    <div class="container-fluid pt-25">
            
        <!-- Row -->
        <div class="row">
            <div class="col-lg-3 col-xs-12">
                <div class="panel panel-default card-view  pa-0">
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body  pa-0">
                            <div class="profile-box">
                                <div class="profile-cover-pic">
                                    <div class="fileupload btn btn-default">
                                        <span class="btn-text">edit</span>
                                        <input class="upload" type="file">
                                    </div>
                                    <div class="profile-image-overlay"></div>
                                </div>
                                <div class="profile-info text-center">
                                    <div class="profile-img-wrap">
                                        <img class="inline-block mb-10" src="dist/img/mock1.jpg" alt="user"/>
                                        <div class="fileupload btn btn-default">
                                            <span class="btn-text">edit</span>
                                            <input class="upload" type="file">
                                        </div>
                                    </div>	
                                    <h5 class="block mt-10 mb-5 weight-500 capitalize-font txt-danger">{{auth()->user()->name}}</h5>
                                    <h6 class="block capitalize-font pb-20">{{auth()->user()->role}}</h6>
                                </div>	
                                <div class="social-info">
                                    <div class="row">
                                        <div class="col-xs-4 text-center">
                                            <span class="counts block head-font"><span class="counter-anim">345</span></span>
                                            <span class="counts-text block">post</span>
                                        </div>
                                        <div class="col-xs-4 text-center">
                                            <span class="counts block head-font"><span class="counter-anim">246</span></span>
                                            <span class="counts-text block">followers</span>
                                        </div>
                                        <div class="col-xs-4 text-center">
                                            <span class="counts block head-font"><span class="counter-anim">898</span></span>
                                            <span class="counts-text block">tweets</span>
                                        </div>
                                    </div>
                                    <button class="btn btn-default btn-block btn-outline btn-anim mt-30" data-toggle="modal" data-target="#myModal"><i class="fa fa-pencil"></i><span class="btn-text">edit profile</span></button>
                                    <div id="myModal" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    <h5 class="modal-title" id="myModalLabel">Edit Profile</h5>
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
                                                                                            <label class="control-label mb-10" for="exampleInputuname_1">Name</label>
                                                                                            <div class="input-group">
                                                                                                <div class="input-group-addon"><i class="icon-user"></i></div>
                                                                                                <input type="text" class="form-control" id="exampleInputuname_1" placeholder="willard bryant">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label class="control-label mb-10" for="exampleInputEmail_1">Email address</label>
                                                                                            <div class="input-group">
                                                                                                <div class="input-group-addon"><i class="icon-envelope-open"></i></div>
                                                                                                <input type="email" class="form-control" id="exampleInputEmail_1" placeholder="xyz@gmail.com">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label class="control-label mb-10" for="exampleInputContact_1">Contact number</label>
                                                                                            <div class="input-group">
                                                                                                <div class="input-group-addon"><i class="icon-phone"></i></div>
                                                                                                <input type="email" class="form-control" id="exampleInputContact_1" placeholder="+102 9388333">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label class="control-label mb-10" for="exampleInputpwd_1">Password</label>
                                                                                            <div class="input-group">
                                                                                                <div class="input-group-addon"><i class="icon-lock"></i></div>
                                                                                                <input type="password" class="form-control" id="exampleInputpwd_1" placeholder="Enter pwd" value="password">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label class="control-label mb-10">Gender</label>
                                                                                            <div>
                                                                                                <div class="radio">
                                                                                                    <input type="radio" name="radio1" id="radio_1" value="option1" checked="">
                                                                                                    <label for="radio_1">
                                                                                                    M
                                                                                                    </label>
                                                                                                </div>
                                                                                                <div class="radio">
                                                                                                    <input type="radio" name="radio1" id="radio_2" value="option2">
                                                                                                    <label for="radio_2">
                                                                                                    F
                                                                                                    </label>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label class="control-label mb-10">Country</label>
                                                                                            <select class="form-control" data-placeholder="Choose a Category" tabindex="1">
                                                                                                <option value="Category 1">USA</option>
                                                                                                <option value="Category 2">Austrailia</option>
                                                                                                <option value="Category 3">India</option>
                                                                                                <option value="Category 4">UK</option>
                                                                                            </select>
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
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-xs-12">
                <div class="panel panel-default card-view pa-0">
                    <div class="panel-wrapper collapse in">
                        <div  class="panel-body pb-0">
                            <div  class="tab-struct custom-tab-1">
                                <ul role="tablist" class="nav nav-tabs nav-tabs-responsive" id="myTabs_8">
                                    <li class="active" role="presentation"><a  data-toggle="tab" id="profile_tab_8" role="tab" href="#profile_8" aria-expanded="false"><span>profile</span></a></li>
                                    <li role="presentation" class=""><a  data-toggle="tab" id="settings_tab_8" role="tab" href="#settings_8" aria-expanded="false"><span>settings</span></a></li>
                                </ul>
                                <div class="tab-content" id="myTabContent_8">
                                    <div  id="profile_8" class="tab-pane fade active in" role="tabpanel">
                                        <div class="col-md-12">
                                            <div class="pt-20">
                                                <div class="streamline user-activity">
                                                    <div class="sl-item">
                                                        <a href="javascript:void(0)">
                                                            <div class="sl-avatar avatar avatar-sm avatar-circle">
                                                                <img class="img-responsive img-circle" src="dist/img/user.png" alt="avatar"/>
                                                            </div>
                                                            <div class="sl-content">
                                                                <p class="inline-block"><span class="capitalize-font txt-success mr-5 weight-500">Clay Masse</span><span>invited to join the meeting in the conference room at 9.45 am</span></p>
                                                                <span class="block txt-grey font-12 capitalize-font">3 Min</span>
                                                            </div>
                                                        </a>
                                                    </div>

                                                    <div class="sl-item">
                                                        <a href="javascript:void(0)">
                                                            <div class="sl-avatar avatar avatar-sm avatar-circle">
                                                                <img class="img-responsive img-circle" src="dist/img/user1.png" alt="avatar"/>
                                                            </div>
                                                            <div class="sl-content">
                                                                <p class="inline-block"><span class="capitalize-font txt-success mr-5 weight-500">Evie Ono</span><span>added three new photos in the library</span></p>
                                                                <div class="activity-thumbnail">
                                                                    <img src="dist/img/thumb-1.jpg" alt="thumbnail"/>
                                                                    <img src="dist/img/thumb-2.jpg" alt="thumbnail"/>
                                                                    <img src="dist/img/thumb-3.jpg" alt="thumbnail"/>
                                                                </div>
                                                                <span class="block txt-grey font-12 capitalize-font">8 Min</span>
                                                            </div>
                                                        </a>	
                                                    </div>

                                                    <div class="sl-item">
                                                        <a href="javascript:void(0)">
                                                            <div class="sl-avatar avatar avatar-sm avatar-circle">
                                                                <img class="img-responsive img-circle" src="dist/img/user2.png" alt="avatar"/>
                                                            </div>
                                                            <div class="sl-content">
                                                                <p class="inline-block"><span class="capitalize-font txt-success mr-5 weight-500">madalyn rascon</span><span>assigned a new task</span></p>
                                                                <span class="block txt-grey font-12 capitalize-font">28 Min</span>
                                                            </div>
                                                        </a>	
                                                    </div>

                                                    <div class="sl-item">
                                                        <a href="javascript:void(0)">
                                                            <div class="sl-avatar avatar avatar-sm avatar-circle">
                                                                <img class="img-responsive img-circle" src="dist/img/user3.png" alt="avatar"/>
                                                            </div>
                                                            <div class="sl-content">
                                                                <p class="inline-block"><span class="capitalize-font txt-success mr-5 weight-500">Ezequiel Merideth</span><span>completed project wireframes</span></p>
                                                                <span class="block txt-grey font-12 capitalize-font">yesterday</span>
                                                            </div>
                                                        </a>	
                                                    </div>
                                                    
                                                    <div class="sl-item">
                                                        <a href="javascript:void(0)">
                                                            <div class="sl-avatar avatar avatar-sm avatar-circle">
                                                                <img class="img-responsive img-circle" src="dist/img/user4.png" alt="avatar"/>
                                                            </div>
                                                            <div class="sl-content">
                                                                <p class="inline-block"><span class="capitalize-font txt-success mr-5 weight-500">jonnie metoyer</span><span>created a group 'Hencework' in the discussion forum</span></p>
                                                                <span class="block txt-grey font-12 capitalize-font">18 feb</span>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div  id="settings_8" class="tab-pane fade" role="tabpanel">
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
                                                                                <label class="control-label mb-10" for="exampleInputuname_01">Name</label>
                                                                                <div class="input-group">
                                                                                    <div class="input-group-addon"><i class="icon-user"></i></div>
                                                                                    <input type="text" class="form-control" id="exampleInputuname_01" placeholder="willard bryant">
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="control-label mb-10" for="exampleInputEmail_01">Email address</label>
                                                                                <div class="input-group">
                                                                                    <div class="input-group-addon"><i class="icon-envelope-open"></i></div>
                                                                                    <input type="email" class="form-control" id="exampleInputEmail_01" placeholder="xyz@gmail.com">
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="control-label mb-10" for="exampleInputContact_01">Contact number</label>
                                                                                <div class="input-group">
                                                                                    <div class="input-group-addon"><i class="icon-phone"></i></div>
                                                                                    <input type="email" class="form-control" id="exampleInputContact_01" placeholder="+102 9388333">
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="control-label mb-10" for="exampleInputpwd_01">Password</label>
                                                                                <div class="input-group">
                                                                                    <div class="input-group-addon"><i class="icon-lock"></i></div>
                                                                                    <input type="password" class="form-control" id="exampleInputpwd_01" placeholder="Enter pwd" value="password">
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
