<!-- Left Sidebar Menu -->
<div class="fixed-sidebar-left">
    <ul class="nav navbar-nav side-nav nicescroll-bar">
        <li>
            <a class="{{ request()->is('dashboard') ? 'active' : '' }}" href="{{ route('dashboard')}}">
                <div class="pull-left">
                    <i class="zmdi zmdi-landscape mr-20"></i>
                    <span class="right-nav-text">Dashboard</span>
                </div>

                <div class="clearfix"></div>
            </a>
        </li>

        @if (Auth::user()->role == 'admin')
            <li>
                <a class="{{ request()->is('client*') || request()->is('driver*') ? 'active' : '' }}"
                   data-toggle="collapse" data-target="#dashboard_dr">
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
                        <a class="{{ request()->is('client*') ? 'active-page' : '' }}"
                           href="{{ url('/client/list')}}">Clients</a>
                    </li>
                    <li>
                        <a class="{{ request()->is('driver*') ? 'active-page' : '' }}"
                           href="{{ url('/driver/list') }}">Drivers</a>
                    </li>
                </ul>
            </li>
            <li>
                <a class="{{ request()->is('feedback*') || request()->is('question*') || request()->is('request*') || request()->is('form*') ? 'active' : '' }}"
                   data-toggle="collapse" data-target="#forms">
                    <div class="pull-left">
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
                        <a class="{{ request()->is('feedback*') ? 'active-page' : '' }}"
                           href="{{ url('/feedback/list') }}">Submit FeedBack</a>
                    </li>
                    <li>
                        <a class="{{ request()->is('question*') ? 'active-page' : '' }}"
                           href="{{ url('/question/list')}}">Billing Question</a>
                    </li>
                    <li>
                        <a class="{{ request()->is('request*') ? 'active-page' : '' }}"
                           href="{{ url('/request/ride/list')}}">Request Ride</a>
                    </li>
                    <li>
                        <a class="{{ request()->is('form*') ? 'active-page' : '' }}"
                           href="{{ url('/form/other/list')}}">Others</a>
                    </li>
                </ul>
            </li>
        @endif
        @if (Auth::user()->role == 'admin')
            <li>
                <a class="{{ request()->is('payment*') ? 'active' : '' }}"
                   data-toggle="collapse" data-target="#Payment">
                    <div class="pull-left">
                        <i class="zmdi zmdi-money mr-20"></i>
                        <span class="right-nav-text">Payment</span>
                    </div>
                    <div class="pull-right">
                        <i class="zmdi zmdi-caret-down"></i>
                    </div>
                    <div class="clearfix"></div>
                </a>
                <ul id="Payment" class="collapse collapse-level-1">
                    <li>
                        <a class="{{ request()->is('payment/request') ? 'active-page' : '' }}"
                           href="{{ url('/payment/request')}}">Driver Payment Request</a>
                    </li>
                    <li>
                        <a class="{{ request()->is('payment/list') ? 'active-page' : '' }}"
                           href="{{ url('/payment/list')}}">Driver Payment List</a>
                    </li>
                </ul>
            </li>
        @endif
        @if (Auth::user()->role == 'driver')
            <li>
                <a class="{{ request()->is('withdraw/*') ? 'active' : '' }}"
                   data-toggle="collapse" data-target="#Payment">
                    <div class="pull-left">
                        <i class="zmdi zmdi-money mr-20"></i>
                        <span class="right-nav-text">Payment</span>
                    </div>
                    <div class="pull-right">
                        <i class="zmdi zmdi-caret-down"></i>
                    </div>
                    <div class="clearfix"></div>
                </a>
                <ul id="Payment" class="collapse collapse-level-1">
                    <li>
                        <a class="{{ request()->is('/withdraw/withdraw*') ? 'active-page' : '' }}"
                           href="{{ url('/withdraw/view')}}">Payment With draw</a>
                    </li>
                </ul>
            </li>
        @endif
        @if (Auth::user()->role == 'admin')
            <li>
                <a class="{{ request()->is('schedule/driver') ? 'active' : '' }}"
                   href="{{ route('schedule.driver')}}">
                    <div class="pull-left">
                        <i class="zmdi zmdi-calendar mr-20"></i>
                        <span class="right-nav-text">Driver Schedule</span>
                    </div>
                    <div class="clearfix"></div>
                </a>
            </li>
            <li>
                <a class="{{ request()->is('general/setting') ? 'active' : '' }}"
                   href="{{ route('generalsetting')}}">
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
