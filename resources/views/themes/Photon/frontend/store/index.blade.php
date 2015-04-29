@extends('themes.Photon.frontend.layouts.master')
@section('head.title')
    Store
@endsection
@section('content')
    <section class="main style2">
        <div class="container">
            <div class="row 150%">
                <div class="width-100">
                    <header class="major">
                        <h2><i class="fa fa-shopping-cart"></i> Welcome to the {{$site->name}} store!</h2>

                        <div class="search width-20 sm-width-100 xs-width-100"><input type="text" placeholder="Search">
                        </div>
                        <p class="width-100">There are {{ $store->toArray()['total']}} items on sale!</p>
                    </header>
                    <div class="store-categories">
                        <strong>Categories:</strong>
                        <ul class="store-categories-list">
                            @foreach($categories as $category)
                                <li><a href="/store/category/{{$category['id']}}">{{$category['name']}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    @foreach($store as $item)
                        <div class="width-25 block store-card">
                            <span class="image fit">
                                <a href="{{ route('store.index') }}/{{$item['id']}}">
                                    <img class="store-image-thumbnail"
                                         src="{{ json_decode($item['images'], true)[0]['url'] }}"
                                         alt="{{ $item['title'] }}"/>
                                </a>
                            </span>

                            <h3 class="store-rating"><a
                                        href="{{ route('store.index') }}/{{$item['id']}}">{{ $item['name'] }}</a></h3>

                            <p>{!! Themes::reviews_ratio($item['reviewRatio']) !!}</p>

                            <p>{!! Themes::first_word($item['description'],$item['id'],20) !!}</p>

                            <ul class="actions store-buttons width-100">
                                <li class="width-50 block"><a href="{{ route('store.index') }}/{{$item['id']}}"
                                                              class="button width-100">Details</a></li>
                                <li class="buy-button width-50 block"><a href=""
                                                                         class="button special width-100">{{$item['price']}}
                                        €</a></li>
                            </ul>
                        </div>
                    @endforeach
                    {!! $store->render() !!}
                </div>
            </div>
        </div>
    </section>
@endsection