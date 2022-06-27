<!-- Left Sidebar Menu -->
<div class="fixed-sidebar-left">
    <ul class="nav navbar-nav side-nav nicescroll-bar">
        <li>
            <a class="{{ Request::url() == url('/admin/dashboard') ? 'active' : '' }}" href="{{ route('dashboard')}}">
                <div class="pull-left">
                    <i class="zmdi zmdi-landscape mr-20"></i>
                    <span class="right-nav-text">Dashboard</span>
                </div>

                <div class="clearfix"></div></a>
        </li>

        @if (Auth::user()->role == 'admin')
        <li>
            <a class="{{ Request::url() == url('/admin/users/clents') || Request::url() == url('/admin/user/drivers') ? 'active' : '' }}" data-toggle="collapse" data-target="#dashboard_dr">
                <div class="pull-left">
                    <i class="zmdi zmdi-account mr-20"></i>
                    <span class="right-nav-text">Users</span>
                </div>
            <div class="pull-right">
                <i class="zmdi zmdi-caret-down"></i>
            </div>
            <div class="clearfix"></div>
        </a>
            <ul id="dashboard_dr" class="collapse collapse-level-1">
                <li>
                    <a  class="{{ Request::url() == url('/admin/users/clents') ? 'active-page' : '' }}"  href="{{ route('clients')}}">Clients</a>
                </li>
                <li>
                    <a class="{{ request()->is('/admin/user/driver/*') ? 'active-page' : '' }}"  href="{{ url('/admin/user/driver/list')}}">Drivers</a>
                </li>
            </ul>
        </li>
        @endif
        @if (Auth::user()->role == 'admin')
        <li>
            <a class="{{ Request::url() == url('/admin/form/submit/feedback') || Request::url() == url('/admin/form/billing/question') || Request::url() == url('/admin/form/request/ride') || Request::url() == url('/admin/form/other') ? 'active' : '' }}" data-toggle="collapse" data-target="#forms"><div class="pull-left">
                <i class="zmdi zmdi-file-text mr-20"></i>
                <span class="right-nav-text">Leads</span>
            </div>
            <div class="pull-right">
                <i class="zmdi zmdi-caret-down"></i>
            </div>
            <div class="clearfix"></div>
        </a>
            <ul id="forms" class="collapse collapse-level-1">
                <li>
                    <a class="{{ Request::url() == url('/admin/form/submit/feedback*') ? 'active-page' : '' }}" href="{{ url('/admin/form/submit/feedback/list')}}">Submit FeedBack</a>
                </li>
                <li>
                    <a class="{{ Request::url() == url('/admin/form/billing/question*') ? 'active-page' : '' }}"  href="{{ url('/admin/form/billing/question/list')}}">Billing Question</a>
                </li>
                <li>
                    <a class="{{ Request::url() == url('/admin/form/request/ride*') ? 'active-page' : '' }}" href="{{ url('/admin/form/request/ride/list')}}">Request Ride</a>
                </li>
                <li>
                    <a class="{{ Request::url() == url('/admin/form/other*') ? 'active-page' : '' }}" href="{{ url('/admin/form/other/list')}}">Others</a>
                </li>
            </ul>
        </li>
        @endif
        @if (Auth::user()->role == 'admin')
            <li>
                <a class="{{ Request::url() == url('/admin/general/setting') ? 'active' : '' }}" href="{{ route('generalsetting')}}"  >
                    <div class="pull-left">
                        <i class="zmdi zmdi-settings mr-20"></i>
                        <span class="right-nav-text">General Settings</span>
                    </div>
                    <div class="clearfix"></div>
                </a>
            </li>
        @endif

    </ul>
</div>
<!-- /Left Sidebar Menu -->
