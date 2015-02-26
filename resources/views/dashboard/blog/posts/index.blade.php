@extends('dashboard.layouts.master')

@section('meta')
    <title>Posts</title>
@endsection

@section('content')

    <h1 class="page-header">
        <span class="fa fa-pencil"></span> Posts
        <div class="pull-right">
            <a href=" {{ route('dashboard.blog.posts.create') }}" type="button" class="btn btn-default">
                <span class="fa fa-plus-circle"></span> Create
            </a>
        </div>
    </h1>

    <table class="table">
        <thead>
        <th>#</th>
        <th>Name</th>
        <th>Body</th>
        <th>Created at</th>
        </thead>
        @foreach($posts as $post)
            <tbody>
            <td>{{ $post['id'] }}</td>
            <td><a href="{{ route('dashboard.blog.posts.index').'/'.$post['id'] }}">{{ $post['title'] }}</a></td>
            <td>{{ $post['body'] }}</td>
            <td>{{ $post['created_at'] }}</td>
            </tbody>
        @endforeach
    </table>


    {!! $posts->render() !!}
@endsection