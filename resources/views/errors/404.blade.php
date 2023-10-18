<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="description" content="Neon Admin Panel" />
        <meta name="author" content="" />

        <link rel="icon" href="{{ asset('/images/favicon.ico') }}">

        <title>Error 404 | Halaman Tidak Ditemukan</title>

        <link rel="stylesheet" href="{{ asset('/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/font-icons/entypo/css/entypo.css') }}">
        <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic">
        <link rel="stylesheet" href="{{ asset('/css/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/neon-core.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/neon-theme.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/neon-forms.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/custom.css') }}">

        <script src="{{ asset('/js/jquery-1.11.3.min.js') }}"></script>
    </head>

    <body class="login">
        <div class="main-content">
            <div class="page-error-404">
            <div class="error-symbol">
                <i class="entypo-attention"></i>
            </div>
            <div class="error-text">
                <h2>404</h2>
                <p>Halaman Tidak Ditemukan!</p>
            </div>
            <hr />
            <div class="error-text">
                <a href="/" class="btn btn-danger">HOME</a>
                <a href="{{ url()->previous() }}" class="btn btn-primary">KEMBALI</a>
            </div>
        </div>

        <!-- Bottom scripts (common) -->
        <script src="{{ asset('/js/gsap/TweenMax.min.js') }}"></script>
        <script src="{{ asset('/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js') }}"></script>
        <script src="{{ asset('/js/bootstrap.js') }}"></script>
        <script src="{{ asset('/js/joinable.js') }}"></script>
        <script src="{{ asset('/js/resizeable.js') }}"></script>
        <script src="{{ asset('/js/neon-api.js') }}"></script>

        <!-- Imported scripts on this page -->
        <script src="{{ asset('/js/neon-chat.js') }}"></script>

        <!-- JavaScripts initializations and stuff -->
        <script src="{{ asset('/js/neon-custom.js') }}"></script>

        <!-- Demo Settings -->
        <script src="{{ asset('/js/neon-demo.js') }}"></script>
    </body>
</html>