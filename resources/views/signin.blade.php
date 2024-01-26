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
            <!-- Start of Sign In -->
            <div class="main order-md-1">
                <div class="start">
                    <div class="container">
                        <div class="col-md-12">
                            <div class="content">
                                <h1>Sign in to We Chat</h1>
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
                                <p>or use your email account:</p>
                                <form id="sign_in_form" data-action="{{route('login')}}">
                                    <div class="form-group">
                                        <input type="email" id="inputEmail" class="form-control"
                                            placeholder="Email Address" name="email" required>
                                        <button class="btn icon"><i class="material-icons">mail_outline</i></button>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" id="inputPassword" class="form-control"
                                            placeholder="Password" name="password" required>
                                        <button class="btn icon"><i class="material-icons">lock_outline</i></button>
                                    </div>
                                    <button type="submit" id="sign_in" class="btn button">Sign In</button>
                                    <div class="callout">
                                        <span>Don't have account? <a href="sign-up.html">Create Account</a></span>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of Sign In -->
            <!-- Start of Sidebar -->
            <div class="aside order-md-2">
                <div class="container">
                    <div class="col-md-12">
                        <div class="preference">
                            <h2>Hello, Friend!</h2>
                            <p>Enter your personal details and start your journey with Swipe today.</p>
                            <a href="{{route('index')}}" class="btn button">Sign Up</a>
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
    <script>
        var APP_URL = {!! json_encode(url('/')) !!};
        var TOAST_POSITION = 'top-right';
        window.jQuery || document.write('<script src="dist/js/vendor/jquery-slim.min.js"><\/script>')
    </script>
    <script src="{{ asset('assets/dist/js/vendor/popper.min.js') }}"></script>
    <script src="{{ asset('assets/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/dist/js/sign-in.js') }}"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"></script>
    <script src="{{ asset('assets/dist/js/flash.js') }}"></script>
</body>

</html>
