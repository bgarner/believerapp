<nav class="navbar navbar-expand-lg main-navbar">
    <a href="/admin" class="navbar-brand sidebar-gone-hide">
        <img src="/images/logo-dark.png" width="150" />
    </a>
    <a href="#" class="nav-link sidebar-gone-show" data-toggle="sidebar"><i class="fa fa-bars"></i></a>
    <div class="nav-collapse">
        <a class="sidebar-gone-show nav-collapse-toggle nav-link" href="#">
            <i class="fas fa-ellipsis-v"></i>
        </a>
        <ul class="navbar-nav">
            <li class="nav-item"><a href="/admin/clients" class="nav-link">Clients</a></li>
            <li class="nav-item"><a href="/admin/rewards" class="nav-link">Rewards</a></li>
            <li class="nav-item"><a href="/admin/reports" class="nav-link">Reports</a></li>
        </ul>
    </div>

    @include('admin.includes.user_nav')
</nav>
