@extends('dashboard.layouts.master')

@section('meta')
    <title>{{ $user['username'] }}</title>
@endsection

@section('header')

    <h1 class="page-header">
        <span class="fa fa-user"></span> User: {{ $user['username'] }}
        <div class="pull-right">
            <div class="btn-group" role="group">
                <a href=" {{ route('dashboard.users.index').'/'.$user['id'].'/edit' }}" type="button" class="btn btn-default">
                    <span class="fa fa-pencil"></span> Edit
                </a>
                <a href=" {{ route('dashboard.users.index').'/'.$user['id'].'/delete' }}" type="button" class="btn btn-default">
                    <span class="fa fa-minus-circle"></span> Delete
                </a>
            </div>
        </div>
    </h1>

@endsection

@section('content')

    <div class="row">

        <div class="col-md-4">
            <h2>User info</h2>

            <p><b>Username:</b> {{ $user['username'] }}</p>
            <p><b>Email:</b> {{ $user['email'] }}</p>
            <p><b>Created at:</b> {{ $user['created_at'] }}</p>
            <p><b>Role:</b> <a href="{{ route('dashboard.users.roles.index').'/'.$user['role']['id'] }}">{{ $user['role']['name'] }}</a></p>


        </div>

        <div class="col-md-2">

            {!! Gravatar::get($user['email'], '200', 'account-gravatar thumbnail img-responsive') !!}
            <p class="text-center"><b><a href="http://www.gravatar.com/">Edit gravatar image  <span class="fa fa-external-link"></span></a></b></p>

        </div>

        <div class="clearfix"></div>
        <div class="col-md-6">
            <h2>Posts</h2>
            <table class="table">
                <thead>
                    <th>#</th>
                    <th>Name</th>
                    <th>Body</th>
                    <th>Created at</th>
                </thead>
                @foreach($user['posts'] as $post)
                    <tbody>
                        <td>{{ $post['id'] }}</td>
                        <td><a href="{{ route('dashboard.blog.posts.index').'/'.$post['id'] }}">{{ $post['title'] }}</a></td>
                        <td>{{ $post['body'] }}</td>
                        <td>{{ $post['created_at'] }}</td>
                    </tbody>
                @endforeach
            </table>
        </div>

        <div class="col-md-6">
            <h2>Comments</h2>
            <table class="table">
                <thead>
                    <th>#</th>
                    <th>Comment</th>
                    <th>Created at</th>
                    <th>Post Name</th>
                </thead>
                @foreach($user['comments'] as $comment)
                    <tbody>
                        <td>{{ $comment['id'] }}</td>
                        <td>{{ $comment['comment'] }}</td>
                        <td>{{ $comment['created_at'] }}</td>
                        <td>
                            <a href="{{ route('dashboard.blog.posts.index').'/'.$comment['post_id'] }}">{{ $comment['post']['title'] }}</a>
                        </td>
                    </tbody>
                @endforeach
            </table>
        </div>
    </div>

    </div>

@endsection