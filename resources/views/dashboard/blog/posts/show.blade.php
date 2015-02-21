@extends('dashboard.layouts.master')

@section('meta')
    <title>{{ $post['title'] }}</title>
@endsection

@section('content')

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

    <div class="row">

        <div class="col-md-10">
            <div class="well">{{ $post['body'] }}</div>
        </div>

        <div class="col-md-2">
            <div class="col-md-12">
                <ul class="list-group">
                    <ul class="list-group-item list-group-item-heading">
                        Categories
                    </ul>
                @foreach($post['category'] as $category)
                    <li class="list-group-item">{{ $category['name'] }}</li>
                @endforeach
                </ul>
            </div>
            <div class="col-md-12">
                <ul class="list-group list">
                    <ul class="list-group-item list-group-item-heading">
                        Tags
                    </ul>
                    @foreach($post['tag'] as $tag)
                        <li class="list-group-item">{{ $tag['name'] }}</li>
                    @endforeach
                </ul>
            </div>
        </div>

    </div>

@endsection