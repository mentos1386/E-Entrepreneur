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
            @elseif($item->type == "maps")
                @include('themes.Photon.frontend.frontpage.builder.maps', ['data' => json_decode($item['data'], true)])
            @endif

        @endforeach

    @elseif($site->theme_frontpage == 'posts')

        @foreach($items as $item)

            @if($item->type == "posts settings")

                <?php $data = json_decode($item['data'], true); ?>

                @if($data['style'] == '1')
                    @include('themes.Photon.frontend.frontpage.posts.1', ['data' => $data])
                @elseif($data['style'] == '2')
                    @include('themes.Photon.frontend.frontpage.posts.2', ['data' => $data])
                @elseif($data['style'] == '3')
                    @include('themes.Photon.frontend.frontpage.posts.3', ['data' => $data])
                @endif

            @endif

        @endforeach

    @endif

@endsection