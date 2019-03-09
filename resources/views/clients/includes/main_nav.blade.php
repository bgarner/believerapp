<nav class="navbar navbar-expand-lg main-navbar" style="background-color: #000;">
    <a href="/client" class="navbar-brand sidebar-gone-hide">
        <img src="/images/logo-dark.png" width="150" />
    </a>
    <a href="#" class="nav-link sidebar-gone-show" data-toggle="sidebar"><i class="fa fa-bars"></i></a>
    <div class="nav-collapse">
        <a class="sidebar-gone-show nav-collapse-toggle nav-link" href="#">
            <i class="fas fa-ellipsis-v"></i>
        </a>
        <ul class="navbar-nav">
            <li class="nav-item"><a href="/client/missions" class="nav-link">Missions</a></li>
            <li class="nav-item"><a href="/client/believers" class="nav-link">Believers</a></li>
            <li class="nav-item"><a href="/client/referrals" class="nav-link">Referrals</a></li>
            <li class="nav-item"><a href="/client/reports" class="nav-link">Reports</a></li>
        </ul>
    </div>

    @include('clients.includes.user_nav')
</nav>
