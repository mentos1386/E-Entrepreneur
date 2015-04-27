<html>
<head>
    <title>    @yield('head.title', $site->name )</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <meta name="description" content=""/>
    <meta name="keywords" content=""/>
    <!--[if lte IE 8]>
    <script src="/Photon/public/css/ie/html5shiv.js"></script><![endif]-->
    <script src="/Photon/public/js/jquery.min.js"></script>
    <script src="/Photon/public/js/jquery.scrolly.min.js"></script>
    <script src="/Photon/public/js/skel.min.js"></script>
    <script src="/Photon/public/js/init.js"></script>
    <script src="/Photon/public/js/masonry.pkgd.min.js"></script>
    <link rel="stylesheet" href="/Photon/public/css/skel.css"/>
    <link rel="stylesheet" href="/Photon/public/css/style.css"/>
    <link rel="stylesheet" href="/Photon/public/css/style-xlarge.css"/>
    <!--[if lte IE 9]>
    <link rel="stylesheet" href="/Photon/public/css/ie/v9.css"/><![endif]-->
    <!--[if lte IE 8]>
    <link rel="stylesheet" href="/Photon/public/css/ie/v8.css"/><![endif]-->

</head>
<body>

<!-- Header -->
<section id="header">
    <div class="inner">
        <span class="icon major fa-cloud"></span>

        <a href="{{ Themes::home() }}"><h1>{{ $site->name }}</h1></a>

        <p>{{ $site->description }}</p>
        <ul class="actions">
            @include('themes.Photon.frontend.layouts.menus.top')
        </ul>
    </div>
</section>

@yield('content')

<section id="footer">
    <ul class="icons">

        @include('themes.Photon.frontend.layouts.menus.bottom')

    </ul>
    <ul class="copyright">
        <li>&copy; {{ $site->name }}</li>
        <li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
        <li>Created by <a href="https://twitter.com/mentos1386">Mentos1386</a>.</li>
    </ul>
</section>

</body>
</html>