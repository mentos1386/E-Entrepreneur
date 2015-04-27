@extends('themes.Photon.frontend.layouts.master')
@section('head.title')
    {{ $post['title'] }}
@endsection
@section('content')
    <section class="main style1">
        <div class="container">
            <div class="row 150%">
                <div class="12u$ 12u$(medium)">
                    <header class="major">
                        <div class="wrap">
                            <h2 style="display:inline-block;">
                                <span class="fa fa-file-text-o"></span>
                                {{ $post['title'] }}
                            </h2>

                            <h2 style="display:inline-block;float:right;">{{ date('j M Y' , strtotime($post['created_at'])) }}</h2>
                        </div>
                    </header>
                    <p>{{ $post['body'] }}</p>
                    <ul class="tags">
                        @foreach($post['tag'] as $tag)
                            <li><span class="fa fa-tag"></span>
                                <a href="/tag/{{ $tag['id'] }}">
                                    {{ $tag['name'] }}
                                </a>
                            </li>
                        @endforeach
                        @foreach($post['category'] as $category)
                            <li><span class="fa fa-sitemap"></span>
                                <a href="/category/{{ $category['id'] }}">
                                    {{ $category['name'] }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                    <p class="author">{{ $post['user']['username'] }}</p>
                </div>
            </div>
        </div>
    </section>
    <hr class="major" style="margin:0;">
    <section class="main style1">
        <div class="container">
            <div class="row 150%">
                <div class="width-100" id="comments">
                    <header>
                        <h2><span class="fa fa-comments-o"></span> Comments | {{ count($post['comment']) }}</h2>
                    </header>

                    @if (empty($post['comment']->toArray()))
                        <p style="text-align: center;">It's very lonely here, try posting a comment.</p>
                    @else
                        <ul class="comments">
                            @foreach($post['comment'] as $comment)
                                <li class="comment">
                                    <div class="gravatar">
                                        <img src="https://secure.gravatar.com/avatar/{{
                                            md5(strtolower(
                                            ($comment['email'] != null) ? $comment['email'] : $comment['user']['email']
                                            ))
                                        }}?s=75">
                                    </div>
                                    <div class="wrap">
                                        <div class="header">
                                            <h4 class="name">
                                                {{
                                                ($comment['name'] != null) ? $comment['name'] : $comment['user']['username']
                                                }}
                                            </h4>
                                            <h4 class="date">
                                                {{ date('H:i | j M Y' , strtotime($comment['created_at'])) }}
                                            </h4>
                                        </div>
                                        <div class="content">
                                            <p>{{ $comment['comment'] }}</p>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    @endif

                    <header>
                        <h2><span class="fa fa-comment-o"></span> Post a Comment</h2>
                    </header>

                    <div class="post-comment" style="width: 100%">

                        @if( Auth::guest() )
                            @include('themes.Photon.frontend.post.comments.guest')
                        @else
                            @include('themes.Photon.frontend.post.comments.user')
                        @endif

                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection