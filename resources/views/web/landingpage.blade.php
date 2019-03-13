<!DOCTYPE html>
<html>
<head>
    <title>Believer :: {{ $brand->name }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
                    <a href="#registration_form" class="btn btn-lg btn-danger">Join Now</a>

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
                <div class="col-6">
                    <img src="/images/logo-light.png" />
                    <img src="/images/phone.png" />
                    <img src="/images/download.png" />
                </div>
                <div class="col-6">
                    <h2>Register Now to Join {{ $brand->name }} on Believer!</h2>
                    <form class="form" id="registration_form">
                        @csrf
                        <input type="hidden" value="{{ $brand->id }}" name="brand_id" id="brand_id" />
                        <div class="row">
                            <div class="col-6">
                                <label class="control-label" for="first_name">First Name <span class="req">*</span></label>
                                <input type="text" class="form-control" name="first_name" id="first_name" required />
                            </div>
                            <div class="col-6">
                                <label class="control-label" for="last_name">Last Name <span class="req">*</span></label>
                                <input type="text" class="form-control" name="last_name" id="last_name" required />
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <label class="control-label" for="email">Email Address <span class="req">*</span></label>
                                <input type="text" class="form-control" name="email" id="email" required />
                                <label class="control-label" for="email">Confirm Email Address <span class="req">*</span></label>
                                <input type="text" class="form-control" name="confirm_email" id="confirm_email" required />
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <label class="control-label">Address <span class="req">*</span></label>
                                <input type="text" id="address1" name="address1" class="form-control" value="" placeholder="Address Line 1" required>
                                <input type="text" id="address2" name="address2" class="form-control" value="" placeholder="Address Line 2 (optional)">

                                <div class="input-group form-group">
                                    <input type="text" class="form-control" name="city" id="city" placeholder="City" value="" required>
                                    <input type="text" class="form-control" name="province" id="province" placeholder="Province/State" value="LA" required>
                                    <input type="text" class="form-control" name="postal_code" id="postal_code" placeholder="Postal/Zip Code" value="" required>
                                </div>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <label class="control-label" for="password">Password <span class="req">*</span></label>
                                <input type="password" class="form-control" name="password" id="password" required />
                                <br />
                                <input class="btn btn-lg btn-primary registerWithBrand" type="button" name="button" value="Register" />
                            </div>

                        </div>

                    </form>
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




