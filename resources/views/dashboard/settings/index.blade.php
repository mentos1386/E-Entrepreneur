@extends('dashboard.layouts.master')

@section('meta')
    <title>Settings</title>
@endsection

@section('header')

    <h1 class="page-header">
        <span class="fa fa-gear"></span> Settings
        <div class="pull-right">
        </div>
    </h1>

@endsection

@section('content')
    <div class="col-md-3">
        <ul class="list-group cat-tags">
            <ul class="list-group-item list-group-item-heading">
                CMS Info:
            </ul>
            <li class="list-group-item">
                <span class="badge">Alpha 1.2</span>
                Version
            </li>
        </ul>
    </div>

    <div class="col-md-3">
        <ul class="list-group cat-tags">
            <ul class="list-group-item list-group-item-heading">
                Theme Info:
            </ul>
            <a href="{{ $theme['author_url'] }}" class="list-group-item">
                <span class="badge">{{ $theme['author'] }}</span>
                Author
            </a>
            <li class="list-group-item">
                <span class="badge">{{ $theme['description'] }}</span>
                Description
            </li>
            <li class="list-group-item">
                <span class="badge">{{ $theme['version'] }}</span>
                Version
            </li>
        </ul>
    </div>

    <div class="col-md-4">
        <ul class="list-group cat-tags">
            <ul class="list-group-item list-group-item-heading">
                Site settings:
            </ul>
        </ul>
        {!! Form::model($app, ['method' => 'PUT','route' => ['dashboard.settings.update', 1]]) !!}

        <div class="form-group">
            {!! Form::label('name', 'Name:') !!}
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('description', 'Description:') !!}
            {!! Form::text('description', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Save', array('class' => 'btn btn-md btn-success')) !!}
        </div>

        {!! Form::close() !!}

    </div>
@endsection
