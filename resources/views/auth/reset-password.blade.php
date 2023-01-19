<!doctype html>
<html lang="en">

    <head>
        {{-- {{asset('backend/')}} --}}
        <meta charset="utf-8" />
        <title>Password_reset | Admin</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesdesign" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href=" {{asset('backend/assets/images/favicon.ico')}}">

        <!-- Bootstrap Css -->
        <link href=" {{asset('backend/assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href=" {{asset('backend/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href=" {{asset('backend/assets/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />

    </head>

    <body class="auth-body-bg">
        <div class="bg-overlay"></div>
        <div class="wrapper-page">
            <div class="container-fluid p-0">
                <div class="card">

                    <div class="card-body">
                        {{-- <div><i class="fa-solid fa-arrow-left"></i>login</div> --}}
                        <a href="{{route('login')}}">login</a>

                        <div class="text-center mt-4">
                            <div class="mb-3">
                                <a href="index.html" class="auth-logo">
                                    <img src="{{asset('backend/assets/images/logo-dark.png')}}" height="30" class="logo-dark mx-auto" alt="">
                                    <img src="{{asset('backend/assets/images/logo-light.png')}}" height="30" class="logo-light mx-auto" alt="">
                                </a>
                            </div>
                        </div>

                        <h4 class="text-muted text-center font-size-18"><b>Reset Password</b></h4>

                        <div class="p-3">

                            <form method="POST" action="{{ route('password.store') }}">
                                @csrf
                                <!-- Password Reset Token -->
                           <input type="hidden" name="token" value="{{ $request->route('token') }}">

                                <div class="form-group mb-3 row">
                                    <div class="col-12">
                                        <input class="form-control" id="password"
                                        name="password" type="password" id="password" name="password" required="" placeholder="Password">
                                    </div>
                                </div>
                                <div class="form-group mb-3 row">
                                    <div class="col-12">
                                        <input class="form-control" id="password_confirmation"
                                        name="password_confirmation" type="password" id="password_confirmation" name="password_confirmation" required="" placeholder="Password confirmation">
                                    </div>
                                </div>

                                <div class="form-group mb-3 row">
                                    <div class="col-12">
                                        <div class="custom-control custom-checkbox">

                                        </div>
                                    </div>
                                </div>

                                <div class="form-group text-center row mt-3 pt-1">
                                    <div class="col-12">

                                        <button class="btn btn-info w-100 waves-effect waves-light" type="submit">Reset password</button>
                                    </div>
                                </div>


                            </form>
                            <!-- end form -->
                        </div>
                    </div>
                    <!-- end cardbody -->
                </div>
                <!-- end card -->
            </div>
            <!-- end container -->
        </div>
        <!-- end -->

        {{-- {{asset('backend/assets/libs/jquery/jquery.min.js')}} --}}
        <!-- JAVASCRIPT -->
        <script src="d{{asset('backend/assets/libs/jquery/jquery.min.js')}}"></script>
        <script src="d{{asset('backend/assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="d{{asset('backend/assets/libs/metismenu/metisMenu.min.js')}}"></script>
        <script src="d{{asset('backend/assets/libs/simplebar/simplebar.min.js')}}"></script>
        <script src="d{{asset('backend/assets/libs/node-waves/waves.min.js')}}"></script>

        <script src="d{{asset('backend/assets/js/app.js')}}"></script>

    </body>
</html>
{{-- {{asset('backend/')}} --}}
