@extends('themes.Photon.frontend.layouts.master')
@section('head.title')
    Category: {{ $category['name'] }}
@endsection
@section('content')
    <section class="main style1">
        <div class="container">
            <div class="row 150%">
                <div class="12u$ 12u$(medium)">
                    <header class="major">
                        <h2><i class="fa fa-file-text-o"></i> Posts in <strong>{{ $category['name'] }}</strong>
                            Category:</h2>
                    </header>
                    @if(empty($category['post']->toArray()))
                        <h3>All empty here!</h3>
                    @else
                        @foreach($category['post'] as $post)
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
                <div class="12u$ 12u$(medium)">
                    <header class="major">
                        <h2><i class="fa fa-shopping-cart"></i> Store items in <strong>{{ $category['name'] }}</strong>
                            Category:</h2>
                    </header>
                    @if(empty($category['store']->toArray()))
                        <h3>All empty here!</h3>
                    @else
                        @foreach($category['store'] as $store)
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