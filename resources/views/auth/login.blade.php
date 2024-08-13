<!doctype html>
<html lang="{{ config('app.locale') }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <title>TMS - Login</title>

    <meta name="description"
        content="Dashmix - Bootstrap 5 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
    <meta name="author" content="pixelcave">
    <meta name="robots" content="noindex, nofollow">

    <!-- Icons -->
    <link rel="icon" sizes="32x32"
        href="https://cdn-imddh.nitrocdn.com/BgpVdYdrOyYzGZDHCldtezOehOYupTPa/assets/images/optimized/rev-2bec759/www.technoserve.org/wp-content/uploads/2019/10/technoserve-favicon.ico">


    <!-- Modules -->
    @yield('css')
    @vite(['resources/sass/main.scss', 'resources/sass/dashmix/themes/xeco.scss', 'resources/js/dashmix/app.js'])

    <!-- Alternatively, you can also include a specific color theme after the main stylesheet to alter the default color theme of the template -->
    {{-- @vite(['resources/sass/main.scss', 'resources/sass/dashmix/themes/xwork.scss', 'resources/js/dashmix/app.js']) --}}
    @yield('js')
</head>

<body>
    <div id="page-container">

        <!-- Main Container -->
        <main id="main-container">
            <!-- Page Content -->
            <div class="bg-image"
                style="background-image: url('https://rootcapital.org/wp-content/uploads/2024/07/homepage-landscape.jpg');">
                <div class="row g-0 justify-content-center bg-primary-dark-op">
                    <div class="hero-static col-sm-8 col-md-6 col-xl-4 d-flex align-items-center p-2 px-sm-0">
                        <!-- Sign In Block -->
                        <div class="block block-transparent block-rounded w-100 mb-0 overflow-hidden">
                            <div
                                class="block-content block-content-full px-lg-5 px-xl-6 py-4 py-md-5 py-lg-6 bg-body-extra-light">
                                <!-- Header -->
                                <div class="mb-2 text-center">
                                    <div style="padding:0 0 15px 0">
                                        <img src="https://iform-artwork.s3.amazonaws.com/root/logo.png" width="50%"
                                            alt="Image">

                                    </div>
                                    <p class="text-uppercase fw-bold fs-sm text-muted">Iniciar sesión</p>
                                </div>
                                <!-- END Header -->

                                <!-- Sign In Form -->
                                <!-- jQuery Validation (.js-validation-signin class is initialized in js/pages/op_auth_signin.min.js which was auto compiled from _js/pages/op_auth_signin.js) -->
                                <!-- For more info and examples you can check out https://github.com/jzaefferer/jquery-validation -->
                                <form class="js-validation-signin" method="POST" action="/login">
                                    @csrf
                                    <div class="mb-4">
                                        <div class="input-group input-group-lg">
                                            <input type="text"
                                                class="form-control @if (session('error')) is-invalid @endif"
                                                id="name" name="name" placeholder="Usuario"
                                                aria-describedby="login-username-error" aria-invalid="false"
                                                :value="old('name')" required autofocus autocomplete="name" />
                                            <span class="input-group-text">
                                                <i class="fa fa-user-circle"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="mb-4">
                                        <div class="input-group input-group-lg">
                                            <input type="password"
                                                class="form-control @if (session('error')) is-invalid @endif"
                                                id="password" name="password" placeholder="Contraseña"
                                                aria-describedby="login-password-error" aria-invalid="true">
                                            <span class="input-group-text">
                                                <i class="fa fa-asterisk"></i>
                                            </span>
                                        </div>
                                        @if (session('error'))
                                            <div id="login-password-error" class="invalid-feedback animated fadeIn"
                                                style="display: block;">
                                                {{ session('error') }}
                                            </div>
                                        @endif
                                    </div>

                                    <div
                                        class="d-sm-flex justify-content-sm-between align-items-sm-center text-center text-sm-start mb-4">
                                        <!--<div class="form-check">
                      <input type="checkbox" class="form-check-input" id="login-remember-me" name="login-remember-me" checked="">
                      <label class="form-check-label" for="login-remember-me">Remember Me</label>
                    </div>-->
                                    </div>
                                    <div class="text-center mb-4">
                                        <button type="submit" class="btn btn-hero btn-primary">
                                            <i class="fa fa-fw fa-sign-in-alt opacity-50 me-1"></i> Continuar
                                        </button>
                                    </div>
                                </form>
                                <!-- END Sign In Form -->
                            </div>
                            <div class="block-content bg-body">
                                <div class="text-center mb-4"></div>
                            </div>
                        </div>
                    </div>
                    <!-- END Sign In Block -->
                </div>
            </div>
    </div>
    <!-- END Page Content -->
    </main>
    <!-- END Main Container -->
    </div>
</body>
