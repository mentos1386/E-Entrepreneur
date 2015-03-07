@extends('themes.Default.layouts.master')

@section('content')
    <style type="text/css">
        body {
            background: lightgreen;
        }
    </style>
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">

                <div class="panel panel-default">
                    <div class="panel-heading">{{ $page->name }}</div>

                    <div class="panel-body">
                        <p>{{ $page->content }}</p>
                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection
