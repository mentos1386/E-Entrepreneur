@extends('dashboard.layouts.master')

@section('meta')
    <title>Front Page</title>
@endsection

@section('header')

    <h1 class="page-header">
        <span class="fa fa-paint-brush"></span> Front Page
        <div class="pull-right">
        </div>
    </h1>

@endsection

@section('content')

    <div class="col-md-3">
        <ul class="list-group cat-tags">
            <ul class="list-group-item list-group-item-heading">
                Supported Front Pages
            </ul>
            @foreach($appearance['front_page'] as $name => $data)
                <li class="list-group-item">
                    @if ($name == $site->theme_frontpage)
                        <span class="badge"> Selected </span>
                    @endif
                    {{ $name }}
                </li>
            @endforeach
        </ul>
    </div>

@endsection