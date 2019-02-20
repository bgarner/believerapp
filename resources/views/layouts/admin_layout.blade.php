<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <meta name="csrf-token" content="{{ csrf_token() }}">
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
        
        @include('admin.includes.main_nav')
  
        <nav class="navbar navbar-secondary navbar-expand-lg" style="">
        
          <div class="container">
            @yield('logo')
            <ul class="navbar-nav" style="float: left;">
              @yield('subnav')
            </ul>
          </div>
        </nav>
  
        <!-- Main Content -->
        <div class="main-content">
          <section class="section">
            <div class="section-body">
            @yield('content')
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