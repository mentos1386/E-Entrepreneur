@extends('dashboard.layouts.master')

@section('meta')
    <title>Front Page</title>
@endsection

@section('header')

    <h1 class="page-header">
        <span class="fa fa-paint-brush"></span> Front Page <span class="fa fa-angle-right"></span> {{ $name  }}
        <div class="pull-right">
        </div>
    </h1>

@endsection

@section('content')

    {!! Form::open(['url' => route('dashboard.appearance.frontpage.store')]) !!}

    {!! Form::hidden('type', $name); !!}

    @include($view_path)

    {!! Form::close() !!}

@endsection