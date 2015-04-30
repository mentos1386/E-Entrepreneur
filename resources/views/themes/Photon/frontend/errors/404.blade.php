@extends('themes.Photon.frontend.layouts.master')
@section('head.title')
    Error 404
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
                                    <span class="fa fa-exclamation-triangle"></span> Error 404: File not found!
                                </h2>
                            </div>
                        </header>
                        <p>We could not find the page on our servers.</p>
                        <a class="special button" href="{{ route('home') }}" role="button">Home</a>

                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection