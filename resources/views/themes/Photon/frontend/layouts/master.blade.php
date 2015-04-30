<html>
<head>
    <title>@yield('head.title', $site->name )</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <meta name="description" content="{{ $site->description }}"/>
    <meta name="keywords" content="site store comments posts news reviews"/>
    <!--[if lte IE 8]>
    <script src="/Photon/public/css/ie/html5shiv.js"></script>
    <![endif]-->
    <script src="/Photon/public/js/jquery.min.js"></script>
    <script src="/Photon/public/js/jquery.scrolly.min.js"></script>
    <script src="/Photon/public/js/skel.min.js"></script>
    <!--<script src="/Photon/public/js/init.js"></script> Stupid me, didn't know how to use this :/ -->
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
    <section id="user-header">
        @if(Auth::guest())
            <div class="guest">
                <div class="buttons">
                    <a href="{{route('login')}}" class="button special"> <i class="fa fa-sign-in"></i> Login</a>
                    <a href="{{route('register')}}" class="button">Register</a>
                    @if(Session::has('store.cart'))
                        <a href="{{route('store.cart')}}" class="button"> <i class="fa fa-shopping-cart"></i>
                            Cart ({{count(Session::get('store.cart'))}})
                        </a>
                    @endif
                </div>
            </div>
        @else
            <div class="user">
                <div class="gravatar">
                    <a href="" title="Profile">
                        <img src="https://secure.gravatar.com/avatar/{{md5(strtolower(Auth::user()->email))}}?s=75">

                        <div class="hover">
                            <div class="center">
                                <i class="fa fa-user"></i>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="buttons">
                    <a href="{{route('logout')}}" class="button special"> <i class="fa fa-sign-out"></i> Sign out</a>
                    <a href="{{route('store.cart')}}" class="button"> <i class="fa fa-shopping-cart"></i>
                        Cart ({{count(Session::get('store.cart'))}})
                    </a>
                </div>
            </div>
        @endif
    </section>
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