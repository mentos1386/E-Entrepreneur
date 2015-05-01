@extends('themes.Photon.frontend.layouts.master')
@section('head.title')
    Posts
@endsection
@section('content')

    <?php $cnt = 0; ?>
    @foreach($posts as $post)

        @if($cnt % 2 == 0)
            <section class="main style1">
                @else
                    <section class="main style2">
                        @endif

                        @include('themes.Photon.frontend.frontpage.posts.partial.post')
                    </section>
                    <hr class="major" style="margin:0;">

                    <?php $cnt++; ?>
                    @endforeach
                    <section class="main style2">
                        {!! $posts->render() !!}
                    </section>

@endsection