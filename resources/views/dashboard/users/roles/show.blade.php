@extends('dashboard.layouts.master')

@section('meta')
    <title>{{ $role['name'] }}</title>
@endsection

@section('content')

    <h1 class="page-header">
        <span class="fa fa-align-justify"></span> Role: {{ $role['name'] }}
        <div class="pull-right">
            <div class="btn-group" role="group">
                <a href=" {{ route('dashboard.users.roles.index').'/'.$role['id'].'/edit' }}" type="button" class="btn btn-default">
                    <span class="fa fa-pencil"></span> Edit
                </a>
                <a href=" {{ route('dashboard.users.roles.index').'/'.$role['id'].'/delete' }}" type="button" class="btn btn-default">
                    <span class="fa fa-minus-circle"></span> Delete
                </a>
            </div>
        </div>
    </h1>

    <div class="row">
        <div class="col-md-12">
            <div class="jumbotron">
                <p>{{ $role['comment'] }}</p>
            </div>
        </div>
        <div class="col-md-6">
            <table class="table">

                <thead>
                    <th>Name</th>
                    <th>True/False</th>
                    <th>Comment</th>
                </thead>

                <tbody>
                    <td>Dashboard</td>
                    <td> {{ $role['permission']['dashboard'] }} </td>
                    <td>Can View Dashboard</td>
                </tbody>

                <tbody>
                    <td>Users</td>
                    <td> {{ $role['permission']['dashboard_users'] }} </td>
                    <td>Can Edit Users</td>
                </tbody>

                <tbody>
                    <td>Comments Post</td>
                    <td> {{ $role['permission']['user_comments_post'] }} </td>
                    <td>Can Post Comments</td>
                </tbody>

                <tbody>
                    <td>Comments Moderate</td>
                    <td> {{ $role['permission']['dashboard_blog_comments'] }} </td>
                    <td>Can Edit/Delete comments</td>
                </tbody>

                <tbody>
                    <td>Statistics</td>
                    <td> {{ $role['permission']['dashboard_statistics'] }} </td>
                    <td>Can see statistics (Site/Store)</td>
                </tbody>

                <tbody>
                    <td>Store Buy</td>
                    <td> {{ $role['permission']['user_store_buy'] }} </td>
                    <td>Can buy items</td>
                </tbody>

                <tbody>
                    <td>Store Add</td>
                    <td> {{ $role['permission']['dashboard_store_add'] }} </td>
                    <td>Can add items to store</td>
                </tbody>

                <tbody>
                    <td>Store Orders</td>
                    <td> {{ $role['permission']['dashboard_store_orders'] }} </td>
                    <td>Can Edit/Delete store Orders</td>
                </tbody>

                <tbody>
                    <td>Posts Create</td>
                    <td> {{ $role['permission']['dashboard_blog_posts'] }} </td>
                    <td>Can Create Posts</td>
                </tbody>

                <tbody>
                    <td>Pages</td>
                    <td> {{ $role['permission']['dashboard_pages'] }} </td>
                    <td>Can Edit Site Appearance</td>
                </tbody>

                <tbody>
                    <td>Appearance</td>
                    <td> {{ $role['permission']['dashboard_appearance'] }} </td>
                    <td>Can Edit Site Appearance</td>
                </tbody>

                <tbody>
                    <td>Settings</td>
                    <td> {{ $role['permission']['dashboard_settings'] }} </td>
                    <td>Can Edit Site Settings</td>
                </tbody>

            </table>
        </div>



        <!-- DEBUG !-->
        <th>{{ dump($role->toArray()) }}</th>
        <!-- DEBUG !-->

        <div class="col-md-12">

            <h2>Users with that role</h2>

            <table class="table">
                <thead>
                <th>#</th>
                <th>Username</th>
                <th>Email</th>
                <th>Created at</th>
                </thead>
                @foreach($role['user'] as $user)
                    <tbody>
                    <td>{{ $user['id'] }}</td>
                    <td><a href="{{ route('dashboard.users.index').'/'.$user['id'] }}">{{ $user['username'] }}</a></td>
                    <td>{{ $user['email'] }}</td>
                    <td>{{ $user['created_at'] }}</td>
                    </tbody>
                @endforeach
            </table>
        </div>

    </div>

@endsection