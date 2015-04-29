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
                            <h2 class="store-header">
                                <div class="width-70 block">
                                    <a href="{{ URL::previous() }}" title="Back"><i
                                                class="fa fa-chevron-circle-left"></i> </a>
                                    |
                                    <span class="fa fa-shopping-cart"></span>
                                    {{ $store['name'] }}
                                    |
                                    <span class="store-rating">
                                        {!! Themes::reviews_ratio($reviewRatio) !!}
                                    </span>
                                </div>
                                <div class="width-30 sm-width-100 block buy-header">
                                    <button class="button special small buy-button">{{ $store['price'] }}€ | Order
                                    </button>
                                </div>
                            </h2>
                        </div>
                    </header>
                    <div class="markdown-content">{!! $store['description'] !!}</div>
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
                                <a href="/store/category/{{ $category['id'] }}">
                                    {{ $category['name'] }}
                                </a>
                            </li>
                        @endforeach
                    </ul>

                    @if(!empty($images))
                        <div id="images" class="carousel slide" data-ride="carousel"
                             style="max-height: 500px; background: #3f3f3f">
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
                                    </li>
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
                                        <div class="fill" style="background-image: url({{ $image['url'] }})"></div>

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
                    @endif
                </div>
            </div>
        </div>
    </section>
    <hr class="major" style="margin:0;">
    <section class="main style2">
        <div class="container">
            <div class="row 150%">
                <div class="width-100" id="reviews">
                    <header>
                        <h2><span class="fa fa-comments-o"></span> Reviews | {{ count($store['reviews']) }}</h2>
                    </header>

                    @if (count($reviews) == 0)
                        <p style="text-align: center;">It's very lonely here, try writing a review.</p>
                    @else
                        <ul class="comments">
                            @foreach($reviews as $review)
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
                                                {!! Themes::reviews_ratio($review['rating']) !!}
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

                            {!! $reviews->fragment('reviews')->render() !!}

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
