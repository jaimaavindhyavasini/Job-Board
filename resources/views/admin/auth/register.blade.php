<!DOCTYPE html>
<html>

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8" />
    <title>Coding Thunder | Register</title>

    <!-- Site favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ url('/') }}/backend/assets/logo/logo.jpg" />
    <link rel="icon" type="image/png" sizes="32x32" href="{{ url('/') }}/backend/assets/logo/logo.jpg" />
    <link rel="icon" type="image/png" sizes="16x16" href="{{ url('/') }}/backend/assets/logo/logo.jpg" />

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet" />

    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/backend/assets/vendors/styles/core.css" />
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/backend/assets/vendors/styles/icon-font.min.css" />
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/backend/assets/src/plugins/jquery-steps/jquery.steps.css" />
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/backend/assets/vendors/styles/style.css" />

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-GBZ3SGGX85"></script>
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2973766580778258" crossorigin="anonymous"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag("js", new Date());

        gtag("config", "G-GBZ3SGGX85");
    </script>

    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                "gtm.start": new Date().getTime(),
                event: "gtm.js"
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != "dataLayer" ? "&l=" + l : "";
            j.async = true;
            j.src = "https://www.googletagmanager.com/gtm.js?id=" + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, "script", "dataLayer", "GTM-NXZMQSS");
    </script>
    <!-- End Google Tag Manager -->
</head>
<style>
    .login-box {
        max-width: 592px;
        width: 100%;
        padding: 40px 20px;
        margin: 5px auto;
    }
</style>
<body class="login-page">
    <div class="login-header box-shadow">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <div class="brand-logo">
                <a href="login.html">
                    <img src="{{ url('/') }}/backend/assets/logo/logo.jpg" alt="" height="80px" width="80px"/>
                </a>
            </div>
            <div class="login-menu">
                <ul>
                    <li><a href="{{ url('/admin/login') }}">Login</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="register-page-wrap d-flex align-items-center flex-wrap justify-content-center">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 col-lg-6 d-none d-md-block">
                    <img src="{{ url('/') }}/backend/assets/vendors/images/register-page-img.png" alt="" />
                </div>
                <div class="col-md-6 col-lg-6">
                    <div class="login-box bg-white box-shadow border-radius-10">
                        <div class="login-title">
                            {{-- <div class="login-menu col-md-12 pb-2" style="text-align:center;">
                                <img src="{{ url('/') }}/frontend/assets/img/barti_logo.png" alt="" style=" width: 80px; height: 80px;">
                            </div> --}}
                            <h4 class="text-center text-primary pt-2">Register To Admin</h4>
                        </div>

                        <form  method="POST" action="{{ url('/admin/register') }}" role="form" enctype="multipart/form">
                            @csrf

                            <div class="form-wrap max-width-600 mx-auto">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label"><strong>Username : &nbsp;<span class="text-danger">*</span></strong></label>
                                    <div class="col-sm-8">
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label"><strong>Email ID : &nbsp;<span class="text-danger">*</span></strong></label>
                                    <div class="col-sm-8">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label"><strong>Roles : &nbsp;<span class="text-danger">*</span></strong></label>
                                    <div class="col-sm-8">
                                        <select class="form-control selectpicker @error('roles') is-invalid @enderror" title="Select Roles" name="roles" id="roles">
                                            <option value="1" {{ old('roles') == "1" ? 'selected' : '' }}>Super Admin</option>
                                            <option value="2" {{ old('roles') == "2" ? 'selected' : '' }}>User</option>
                                        </select>

                                        @error('roles')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label"><strong>Password : &nbsp;<span class="text-danger">*</span></strong></label>
                                    <div class="col-sm-8">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label"><strong>Confirm Password : &nbsp;<span class="text-danger">*</span></strong></label>
                                    <div class="col-sm-8">
                                        <input id="password-confirm" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" autocomplete="new-password">

                                        @error('password_confirmation')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="input-group mb-0">
                                        <button type="submit" class="btn btn-primary  btn-lg btn-block">
                                            <i class="dw dw-share"></i>&nbsp;{{ __('Register') }}
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="text-center py-4">
                                <p style="font-weight:700;">Already have an account?
                                    <a  href="{{ url('/admin/login') }}" class="register-link text-primary">Sign in</a>
                                </p>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- js -->
    <script src="{{ url('/') }}/backend/assets/vendors/scripts/core.js"></script>
    <script src="{{ url('/') }}/backend/assets/vendors/scripts/script.min.js"></script>
    <script src="{{ url('/') }}/backend/assets/vendors/scripts/process.js"></script>
    <script src="{{ url('/') }}/backend/assets/vendors/scripts/layout-settings.js"></script>
    <script src="{{ url('/') }}/backend/assets/src/plugins/jquery-steps/jquery.steps.js"></script>
    <script src="{{ url('/') }}/backend/assets/vendors/scripts/steps-setting.js"></script>

    <!-- Google Tag Manager (noscript) -->
    <noscript>
        <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NXZMQSS" height="0" width="0"
            style="display: none; visibility: hidden"></iframe>
        </noscript>
    <!-- End Google Tag Manager (noscript) -->
</body>

</html>
