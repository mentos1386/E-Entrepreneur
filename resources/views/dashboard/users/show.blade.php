@extends('dashboard.layouts.master')

@section('meta')
    <title>{{ $user['username'] }}</title>
@endsection

@section('content')

    <!-- TODO: REPLACE OLD FORM WITH NEW ONE! CHOSE WHERE ARE YOU GOING TO EDIT USER; HERE OR NEW PAGE? !-->

    <h1 class="page-header">
        <span class="fa fa-user"></span> User: {{ $user['username'] }}
        <div class="pull-right">
            <a href=" {{ route('dashboard.users.index').'/'.$user['username'].'/edit' }}"><span class="fa fa-pencil-square"></span></a>
            <a href=" {{ route('dashboard.users.index').'/'.$user['username'].'/delete' }}"><span class="fa fa-minus-square"></span></a>
        </div>
    </h1>

    <div class="row">

        <div class="col-md-4">
            <h2>User info</h2>

            <p><b>Username:</b> {{ $user['username'] }}</p>
            <p><b>Email:</b> {{ $user['email'] }}</p>
            <p><b>Created at:</b> {{ $user['created_at'] }}</p>
            <p><b>Role:</b> <a href="{{ route('dashboard.users.roles.index').'/'.$user['role']['name'] }}">{{ $user['role']['name'] }}</a></p>


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
                        <td><a href="{{ route('dashboard.blog.posts.index').'/'.$post['id'] }}">{{ $post['id'] }}</a></td>
                        <td>{{ $post['title'] }}</td>
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
                    <th>Body</th>
                    <th>Created at</th>
                    <th>Post Id</th>
                </thead>
                @foreach($user['comments'] as $comment)
                    <tbody>
                        <td>{{ $comment['id'] }}</td>
                        <td>{{ $comment['body'] }}</td>
                        <td>{{ $comment['created_at'] }}</td>
                        <td><a href="{{ route('dashboard.blog.posts.index').'/'.$comment['post_id'] }}">{{ $comment['post_id'] }}</a></td>
                    </tbody>
                @endforeach
            </table>
        </div>
    </div>

    </div>

@endsection