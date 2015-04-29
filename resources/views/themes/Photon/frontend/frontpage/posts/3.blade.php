@extends('themes.Photon.frontend.layouts.master')

@section('content')

    @if($data['posts']['order'] == 'dec')

        <?php $cnt = 0; ?>
        @foreach($posts_dec as $post)

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
                            {!! $posts_dec->render() !!}
                        </section>

                        @elseif($data['posts']['order'] == 'asc')

                            <?php $cnt = 0; ?>

                            @foreach($posts_asc as $post)

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
                                                {!! $posts_asc->render() !!}
                                            </section>
            @endif


@endsection