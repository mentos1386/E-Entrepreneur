@extends('dashboard.layouts.master')

@section('meta')
    <title>Posts</title>
@endsection

@section('header')

    <h1 class="page-header">
        <span class="fa fa-pencil"></span> Posts
        <div class="pull-right">
            <a href=" {{ route('dashboard.blog.posts.create') }}" type="button" class="btn btn-default">
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
        <th>Body</th>
        <th>Created at</th>
        <th>Created by</th>
        <th>Comments</th>
        </thead>
        @foreach($posts as $post)
            <tbody>
            <td>{{ $post['id'] }}</td>
            <td><a href="{{ route('dashboard.blog.posts.index').'/'.$post['id'] }}">{{ $post['title'] }}</a></td>
            <td>{{ $post['body'] }}</td>
            <td>{{ $post['created_at'] }}</td>
            <td>
                <a href="{{ route('dashboard.users.index').'/'.$post['user']['id'] }}">{{ $post['user']['username'] }}</a>
            </td>
            <td>{{ count($post['comments']) }}</td>
            </tbody>
        @endforeach
    </table>


    {!! $posts->render() !!}
@endsection