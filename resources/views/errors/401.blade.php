@extends('themes.'.Themes::about()['name'].'.frontend.layouts.master')

@section('content')

    <div class="col-md-6 col-md-offset-3">
        <section class="main style1">
            <div class="container">
                <div class="row 150%">
                    <div class="12u$ 12u$(medium)">
                        <header class="major">
                            <h2 style="color:darkred">
                                <span class="fa fa-exclamation-triangle"></span> Error 403: Unauthorized action!
                            </h2>
                        </header>
                        <p>You were trying to access site that is protected.</p>
                        <a class="special button" href="{{ route('home') }}" role="button">Home</a>

                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection