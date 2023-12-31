<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="description" content="Neon Admin Panel" />
        <meta name="author" content="" />

        <link rel="icon" href="{{ asset('/storage/'.$provider->provider_logo) }}">

        <title>@yield('title') | {{ $provider->provider_name }}</title>

        <link rel="stylesheet" href="{{ asset('/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/font-icons/entypo/css/entypo.css') }}">
        <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic">
        <link rel="stylesheet" href="{{ asset('/css/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/neon-core.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/neon-theme.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/neon-forms.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/custom.css') }}">

        <script src="{{ asset('/js/jquery-1.11.3.min.js') }}"></script>

        <!--[if lt IE 9]><script src="'/js/ie8-responsive-file-warning.js"></script><![endif]-->
        
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>
    <body class="page-body  page-fade" data-url="http://neon.dev">

    <div class="page-container"><!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->
        
        <div class="sidebar-menu">

            <div class="sidebar-menu-inner">
                                        
                @include('layouts.navbar')
                
            </div>

        </div>

        <div class="main-content">
                    
            @include('layouts.header')
            
            <hr />	
            
            @yield('content')
            
            <!-- Footer -->
            <footer class="main">
                
                &copy; 2023 <strong>Lawu</strong>
            
            </footer>
        </div>
        
    </div>
        @yield('styles')

        <!-- Bottom scripts (common) -->
        <script src="{{ asset('/js/gsap/TweenMax.min.js') }}"></script>
        <script src="{{ asset('/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js') }}"></script>
        <script src="{{ asset('/js/bootstrap.js') }}"></script>
        <script src="{{ asset('/js/joinable.js') }}"></script>
        <script src="{{ asset('/js/resizeable.js') }}"></script>
        <script src="{{ asset('/js/neon-api.js') }}"></script>
        <script src="{{ asset('/js/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>

        @yield('scripts')

        <!-- JavaScripts initializations and stuff -->
        <script src="{{ asset('/js/neon-custom.js') }}"></script>

        <!-- Demo Settings -->
        <script src="{{ asset('/js/neon-demo.js') }}"></script>

    </body>
</html>