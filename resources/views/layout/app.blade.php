<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    @if (getenv('APP_ENV') !== 'local')
        <!-- Google Tag Manager -->
        <script>(function (w, d, s, l, i) {
                w[l] = w[l] || [];
                w[l].push({
                    'gtm.start':
                        new Date().getTime(), event: 'gtm.js'
                });
                var f                          = d.getElementsByTagName(s)[0],
                    j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : '';
                j.async = true;
                j.src =
                    'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
                f.parentNode.insertBefore(j, f);
            })(window, document, 'script', 'dataLayer', 'GTM-N8M8ND9');</script>
        <!-- End Google Tag Manager -->
    @endif

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/img/favicon.png" rel="icon" data-n-head="true" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,600,700,900&amp;amp;subset=cyrillic" rel="stylesheet" data-n-head="true">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Oggetto EDC — speak up. Be heard.</title>

    <!-- Styles -->
    @section('head')
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @show
</head>
<body>

<!-- Google Tag Manager (noscript) -->
    <noscript>
        <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-N8M8ND9" height="0" width="0" style="display:none;visibility:hidden"></iframe>
    </noscript>
<!-- End Google Tag Manager (noscript) -->


<main class="container main-container">
    <header class="header">
        <div class="logo">
            <a class="logo__link" href="{{ url('/') }}">
                <img class="logo__img" srcset="/img/logo.png" />
            </a>
        </div>
        <div class="header-links">
            <a class="header-link" href="{{ route('articles.create') }}">
                Добавить статью
            </a>
        </div>
    </header>

    @yield('content')
</main>

<div class="footer container" >
    <div class="footer__i">

    </div>
</div>

<!-- Scripts -->
@section('footer')
    <script src="{{ asset('js/app.js') }}"></script>
@show

@if (getenv('APP_ENV') === 'local')
    <script id="__bs_script__">//<![CDATA[
        document.write("<script async src='http://localhost:3000/browser-sync/browser-sync-client.js?v=2.18.6'><\/script>".replace("HOST", location.hostname));
        //]]>
    </script>
@endif

@yield('scripts')

</body>
</html>
