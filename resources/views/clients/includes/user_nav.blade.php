<ul class="navbar-nav float-right" style="position: absolute; right: 0px;">

<li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
  <img alt="image" src="/images/avatar/avatar-1.png" class="rounded-circle mr-1">
  <div class="d-sm-none d-lg-inline-block">Hi, {{ Auth::user()->first }}</div></a>
  <div class="dropdown-menu dropdown-menu-right">
    <a href="/client/profile" class="dropdown-item has-icon">
      <i class="fa fa-user"></i> Profile
    </a>
    <a href="/client/settings" class="dropdown-item has-icon">
      <i class="fa fa-cog"></i> Settings
    </a>
    <div class="dropdown-divider"></div>
    <a href="/logout" class="dropdown-item has-icon text-danger">
      <i class="fa fa-sign-out"></i> Logout
    </a>
  </div>
</li>
</ul>
