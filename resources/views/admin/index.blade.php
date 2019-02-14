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
          <a href="index.html" class="navbar-brand sidebar-gone-hide">Believer</a>
          <a href="#" class="nav-link sidebar-gone-show" data-toggle="sidebar"><i class="fa fa-bars"></i></a>
          <div class="nav-collapse">
            <a class="sidebar-gone-show nav-collapse-toggle nav-link" href="#">
              <i class="fas fa-ellipsis-v"></i>
            </a>
            <ul class="navbar-nav">
                <li class="nav-item"><a href="/admin/clients.html" class="nav-link">Clients</a></li>
                <li class="nav-item"><a href="/admin/rewards.html" class="nav-link">Rewards</a></li>
                <li class="nav-item"><a href="/admin/reports.html" class="nav-link">Reports</a></li>
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

                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                      <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                          <i class="fa fa-user"></i>
                        </div>
                        <div class="card-wrap">
                          <div class="card-header">
                            <h4>Total Believers</h4>
                          </div>
                          <div class="card-body">
                            2,507
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                      <div class="card card-statistic-1">
                        <div class="card-icon bg-danger">
                          <i class="fa fa-users"></i>
                        </div>
                        <div class="card-wrap">
                          <div class="card-header">
                            <h4>Total Clients</h4>
                          </div>
                          <div class="card-body">
                            42
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                      <div class="card card-statistic-1">
                        <div class="card-icon bg-warning">
                          <i class="fa fa-trophy"></i>
                        </div>
                        <div class="card-wrap">
                          <div class="card-header">
                            <h4>Points Awarded</h4>
                          </div>
                          <div class="card-body">
                            1,201
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                      <div class="card card-statistic-1">
                        <div class="card-icon bg-success">
                          <i class="fa fa-gift"></i>
                        </div>
                        <div class="card-wrap">
                          <div class="card-header">
                            <h4>Rewards Redeemed</h4>
                          </div>
                          <div class="card-body">
                            47
                          </div>
                        </div>
                      </div>
                    </div>                  
                  </div>

                  <div class="row">
                      <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                        <div class="card">
                          <div class="card-header">
                            <h4>Statistics</h4>
                            <div class="card-header-action">
                              <div class="btn-group">
                                <a href="#" class="btn btn-primary">Week</a>
                                <a href="#" class="btn">Month</a>
                              </div>
                            </div>
                          </div>
                          <div class="card-body"><div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                            <canvas id="myChart" height="347" width="573" class="chartjs-render-monitor" style="display: block; width: 573px; height: 347px;"></canvas>
                            <div class="statistic-details mt-sm-4">
                              <div class="statistic-details-item">
                                <span class="text-muted"><span class="text-primary"><i class="fas fa-caret-up"></i></span> 7%</span>
                                <div class="detail-value">$243</div>
                                <div class="detail-name">Today's Sales</div>
                              </div>
                              <div class="statistic-details-item">
                                <span class="text-muted"><span class="text-danger"><i class="fas fa-caret-down"></i></span> 23%</span>
                                <div class="detail-value">$2,902</div>
                                <div class="detail-name">This Week's Sales</div>
                              </div>
                              <div class="statistic-details-item">
                                <span class="text-muted"><span class="text-primary"><i class="fas fa-caret-up"></i></span>9%</span>
                                <div class="detail-value">$12,821</div>
                                <div class="detail-name">This Month's Sales</div>
                              </div>
                              <div class="statistic-details-item">
                                <span class="text-muted"><span class="text-primary"><i class="fas fa-caret-up"></i></span> 19%</span>
                                <div class="detail-value">$92,142</div>
                                <div class="detail-name">This Year's Sales</div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

            </div>
          </section>
        </div>
        <footer class="main-footer">
          <div class="footer-left">
            Copyright &copy; 2018 <div class="bullet"></div> Believer
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