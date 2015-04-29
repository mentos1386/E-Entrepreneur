@extends('themes.Photon.frontend.layouts.master')
@section('head.title')
    {{ $page['name'] }}
@endsection
@section('content')
    <section class="main style1">
        <div class="container">
            <div class="row 150%">
                <div class="width-100">
                    <div class="wrap">
                        <header class="major">
                            <h2 class="width-100">{{ $page['name'] }}</h2>
                        </header>
                    </div>
                    <div class="markdown-content">{!! $page['content'] !!}</div>
                </div>
            </div>
        </div>
    </section>
@endsection