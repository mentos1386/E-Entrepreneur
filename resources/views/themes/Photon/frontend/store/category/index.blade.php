@extends('themes.Photon.frontend.layouts.master')
@section('head.title')
    Store > {{ $category['name'] }}
@endsection
@section('content')
    <section class="main style2">
        <div class="container">
            <div class="row 150%">
                <div class="width-100">
                    <header class="major">
                        <h2 class="width-80">
                            <a href="/store/" title="Back"><i class="fa fa-chevron-circle-left"></i> </a>
                            | <i class="fa fa-shopping-cart"></i> Store items in
                            <strong>{{ $category['name'] }}</strong> Category:
                        </h2>

                        <div class="search width-20 sm-width-100 "><input type="text" placeholder="Search">
                        </div>
                        <p class="width-100">There are {{ $store->toArray()['total']}} items on sale in this
                            Category!</p>
                    </header>
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