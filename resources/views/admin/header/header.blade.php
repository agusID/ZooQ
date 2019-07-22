<button type="button" class="nav-toggle btnRipple" id="nav-toggle"><i class="fas fa-bars"></i></button>
<nav id="navigation">
    <ul>
        <li>
            <a class="ProfileLink"> @if(Auth::check()) {{ Auth::user()->data_employee->name }} @endif <img class="avatar" src="{{ URL::asset('assets/images/avatar/'.Auth::user()->data_employee->profile_picture)  }}"/></a>
            <ul>
                <span class="arrow-top"></span>
                <span class="arrow"></span>
                <li><a class="item-nav" href="{{ url('user/profile/view_edit') }}"><i class="fa fa-user icon"></i> Edit Profile</a></li>
                <li><a class="item-nav" href="{{ url('user/profile/view_change_password') }}"><i class="fa fa-unlock-alt icon"></i> Change Password</a></li>
                <li><a href="{{ url('/doLogout') }}" data-msg="Do you really want to <strong>log out</strong>?" data-title="Confirm Logout" class="navLink"><i class="fa fa-sign-out-alt icon"></i> Sign Out</a></li>
            </ul>
        </li>
    </ul>
</nav>

