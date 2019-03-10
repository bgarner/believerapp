<!DOCTYPE html>
<html>
<head>
    <title>Believer :: {{ $brand->name }}</title>
    <link rel="stylesheet" href="/css/app.css" />
</head>
<body class="layout-3">
  <div id="app">
    <div class="main-wrapper container">

      <nav class="navbar navbar-expand-lg main-navbar">
        <div class="navbar-bg" style="height: 100%;"></div>
        <a href="index.html" class="navbar-brand sidebar-gone-hide"><img src="/images/logo-dark.png" width="150"></a>
      </nav>



      <!-- Main Content -->
      <div class="main-content" style="min-height: 796px;">
        <section class="section">
          <div class="section-header">
            <h1>Top Navigation</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Layout</a></div>
              <div class="breadcrumb-item">Top Navigation</div>
            </div>
          </div>

          <div class="section-body">
            <h2 class="section-title">This is Example Page</h2>
            <p class="section-lead">This page is just an example for you to create your own page.</p>
            <div class="card">
              <div class="card-header">
                <h4>Example Card</h4>
              </div>
              <div class="card-body">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
              </div>
              <div class="card-footer bg-whitesmoke">
                This is card footer
              </div>
            </div>
          </div>
        </section>
      </div>
      <footer class="main-footer">
        <div class="footer-left">
          Copyright © 2018 <div class="bullet"></div> Design By <a href="https://nauval.in/">Muhamad Nauval Azhar</a>
        </div>
        <div class="footer-right">

        </div>
      </footer>
    </div>
  </div>

  <script src="/js/app.js"></script>

</body>
</html>



<img src="/uploads/clients/{{ $brand->logo }}" />
