<nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo" href="{{route('home')}}">
            <img src="{{asset('assets/images/logo/setcol-content.png')}}" alt="logo" />
        </a>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-stretch">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize"> <span class="mdi mdi-menu"></span>
        </button>
        <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item nav-profile dropdown">
                <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                    <div class="nav-profile-img">
                        <img src="{{asset('assets/images/user/'.Auth::user()->image)}}" alt="image"> <span class="availability-status online"></span>
                    </div>
                    <div class="nav-profile-text">
                        <p class="mb-1 text-black">{{Auth::user()->name}}</p>
                    </div>
                </a>
                <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                    @if(Auth::user()->account_for == 'admin') <a class="dropdown-item" href="{{route('user.show',Auth::user()->id)}}"><i class="mdi mdi-cached mr-2 text-success"></i> Profile</a>
                    @elseif(Auth::user()->account_for == 'hr') <a class="dropdown-item" href="{{route('hr.show',Auth::user()->id)}}"><i class="mdi mdi-cached mr-2 text-success"></i> Profile</a>
                    @elseif(Auth::user()->account_for == 'account') <a class="dropdown-item" href="{{route('account.show',Auth::user()->id)}}"><i class="mdi mdi-cached mr-2 text-success"></i> Profile</a>
                    @elseif(Auth::user()->account_for == 'employee') <a class="dropdown-item" href="{{route('employee.show',Auth::user()->id)}}"><i class="mdi mdi-cached mr-2 text-success"></i> Profile</a>
                    @elseif(Auth::user()->account_for == 'sale_leader') <a class="dropdown-item" href="{{route('sale_leader.show',Auth::user()->id)}}"><i class="mdi mdi-cached mr-2 text-success"></i> Profile</a>
                    @elseif(Auth::user()->account_for == 'supervisor') <a class="dropdown-item" href="{{route('supervisor.show',Auth::user()->id)}}"><i class="mdi mdi-cached mr-2 text-success"></i> Profile</a>
                    @elseif(Auth::user()->account_for == 'seller') <a class="dropdown-item" href="{{route('seller.show',Auth::user()->id)}}"><i class="mdi mdi-cached mr-2 text-success"></i> Profile</a>
                    @elseif(Auth::user()->account_for == 'client') <a class="dropdown-item" href="{{route('client.show',Auth::user()->id)}}"><i class="mdi mdi-cached mr-2 text-success"></i> Profile</a>
                    @endif
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> <i class="mdi mdi-logout mr-2 text-primary"></i>{{ __('Logout') }}</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
                </div>
            </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas"> <span class="mdi mdi-menu"></span>
        </button>
    </div>
</nav>