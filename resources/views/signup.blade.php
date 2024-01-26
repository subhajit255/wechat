<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>We Chat</title>
    <meta name="description" content="#">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('assets/dist/css/lib/bootstrap.min.css') }}" type="text/css" rel="stylesheet">
    <!-- Swipe core CSS -->
    <link href="{{ asset('assets/dist/css/swipe.min.css') }}" type="text/css" rel="stylesheet">
    <!-- Favicon -->
    <link href="{{ asset('assets/dist/img/favicon.png') }}" type="image/png" rel="icon">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link href="//cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css" rel="stylesheet" />
</head>

<body class="start">
    <main>
        <div class="layout">
            @include('flash')
            <!-- Start of Sign Up -->
            <div class="main order-md-2">
                <div class="start">
                    <div class="container">
                        <div class="col-md-12">
                            <div class="content">
                                <h1>Create Account</h1>
                                <div class="third-party">
                                    <button class="btn item bg-blue">
                                        <i class="material-icons">pages</i>
                                    </button>
                                    <button class="btn item bg-teal">
                                        <i class="material-icons">party_mode</i>
                                    </button>
                                    <button class="btn item bg-purple">
                                        <i class="material-icons">whatshot</i>
                                    </button>
                                </div>
                                <p>or use your email for registration:</p>
                                <form class="signup" id="form_submit" data-action={{ route('sign-up') }}>
                                    <div class="form-parent">
                                        <div class="form-group">
                                            <input type="text" id="inputName" class="form-control" placeholder="Name"
                                                name="name" required>
                                            <button class="btn icon"><i
                                                    class="material-icons">person_outline</i></button>
                                        </div>
                                        <div class="form-group">
                                            <input type="email" id="inputEmail" class="form-control"
                                                placeholder="Email Address" name="email" required>
                                            <button class="btn icon"><i class="material-icons">mail_outline</i></button>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" id="inputPassword" class="form-control"
                                            placeholder="Password" name="password" required>
                                        <button class="btn icon"><i class="material-icons">lock_outline</i></button>
                                    </div>
                                    <button type="submit" class="btn button" id="sign_up">Sign Up</button>
                                    <div class="callout">
                                        <span>Already a member? <a href="sign-in.html">Sign In</a></span>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of Sign Up -->
            <!-- Start of Sidebar -->
            <div class="aside order-md-1">
                <div class="container">
                    <div class="col-md-12">
                        <div class="preference">
                            <h2>Welcome Back!</h2>
                            <p>To keep connected with your friends please login with your personal info.</p>
                            <a href="{{ route('sign-in') }}" class="btn button">Sign In</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of Sidebar -->
        </div> <!-- Layout -->
    </main>
    <!-- Bootstrap core JavaScript
  ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

    {{-- <script>
        const baseUrl = {{ env('APP_URL') }};
    </script> --}}
    {{-- <script src="{{ asset('assets/dist/js/jquery-3.3.1.slim.min.js') }}"></script> --}}
    <script>
        var APP_URL = {!! json_encode(url('/')) !!};
        var TOAST_POSITION = 'top-right';
        window.jQuery || document.write('<script src="dist/js/vendor/jquery-slim.min.js"><\/script>')
    </script>
    <script src="{{ asset('assets/dist/js/vendor/popper.min.js') }}"></script>
    <script src="{{ asset('assets/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/dist/js/sign-up.js') }}"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"></script>
    <script src="{{ asset('assets/dist/js/flash.js') }}"></script>
</body>


</html>
