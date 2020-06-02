<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <div class="nav-link">
                <div class="nav-profile-image">
                    <img src="{{asset('assets/images/user/'.Auth::user()->image)}}" alt="profile">
                    <span class="login-status online"></span>
                </div>
                <div class="nav-profile-text d-flex flex-column">
                    <span class="font-weight-bold mb-2">{{Auth::user()->name}}</span>
                    <span class="text-secondary text-small">{{Auth::user()->designation}}</span>
                </div>
                <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('home')}}">
                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-home menu-icon"></i>
            </a>
        </li>
        @can('all_user',Auth::user())
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#user-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">User</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi mdi-account-circle menu-icon"></i>
            </a>
            <div class="collapse" id="user-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{route('user.index')}}">All User</a></li>
                </ul>
            </div>
        </li>
        @endcan
        @if(Gate::check('hr_index') || Gate::check('hr_create'))
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#hr-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">HR</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi mdi-account-circle menu-icon"></i>
            </a>
            <div class="collapse" id="hr-basic">
                <ul class="nav flex-column sub-menu">
                    @can('hr_index',Auth::user())
                    <li class="nav-item"> <a class="nav-link" href="{{route('hr.index')}}">HR Index</a></li>
                    @endcan
                    @can('hr_create',Auth::user())
                    <li class="nav-item"> <a class="nav-link" href="{{route('hr.create')}}">HR Create</a></li>
                   @endcan
                </ul>
            </div>
        </li>
        @endif
        @if(Gate::check('account_index') || Gate::check('account_create'))
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#account-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Account</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi mdi-account-circle menu-icon"></i>
            </a>
            <div class="collapse" id="account-basic">
                <ul class="nav flex-column sub-menu">
                    @can('account_index',Auth::user())
                    <li class="nav-item"> <a class="nav-link" href="{{route('account.index')}}">Account Index</a></li>
                    @endcan
                    @can('account_create',Auth::user())
                    <li class="nav-item"> <a class="nav-link" href="{{route('account.create')}}">Account Create</a></li>
                    @endcan
                </ul>
            </div>
        </li>
        @endif
        @if(Gate::check('employee_index') || Gate::check('employee_create'))
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#employee-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Employee</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi mdi-account-circle menu-icon"></i>
            </a>
            <div class="collapse" id="employee-basic">
                <ul class="nav flex-column sub-menu">
                    @can('employee_index',Auth::user())
                    <li class="nav-item"> <a class="nav-link" href="{{route('employee.index')}}">Employee Index</a></li>
                    @endcan
                    @can('employee_create',Auth::user())
                    <li class="nav-item"> <a class="nav-link" href="{{route('employee.create')}}">Employee Create</a></li>
                    @endcan
                </ul>
            </div>
        </li>
        @endif
        @if(Gate::check('sale_leader_index') || Gate::check('sale_leader_create'))
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#leader-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Sale Leader</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi mdi-account-circle menu-icon"></i>
            </a>
            <div class="collapse" id="leader-basic">
                <ul class="nav flex-column sub-menu">
                    @can('sale_leader_index',Auth::user())
                    <li class="nav-item"> <a class="nav-link" href="{{route('sale_leader.index')}}">Sale Leader Index</a></li>
                    @endcan
                    @can('sale_leader_create',Auth::user())
                    <li class="nav-item"> <a class="nav-link" href="{{route('sale_leader.create')}}">Sale Leader Create</a></li>
                    @endcan
                </ul>
            </div>
        </li>
        @endif
        @if(Gate::check('supervisor_index') || Gate::check('supervisor_create'))
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#supervisor-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Supervisor</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi mdi-account-circle menu-icon"></i>
            </a>
            <div class="collapse" id="supervisor-basic">
                <ul class="nav flex-column sub-menu">
                    @can('supervisor_index',Auth::user())
                    <li class="nav-item"> <a class="nav-link" href="{{route('supervisor.index')}}">Supervisor Index</a></li>
                    @endcan
                    @can('supervisor_create',Auth::user())
                    <li class="nav-item"> <a class="nav-link" href="{{route('supervisor.create')}}">Supervisor Create</a></li>
                    @endcan
                </ul>
            </div>
        </li>
        @endif
        @if(Gate::check('seller_index') || Gate::check('seller_create'))
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#seller-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Seller</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi mdi-account-circle menu-icon"></i>
            </a>
            <div class="collapse" id="seller-basic">
                <ul class="nav flex-column sub-menu">
                    @can('seller_index',Auth::user())
                    <li class="nav-item"> <a class="nav-link" href="{{route('seller.index')}}">Seller Index</a></li>
                    @endcan
                    @can('seller_create',Auth::user())
                    <li class="nav-item"> <a class="nav-link" href="{{route('seller.create')}}">Seller Create</a></li>
                    @endcan
                </ul>
            </div>
        </li>
        @endif
        @if(Gate::check('client_index') || Gate::check('client_create'))
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#client-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Client</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi mdi-account-circle menu-icon"></i>
            </a>
            <div class="collapse" id="client-basic">
                <ul class="nav flex-column sub-menu">
                    @can('client_index',Auth::user())
                    <li class="nav-item"> <a class="nav-link" href="{{route('client.index')}}">Client Index</a></li>
                    @endcan
                    @can('client_create',Auth::user())
                    <li class="nav-item"> <a class="nav-link" href="{{route('client.create')}}">Client Create</a></li>
                    @endcan
                </ul>
            </div>
        </li>
        @endif
        @if(Gate::check('time_report_index') || Gate::check('time_report_all_time_index'))
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#time-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Time Report</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi mdi-account-circle menu-icon"></i>
            </a>
            <div class="collapse" id="time-basic">
                <ul class="nav flex-column sub-menu">
                    @can('time_report_index',Auth::user())
                    <li class="nav-item"> <a class="nav-link" href="{{route('time.index')}}">Index</a></li>
                    @endcan
                    @can('time_report_all_time_index',Auth::user())
                    <li class="nav-item"> <a class="nav-link" href="{{route('all.time.report')}}">All Time Report</a></li>
                    @endcan
                </ul>
            </div>
        </li>
        @endif
        @can('salary_approved',Auth::user())
        <li class="nav-item">
            <a class="nav-link" href="{{route('salary.approved.index')}}">
                <span class="menu-title">Salary Approved</span>
                <i class="mdi mdi-account-convert menu-icon"></i>
            </a>
        </li>
        @endcan
        @if(Gate::check('salary_index') || Gate::check('salary_create'))
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#salary-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Salary</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi mdi-account-circle menu-icon"></i>
            </a>
            <div class="collapse" id="salary-basic">
                <ul class="nav flex-column sub-menu">
                    @can('salary_index',Auth::user())
                    <li class="nav-item"> <a class="nav-link" href="{{route('salary.index')}}">Salary Index</a></li>
                    @endcan
                    @can('salary_create',Auth::user())
                    <li class="nav-item"> <a class="nav-link" href="{{route('salary.create')}}">Salary Create</a></li>
                    @endcan
{{--                    @if(Auth::user()->account_for == 'hr' || Auth::user()->account_for == 'super_admin')--}}
{{--                    <li class="nav-item"> <a class="nav-link" href="{{route('all.salary.index')}}">All Salary</a></li>--}}
{{--                    @endif--}}
                </ul>
            </div>
        </li>
        @endif
        @can('document',Auth::user())
        <li class="nav-item">
            <a class="nav-link" href="{{route('document.index')}}">
                <span class="menu-title">Document</span>
                <i class="mdi mdi-contact-mail menu-icon"></i>
            </a>
        </li>
        @endcan
        @if(Gate::check('offert_index') || Gate::check('all_offert') || Gate::check('offert_create'))
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#offert-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Offert</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi mdi-account-circle menu-icon"></i>
            </a>
            <div class="collapse" id="offert-basic">
                <ul class="nav flex-column sub-menu">
                    @can('offert_index',Auth::user())
                    <li class="nav-item"> <a class="nav-link" href="{{route('offert.index')}}">Index</a></li>
                    @endcan
                    @can('all_offert',Auth::user())
                    <li class="nav-item"> <a class="nav-link" href="{{route('all.offert')}}">All Offert</a></li>
                    @endcan
                    @can('offert_create',Auth::user())
                    <li class="nav-item"> <a class="nav-link" href="{{route('offert.create')}}">Offert Create</a></li>
                    @endcan
                </ul>
            </div>
        </li>
        @endif
        @can('role_index',Auth::user())
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#role-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Role</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi mdi mdi-account-key menu-icon"></i>
            </a>
            <div class="collapse" id="role-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{route('role.index')}}">Index</a></li>
{{--                    <li class="nav-item"> <a class="nav-link" href="{{route('role.create')}}">Create</a></li>--}}
                </ul>
            </div>
        </li>
        @endcan
    </ul>
</nav>
