<html>
<head>
    <title>    @yield('head.title',Settings::first()->name)</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <meta name="description" content=""/>
    <meta name="keywords" content=""/>
    <!--[if lte IE 8]>
    <script src="/Photon/public/css/ie/html5shiv.js"></script><![endif]-->
    <script src="/Photon/public/js/jquery.min.js"></script>
    <script src="/Photon/public/js/jquery.scrolly.min.js"></script>
    <script src="/Photon/public/js/skel.min.js"></script>
    <script src="/Photon/public/js/init.js"></script>
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

        <h1>{{ Settings::first()->name }}</h1>

        <p>{{ Settings::first()->description }}</p>
        <ul class="actions">
            @include('themes.Photon.layouts.menus.top')
        </ul>
    </div>
</section>

@yield('content')

<section id="footer">
    <ul class="icons">
        @include('themes.Photon.layouts.menus.bottom')


    </ul>
    <ul class="copyright">
        <li>&copy; Untitled</li>
        <li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
    </ul>
</section>

</body>
</html>