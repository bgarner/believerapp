<!DOCTYPE html>
<html>
<head>
    <title>Believer :: {{ $brand->name }}</title>
    <link rel="stylesheet" href="/css/app.css" />
</head>
<body class="landing">
  <div id="app" style="padding-top: 60px;">
    <div class="main-wrapper">

      {{-- <a href="index.html" class=""><img src="/images/logo-light.png" width="150"></a> --}}

      <div class="main-content">

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <img src="/uploads/clients/{{ $brand->logo }}" />
                </div>
            </div>

            <div class="row pt-4 pb-4">
                <div class="col-7">
                    <h2>As if building the home of your dreams wasn't rewarding enough.</h2>
                    <p>Raving fan of {{$brand->name}}? Become a member of the {{$brand->name}} Club to help friends, share your experience and earn rewards.</p>
                </div>
                <div class="col-1"></div>
                <div class="col-4 bg-ltgrey p-4">
                    <img src="/uploads/clients/{{ $brand->logo }}" class="img-fluid pb-3" />
                    <center>
                    <p class="text-center">Join the {{ $brand->name }} Club and get rewarded for sharing the love.</p>
                    <button type="button" class="btn btn-danger">Join Now</button>

                    <p class="pt-3"><small>Already an ambassador? <a href="">Click here to sign in.</a></small></p>
                    </center>
                </div>
            </div>
        </div>

        <div class="row bg-ltgrey p-4">
            <div class="container">
                <div class="row">
                    <div class="col-6">
                        <img src="/images/placeholder.jpg" class="img-fluid" />
                    </div>
                    <div class="col-6">
                        <h2>The Beginning of a Beautiful Friendship.</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row bg-dkgrey p-4">
            <div class="container">
                <h2 class="text-center pb-3">The Beginning of a Beautiful Friendship.</h2>
                <div class="row">
                    <div class="col-3">
                        <img src="/images/placeholder.jpg" class="img-fluid pb-2" />
                        <h4 class="text-center">Enroll</h4>
                        <p class="text-center smaller">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua.</p>
                    </div>
                    <div class="col-3">
                        <img src="/images/placeholder.jpg" class="img-fluid pb-2" />
                        <h4 class="text-center">Share</h4>
                        <p class="text-center smaller">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua.</p>
                    </div>
                    <div class="col-3">
                        <img src="/images/placeholder.jpg" class="img-fluid pb-2" />
                        <h4 class="text-center">Refer</h4>
                        <p class="text-center smaller">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua.</p>
                    </div>
                    <div class="col-3">
                        <img src="/images/placeholder.jpg" class="img-fluid pb-2" />
                        <h4 class="text-center">Earn</h4>
                        <p class="text-center smaller">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua.</p>
                    </div>
                </div>
            </div>
        </div>


        <div class="row p-4 bg-white">
            <div class="container">
            <div class="row">
                <div class="col-12">
                    <img src="/images/logo-light.png" />
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <img src="/images/phone.png" />
                </div>
                <div class="col-6">
                    <img src="/images/download.png" />
                </div>
            </div>
        </div>
      </div>

        <div class="row p-4 bg-dkgrey">
            <div class="container">

            </div>
        </div>


    </div>
  </div>

  <script src="/js/app.js"></script>

</body>
</html>




