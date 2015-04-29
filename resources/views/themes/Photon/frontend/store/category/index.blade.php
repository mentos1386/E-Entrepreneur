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

                        <div class="search width-20 l-width-100"><input type="text" placeholder="Search">
                        </div>
                        <p class="width-100">There are {{ $store->toArray()['total']}} items on sale in this
                            Category!</p>
                    </header>
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