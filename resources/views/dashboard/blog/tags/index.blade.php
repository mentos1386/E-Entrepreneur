@extends('dashboard.layouts.master')

@section('meta')
    <title>Tags</title>
@endsection

@section('header')

    <h1 class="page-header">
        <span class="fa fa-tags"></span> Tags
        <div class="pull-right">
            <a href=" {{ route('dashboard.blog.tags.create') }}" type="button" class="btn btn-default">
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
        <th>Comment</th>
        </thead>
        @foreach($tags as $tag)
            <tbody>
            <td>{{ $tag['id'] }}</td>
            <td><a href="{{ route('dashboard.blog.tags.index').'/'.$tag['id'] }}">{{ $tag['name'] }}</a></td>
            <td>{{ $tag['comment'] }}</td>
            </tbody>
        @endforeach
    </table>


    {!! $tags->render() !!}
@endsection