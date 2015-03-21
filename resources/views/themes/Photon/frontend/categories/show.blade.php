@extends('themes.Photon.frontend.layouts.master')
@section('head.title')
    Category: {{ $category['name'] }}
@endsection
@section('content')
    <section id="two" class="main style1">
        <div class="container">
            <div class="row 150%">
                <div class="12u$ 12u$(medium)">
                    <header class="major">
                        <h2><span class="fa fa-sitemap"></span> {{ $category['name'] }}</h2>

                        <p>Posts found with this Category:</p>
                    </header>
                    @foreach($category['post'] as $post)
                        <h3>
                            <span class="fa fa-link"></span>
                            <a href="{{ route('post.index').'/'.$post['id'] }}">
                                {{ $post['title'] }}
                            </a>
                        </h3>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection