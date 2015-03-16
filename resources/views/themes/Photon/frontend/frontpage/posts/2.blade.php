@extends('themes.Photon.frontend.layouts.master')

@section('content')

    @if($data['posts']['order'] == 'dec')

        @foreach($posts_dec as $post)

            <section class="main style2">
                @include('themes.Photon.frontend.frontpage.posts.partial.post')
            </section>

        @endforeach

    @elseif($data['posts']['order'] == 'asc')

        @foreach($posts_asc as $post)

            <section class="main style2">
                @include('themes.Photon.frontend.frontpage.posts.partial.post')
            </section>

        @endforeach

    @endif

@endsection