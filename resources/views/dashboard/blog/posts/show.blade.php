@extends('dashboard.layouts.master')

@section('meta')
    <title>{{ $post['title'] }}</title>
@endsection

@section('header')

    <h1 class="page-header">
        <span class="fa fa-pencil"></span> Post: {{ $post['title'] }}
        <div class="pull-right">
            <div class="btn-group" role="group">
                <a href=" {{ route('dashboard.blog.posts.index').'/'.$post['id'].'/edit' }}" type="button" class="btn btn-default">
                    <span class="fa fa-pencil"></span> Edit
                </a>
                <a href=" {{ route('dashboard.blog.posts.index').'/'.$post['id'].'/delete' }}" type="button" class="btn btn-default">
                    <span class="fa fa-minus-circle"></span> Delete
                </a>
            </div>
        </div>
    </h1>

@endsection

@section('content')

    <div class="row">

        <div class="col-md-9">
            <div col-md-12>
                <div class="well">{{ $post['body'] }}</div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="col-md-12">
                <ul class="list-group cat-tags">
                    <ul class="list-group-item list-group-item-heading">
                        <span class="fa fa-info-circle"></span> Info
                    </ul>
                    <li class="list-group-item"><span class="fa fa-user"></span> {{ $post->user->username }}</li>
                    <li class="list-group-item"><span class="fa fa-clock-o"></span> {{ $post->created_at }}</li>
                    <li class="list-group-item"><span class="fa fa-comments"></span> {{ count($post->comment) }}</li>
                </ul>
            </div>
            <div class="col-md-12">
                <ul class="list-group cat-tags">
                    <ul class="list-group-item list-group-item-heading">
                        <span class="fa fa-sitemap"></span> Categories
                    </ul>
                @foreach($post['category'] as $category)
                    <li class="list-group-item">{{ $category['name'] }}</li>
                @endforeach
                </ul>
            </div>
            <div class="col-md-12">
                <ul class="list-group cat-tags">
                    <ul class="list-group-item list-group-item-heading">
                        <span class="fa fa-tags"></span> Tags
                    </ul>
                    @foreach($post['tag'] as $tag)
                        <li class="list-group-item">{{ $tag['name'] }}</li>
                    @endforeach
                </ul>
            </div>
        </div>

    </div>

@endsection