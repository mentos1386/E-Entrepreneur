@extends('themes.Photon.layouts.master')
@section('head.title')
    {{ $page['name'] }}
@endsection
@section('content')
    <section id="two" class="main style1">
        <div class="container">
            <div class="row 150%">
                <div class="12u$ 12u$(medium)">
                    <header class="major">
                        <h2>{{ $page['name'] }}</h2>
                    </header>
                    <p>{{ $page['content'] }}</p>
                </div>
            </div>
        </div>
    </section>
@endsection