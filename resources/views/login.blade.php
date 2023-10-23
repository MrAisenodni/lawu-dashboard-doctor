<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="description" content="Neon Admin Panel" />
        <meta name="author" content="" />

        <link rel="icon" href="{{ asset($provider->provider_logo) }}">

        <title>Masuk</title>

        <link rel="stylesheet" href="{{ asset('/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/font-icons/entypo/css/entypo.css') }}">
        <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic">
        <link rel="stylesheet" href="{{ asset('/css/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/neon-core.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/neon-theme.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/neon-forms.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/custom.css') }}">

        <script src="js/jquery-1.11.3.min.js"></script>
    </head>
    <body class="page-body login-page login-form-fall" data-url="http://neon.dev">

    <!-- This is needed when you send requests via Ajax -->
    <script type="text/javascript">
        var baseurl = '';
    </script>

    <div class="login-container">
        
        <div class="login-header login-caret" style="height: 200px; padding: 50px; 0px">
            
            <div class="login-content">
                
                <a href="/" class="logo">
                    <img src="{{ asset($provider->provider_picture) }}" width="120" alt="" />
                </a>
                
                <p class="description text-white">Selamat datang di {{ $provider->provider_name }}</p>
                
                <!-- progress bar indicator -->
                <div class="login-progressbar-indicator">
                    <h3>43%</h3>
                    <span>logging in...</span>
                </div>
            </div>
            
        </div>
        
        <div class="login-progressbar">
            <div></div>
        </div>
        
        <div class="login-form" style="padding-top: 20px">
            
            <div class="login-content">
                
                <div class="form-login-error">
                    <h3>Invalid login</h3>
                    <p>Enter <strong>demo</strong>/<strong>demo</strong> as login and password.</p>
                </div>
                
                <form method="post" role="form" action="/login">
                    @csrf
                    <div class="form-group">
                        <div class="input-group @error('username') validate-has-error @enderror">
                            <div class="input-group-addon">
                                <i class="entypo-user"></i>
                            </div>
                            <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="{{ old('username') }}" autocomplete="off" />
                        </div>
                        @error('username')
                            <span id="name-error" class="validate-has-error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <div class="input-group @error('password') validate-has-error @enderror">
                            <div class="input-group-addon">
                                <i class="entypo-key"></i>
                            </div>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Password" value="{{ old('password') }}" autocomplete="off" />
                        </div>
                        @error('password')
                            <span id="name-error" class="validate-has-error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-secondary btn-block btn-login">
                            <i class="entypo-login"></i>
                            MASUK
                        </button>
                    </div>
                </form>
                
                <div class="login-bottom-links">
                    <a href="/forgot-password" class="link">Lupa Kata Sandi?</a>
                    <br />
                </div>
            </div>
        </div>
    </div>
        <!-- Bottom scripts (common) -->
        <script src="{{ asset('/js/gsap/TweenMax.min.js') }}"></script>
        <script src="{{ asset('/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js') }}"></script>
        <script src="{{ asset('/js/bootstrap.js') }}"></script>
        <script src="{{ asset('/js/joinable.js') }}"></script>
        <script src="{{ asset('/js/resizeable.js') }}"></script>
        <script src="{{ asset('/js/neon-api.js') }}"></script>
        <script src="{{ asset('/js/jquery.validate.min.js') }}"></script>
        <script src="{{ asset('/js/neon-login.js') }}"></script>

        <!-- JavaScripts initializations and stuff -->
        <script src="{{ asset('/js/neon-custom.js') }}"></script>

        <!-- Demo Settings -->
        <script src="{{ asset('/js/neon-demo.js') }}"></script>
    </body>
</html>