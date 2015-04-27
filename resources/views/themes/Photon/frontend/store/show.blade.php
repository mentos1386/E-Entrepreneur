@extends('themes.Photon.frontend.layouts.master')
@section('head.title')
    {{ $store['name'] }}
@endsection
@section('content')
    <section class="main style1">
        <div class="container">
            <div class="row 150%">
                <div class="width-100">
                    <header class="major">
                        <div class="wrap">
                            <h2 style="display:inline-block;">
                                <span class="fa fa-shopping-cart"></span>
                                {{ $store['name'] }}
                            </h2>

                            <h2 style="display:inline-block;padding-left: 10px">
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star-half-full"></span>
                                <-DECOY
                            </h2>

                            <h2 style="display:inline-block;float:right;">
                                <button class="button special small">{{ $store['price'] }}€ | Order</button>
                            </h2>
                        </div>
                    </header>
                    <p>{{ $store['description'] }}</p>
                    <ul class="tags">
                        @foreach($store['tags'] as $tag)
                            <li><span class="fa fa-tag"></span>
                                <a href="/tag/{{ $tag['id'] }}">
                                    {{ $tag['name'] }}
                                </a>
                            </li>
                        @endforeach
                        @foreach($store['categories'] as $category)
                            <li><span class="fa fa-sitemap"></span>
                                <a href="/category/{{ $category['id'] }}">
                                    {{ $category['name'] }}
                                </a>
                            </li>
                        @endforeach
                    </ul>

                    <div id="images" class="carousel slide" data-ride="carousel" style="max-height: 500px">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <?php $imgcount = 0 ?>
                            @foreach($images as $image)
                                <li data-target="#images" data-slide-to="{{ $imgcount }}" class="
                                @if($imgcount == 0)
                                    active
                                @endif
                                        ">
                                    <?php $imgcount++ ?>
                            @endforeach
                        </ol>

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">
                            <?php $imgcount = 0 ?>
                            @foreach($images as $image)
                                <div class="item
                                @if($imgcount == 0)
                                    active
                                @endif
                                        ">
                                    <img src="{{ $image['url'] }}" alt="...">

                                    <div class="carousel-caption" style="font-size: 1.25em;font-weight: 400;top:0;">
                                        <p style="padding: 5px; background: #444444; display: inline-block">{{ $image['text'] }}</p>
                                    </div>
                                </div>
                                <?php $imgcount++ ?>
                            @endforeach
                        </div>

                        <!-- Controls -->
                        <a class="left carousel-control" href="#images" role="button" data-slide="prev"
                           style="padding-top: 230px; font-size: 1.5em;">
                            <span class="fa fa-chevron-left" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#images" role="button" data-slide="next"
                           style="padding-top: 230px; font-size: 1.5em;">
                            <span class="sr-only">Next</span>
                            <span class="fa fa-chevron-right" aria-hidden="true"></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <hr class="major" style="margin:0;">
    <section class="main style1">
        <div class="container">
            <div class="row 150%">
                <div class="width-100" id="reviews">
                    <header>
                        <h2><span class="fa fa-comments-o"></span> Reviews | {{ count($store['reviews']) }}</h2>
                    </header>

                    @if (empty($store['reviews']->toArray()))
                        <p style="text-align: center;">It's very lonely here, try writing a review.</p>
                    @else
                        <ul class="comments">
                            @foreach($store['reviews'] as $review)
                                <li class="comment">
                                    <div class="gravatar">
                                        <img src="https://secure.gravatar.com/avatar/{{
                                            md5(strtolower(
                                            ($review['email'] != null) ? $review['email'] : $review['user']['email']
                                            ))
                                        }}?s=75">
                                    </div>
                                    <div class="wrap">
                                        <div class="header">
                                            <h4 class="name">
                                                {{
                                                ($review['name'] != null) ? $review['name'] : $review['user']['username']
                                                }}
                                                |
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star-half-full"></span>
                                                <- TODO!
                                                <!-- TODO: YEAH DO THIS S**T !-->
                                            </h4>
                                            <h4 class="date">

                                                {{ date('H:i | j M Y' , strtotime($review['created_at'])) }}
                                            </h4>
                                        </div>
                                        <div class="content">
                                            <p>{{ $review['comment'] }}</p>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    @endif

                    <header>
                        <h2><span class="fa fa-comment-o"></span> Write a Review</h2>
                    </header>

                    <div class="post-comment" style="width: 100%">

                        @if( Auth::guest() )
                            @include('themes.Photon.frontend.store.reviews.guest')
                        @else
                            @include('themes.Photon.frontend.store.reviews.user')
                        @endif

                    </div>

                </div>
            </div>
        </div>
    </section>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
@endsection
