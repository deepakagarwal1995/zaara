<!DOCTYPE html>
<html lang="en">
<!-- <html lang="en" data-layout="topnav"> -->


<!-- Mirrored from coderthemes.com/uplon/layouts/auth-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 25 Sep 2024 07:31:18 GMT -->

<head>
    <meta charset="utf-8" />
    <title>Zaara Travels | Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Zaara Travels | Admin Dashboard" name="description" />


    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ config('app.url') }}/assets/assets/images/favicon.ico">

    <!-- Vendor css -->
    <link href="{{ config('app.url') }}/assets/assets/css/vendor.min.css" rel="stylesheet" type="text/css" />

    <!-- App css -->
    <link href="{{ config('app.url') }}/assets/assets/css/app.min.css" rel="stylesheet" type="text/css"
        id="app-style" />

    <!-- Icons css -->
    <link href="{{ config('app.url') }}/assets/assets/css/icons.min.css" rel="stylesheet" type="text/css" />

    <!-- Theme Config Js -->
    <script src="{{ config('app.url') }}/assets/assets/js/config.js"></script>
</head>

<body class="authentication-bg bg-primary">

    <div class="account-pages pt-5 my-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="account-card-box bg-light rounded-2 p-2">
                        <div class="card mb-0 border border-primary border-4">
                            <div class="card-body p-4">

                                <div class="text-center">
                                    <div class="my-3">
                                        <a href="index.html">
                                            <span><img src="{{ config('app.url') }}/assets/images/Zaara-Logo.svg"
                                                    alt="" height="38"></span>
                                        </a>
                                    </div>
                                    <h5 class="text-muted text-uppercase py-3 font-16">Sign In</h5>
                                </div>
                                <form method="POST" action="{{ route('login') }}" class="mt-2">
                                    @csrf




                                    <div class="form-group mb-3">
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required autocomplete="email" autofocus
                                            placeholder="Enter your username">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            required autocomplete="current-password" placeholder="Enter your password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group mb-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember"
                                                id="remember" {{ old('remember') ? 'checked' : '' }}>
                                            <label class="form-check-label ms-1" for="checkbox-signin">Remember
                                                me</label>
                                        </div>
                                    </div>

                                    <div class="form-group text-center mb-3">
                                        <button class="btn btn-success btn-block waves-effect waves-light w-100"
                                            type="submit"> Log In </button>
                                    </div>



                                </form>


                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->
                    </div>



                </div> <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>

    <!-- Vendor js -->
    <script src="{{ config('app.url') }}/assets/assets/js/vendor.min.js"></script>

    <!-- App js -->
    <script src="{{ config('app.url') }}/assets/assets/js/app.js"></script>

</body>

</html>
