<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width, initial-scale=1">

    @yield('meta')

    <!-- Bootstrap CDN -->
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome CDN -->
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    {!! HTML::style('dashboard_css/dashboard.css') !!}

</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            {!! HTML::linkRoute('dashboard', Settings::first()->name, null, array( 'class' => 'navbar-brand' ))!!}
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown navbar-user">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        {!! Gravatar::get(Auth::user()->email, '40') !!}
                        {!! Auth::user()->username !!}
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li class="divider"></li>
                        <li>{!! HTML::linkRoute('logout', 'Logout') !!}</li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">

            @include('dashboard.layouts.sidebar')

            <div class="footer">
                <p class="text-center">
                    Created by <a href="https://twitter.com/mentos1386">Mentos1386</a>.
                    Free for everyone! All rights reserved.
                    <br>
                    <a href="https://github.com/mentos1386/E-Entrepreneur/"><span class="fa fa-github"></span></a>
                </p>
            </div>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

            @yield('header')

            @include('dashboard.layouts.alerts')

            @yield('content')

        </div>
    </div>
</div>


@yield('scripts')
<!-- jQuery -->
<script src="//code.jquery.com/jquery.js"></script>
<!-- Bootstrap JavaScript -->
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<!-- Better selects -->
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>
<link href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css" rel="stylesheet">
<script type="text/javascript">
    $(document).ready(function () {
        $('select').selectpicker();
    });
</script>

</body>
</html>