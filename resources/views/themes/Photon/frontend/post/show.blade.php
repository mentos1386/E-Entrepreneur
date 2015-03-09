@extends('themes.Photon.frontend.layouts.master')
@section('head.title')
    {{ $post['title'] }}
@endsection
@section('content')
    <section id="two" class="main style1">
        <div class="container">
            <div class="row 150%">
                <div class="12u$ 12u$(medium)">
                    <header class="major">
                        <h2>{{ $post['title'] }}</h2>
                    </header>
                    <p>{{ $post['body'] }}</p>
                </div>
            </div>
        </div>
    </section>
@endsection