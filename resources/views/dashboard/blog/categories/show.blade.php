@extends('dashboard.layouts.master')

@section('meta')
    <title>{{ $category['name'] }}</title>
@endsection

@section('header')

    <h1 class="page-header">
        <span class="fa fa-sitemap"></span> Category: {{ $category['name'] }}
        <div class="pull-right">
            <a href=" {{ route('dashboard.blog.categories.index').'/'.$category['id'].'/edit' }}" type="button"
               class="btn btn-default">
                <span class="fa fa-pencil"></span> Edit
            </a>
            <a href=" {{ route('dashboard.blog.categories.index').'/'.$category['id'].'/delete' }}" type="button"
               class="btn btn-default">
                <span class="fa fa-minus-circle"></span> Delete
            </a>
        </div>
    </h1>

@endsection

@section('content')

    <div class="col-md-9">
        <div class="well">{{ $category['comment'] }}</div>
    </div>

    <div class="col-md-9">
        <h2 class="sub-header">Posts using this Category</h2>
        <table class="table">
            <thead>
            <th>#</th>
            <th>Name</th>
            <th>Body</th>
            <th>Created by</th>
            </thead>
            @foreach($category->post->toArray() as $post)
                <tbody>
                <td>{{ $post['id'] }}</td>
                <td><a href="{{ route('dashboard.blog.posts.index').'/'.$post['id'] }}">{{ $post['title'] }}</a></td>
                <td>{{ $post['body'] }}</td>
                <td>
                    <a href="{{ route('dashboard.users.index').'/'.$post['user']['id'] }}">{{ $post['user']['username'] }}</a>
                </td>
                </tbody>
            @endforeach
        </table>
    </div>


@endsection