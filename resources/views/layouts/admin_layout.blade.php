<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>ADMIN</title>

  <!-- General CSS Files -->
  <!-- <link rel="stylesheet" href="/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="/modules/fontawesome/css/all.min.css"> -->

  <!-- CSS Libraries -->

  <!-- Template CSS -->
  <link rel="stylesheet" href="/css/app.css">
  <!-- <link rel="stylesheet" href="/css/components.css"> -->
</head>

<body class="layout-3">
    <div id="app">
      <div class="main-wrapper container">
        <div class="navbar-bg"></div>
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

          <ul class="navbar-nav float-right" style="position: absolute; right: 0px;">

            <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
              <img alt="image" src="/images/avatar/avatar-1.png" class="rounded-circle mr-1">
              <div class="d-sm-none d-lg-inline-block">Hi, Sam Hudson</div></a>
              <div class="dropdown-menu dropdown-menu-right">
                <a href="features-profile.html" class="dropdown-item has-icon">
                  <i class="fa fa-user"></i> Profile
                </a>
                <a href="features-settings.html" class="dropdown-item has-icon">
                  <i class="fa fa-cog"></i> Settings
                </a>
                <div class="dropdown-divider"></div>
                <a href="/logout" class="dropdown-item has-icon text-danger">
                  <i class="fa fa-sign-out"></i> Logout
                </a>
              </div>
            </li>
          </ul>

        </nav>
  
        <nav class="navbar navbar-secondary navbar-expand-lg" style="">
          <!-- <div class="container">
            <ul class="navbar-nav">
              <li class="nav-item dropdown">
                <a href="#" data-toggle="dropdown" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link"><i class="far fa-heart"></i><span>Top Navigation</span></a>
              </li>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link"><i class="far fa-clone"></i><span>Multiple Dropdown</span></a>
              </li>
            </ul>
          </div> -->
        </nav>
  
        <!-- Main Content -->
        <div class="main-content">
          <section class="section">
            <div class="section-body">

            </div>

          </section>
        </div>
        <footer class="main-footer">
          <div class="footer-left">
            Copyright &copy; <?=date('Y')?> Believer
          </div>
          <div class="footer-right">
            
          </div>
        </footer>
      </div>
    </div>
  
    <!-- General JS Scripts -->
    <script src="/js/app.js"></script>

  </body>

</html>