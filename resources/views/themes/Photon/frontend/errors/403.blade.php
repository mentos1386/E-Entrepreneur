@extends('themes.Photon.frontend.layouts.master')
@section('head.title')
    Error 403
@endsection
@section('content')
    <div class="col-md-6 col-md-offset-3">
        <section class="main style1">
            <div class="container">
                <div class="row 150%">
                    <div class="width-100">
                        <header class="major">
                            <div class="wrap">
                                <h2 style="color:darkred">
                                    <span class="fa fa-exclamation-triangle"></span> Error 403: Unauthorized action!
                                </h2>
                            </div>
                        </header>
                        <p>You were trying to access site that is protected.</p>
                        <a class="special button" href="{{ route('home') }}" role="button">Home</a>

                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection