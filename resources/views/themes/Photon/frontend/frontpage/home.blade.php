@extends('themes.Photon.frontend.layouts.master')

@section('content')

    @if($site->theme_frontpage = 'builders')

        @foreach($items as $item)

            @if($item->type == "image")
                @include('themes.Photon.frontend.frontpage.builder.images')
            @elseif($item->type == "form")
                @include('themes.Photon.frontend.frontpage.builder.form')
            @endif

        @endforeach

    @elseif($site->theme_frontpage = 'posts')
        @include('themes.Photon.frontend.frontpage.posts.show')
    @endif

@endsection