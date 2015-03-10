@extends('dashboard.layouts.master')

@section('meta')
    <title>Front Page</title>
@endsection

@section('header')

    <h1 class="page-header">
        <span class="fa fa-paint-brush"></span> Create {{ $name  }}
        <div class="pull-right">
        </div>
    </h1>

@endsection

@section('content')

    @include($view_path)

@endsection