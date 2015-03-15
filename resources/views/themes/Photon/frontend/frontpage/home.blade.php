@extends('themes.Photon.frontend.layouts.master')

@section('content')

    @if($site->theme_frontpage == 'builders')

        @foreach($items as $item)

            @if($item->type == "images")
                @include('themes.Photon.frontend.frontpage.builder.images', ['data' => json_decode($item['data'], true)])
            @elseif($item->type == "gallery")
                @include('themes.Photon.frontend.frontpage.builder.gallery', ['data' => json_decode($item['data'], true)])
            @elseif($item->type == "text")
                @include('themes.Photon.frontend.frontpage.builder.text', ['data' => json_decode($item['data'], true)])
            @elseif($item->type == "buttons")
                @include('themes.Photon.frontend.frontpage.builder.buttons', ['data' => json_decode($item['data'], true)])
            @endif

        @endforeach

    @elseif($site->theme_frontpage == 'posts')
        @include('themes.Photon.frontend.frontpage.posts.show')
    @endif

@endsection