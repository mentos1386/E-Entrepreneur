@extends('themes.Photon.frontend.layouts.master')
@section('head.title')
    Tag: {{ $tag['name'] }}
@endsection
@section('content')
    <section class="main style1">
        <div class="container">
            <div class="row 150%">
                <div class="width-100">
                    <header class="major">
                        <h2 class="width-100"><i class="fa fa-file-text-o"></i> Posts with
                            <strong>{{ $tag['name'] }}</strong> Tag:</h2>
                    </header>
                    @if(empty($tag['post']->toArray()))
                        <h3>All empty here!</h3>
                    @else
                        @foreach($tag['post'] as $post)
                            <h3>
                                <span class="fa fa-link"></span>
                                <a href="{{ route('post.index').'/'.$post['id'] }}">
                                    {{ $post['title'] }}
                                </a>
                            </h3>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </section>
    <section class="main style1">
        <div class="container">
            <div class="row 150%">
                <div class="width-100">
                    <header class="major">
                        <h2 class="width-100"><i class="fa fa-shopping-cart"></i> Store items with
                            <strong>{{ $tag['name'] }}</strong>
                            Tag:</h2>
                    </header>
                    @if(empty($tag['store']->toArray()))
                        <h3>All empty here!</h3>
                    @else
                        @foreach($tag['store'] as $store)
                            @if($store['active'] == 1)
                                <h3>
                                    <span class="fa fa-link"></span>
                                    <a href="{{ route('store.index').'/'.$store['id'] }}">
                                        {{ $store['name'] }}
                                    </a>
                                </h3>
                            @endif
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection