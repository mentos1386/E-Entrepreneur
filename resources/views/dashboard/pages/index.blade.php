@extends('dashboard.layouts.master')

@section('meta')
    <title>Posts</title>
@endsection

@section('header')

    <h1 class="page-header">
        <span class="fa fa-server"></span> Pages
        <div class="pull-right">
            <a href=" {{ route('dashboard.pages.create') }}" type="button" class="btn btn-default">
                <span class="fa fa-plus-circle"></span> Create
            </a>
        </div>
    </h1>

@endsection

@section('content')

    <table class="table">
        <thead>
        <th>#</th>
        <th>Name</th>
        <th>Url</th>
        <th>Content</th>
        <th>Created at</th>
        <th>Type</th>
        </thead>
        @foreach($pages as $page)
            <tbody>
            <td>{{ $page['id'] }}</td>
            <td><a href="{{ route('dashboard.pages.index').'/'.$page['id'] }}">{{ $page['name'] }}</a></td>
            <td><a href="{{ route('home').'/'.$page['url'] }}">{{ $page['url'] }}</a></td>
            <td>{{ $page['content'] }}</td>
            <td>{{ $page['created_at'] }}</td>
            <td>{{ $page['type'] }}</td>
            </tbody>
        @endforeach
    </table>

    {!! $pages->render() !!}

@endsection