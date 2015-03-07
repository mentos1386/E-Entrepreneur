@extends('themes.frontend.layouts.master')

@section('content')

    <div class="col-md-6 col-md-offset-3">
        <div class="jumbotron">
            <h2 class="text-danger"><span class="fa fa-exclamation-triangle"></span> Error 403: Unauthorized action!
            </h2>

            <p>You were trying to access site that is protected.</p>

            <p><a class="btn btn-primary btn-lg" href="/" role="button">Home</a></p>
    </div>
</div>

@endsection