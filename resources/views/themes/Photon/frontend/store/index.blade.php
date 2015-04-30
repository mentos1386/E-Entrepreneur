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
                        <h2 class="width-70"><i class="fa fa-shopping-cart"></i> Welcome to the {{$site->name}} store!
                        </h2>

                        <div class="search width-30 sm-width-100 l-width-100">
                            {!! Form::open(['url' => route('store.search')]) !!}
                            <input class="search-input block" type="text" name="query" placeholder="Search store">
                            <button class="width-30 sm-width-100 block" type="submit"><i class="fa fa-search"></i>
                            </button>
                            {!! Form::close() !!}
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
                        @include('themes.Photon.frontend.store.partial.card')
                    @endforeach
                    <hr class="major" style="margin:0; display: inline-block; width: 100%;">
                    {!! $store->render() !!}
                </div>
            </div>
        </div>
    </section>
@endsection