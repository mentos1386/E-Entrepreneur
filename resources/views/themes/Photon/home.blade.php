@extends('themes.Photon.frontend.layouts.master')

@section('content')

    @foreach($posts as $post)

        <section class="main style1">
            <div class="container">
                <div class="row 150%">
                    <div class="12u 12u$(medium)">
                        <header class="major">
                            <a href="{{ Themes::postUrl($post['id']) }}"><h2>{{ $post['title'] }}</h2></a>
                        </header>
                        <p>{{ $post['body'] }}</p>
                    </div>
                </div>
            </div>
        </section>

    @endforeach

@endsection