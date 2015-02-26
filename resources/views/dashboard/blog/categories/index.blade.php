@extends('dashboard.layouts.master')

@section('meta')
    <title>Categories</title>
@endsection

@section('content')

    <h1 class="page-header">
        <span class="fa fa-sitemap"></span> Categories
        <div class="pull-right">
            <a href=" {{ route('dashboard.blog.categories.create') }}" type="button" class="btn btn-default">
                <span class="fa fa-plus-circle"></span> Create
            </a>
        </div>
    </h1>

    <table class="table">
        <thead>
        <th>#</th>
        <th>Name</th>
        <th>Comment</th>
        <th>Created at</th>
        <th>Parent</th>
        </thead>
        @foreach($categories as $category)
            <tbody>
            <td>{{ $category['id'] }}</td>
            <td><a href="{{ route('dashboard.blog.categories.index').'/'.$category['id'] }}">{{ $category['name'] }}</a>
            </td>
            <td>{{ $category['comment'] }}</td>
            <td>{{ $category['created_at'] }}</td>
            <td>{{ $category['parent'] }}</td>
            </tbody>
        @endforeach
    </table>


    {!! $categories->render() !!}
@endsection