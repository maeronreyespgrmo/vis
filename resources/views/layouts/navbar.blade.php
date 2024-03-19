{{-- Left navbar links --}}
<ul class="navbar-nav">
  <li class="nav-item">
    <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
  </li>
</ul>

{{-- Right navbar links --}}
<ul class="navbar-nav ml-auto">
  <li class="nav-item dropdown">
    <a class="nav-link" data-toggle="dropdown" href="#">{{ Auth::user()->full_name }} <i class="fas fa-user-cog"></i><i class="fas fa-angle-down"></i>
    </a>
    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
      <!-- <div class="dropdown-divider"></div>
        <a href="/auth/change-password" class="dropdown-item dropdown-footer">Change Password</a> -->
      <div class="dropdown-divider"></div>
        <a href="{{ route('logout') }}" class="dropdown-item dropdown-footer" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
  </li>
</ul>