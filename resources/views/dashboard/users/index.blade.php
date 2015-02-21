@extends('dashboard.layouts.master')

@section('meta')
    <title>Users</title>
@endsection

@section('content')

    <h1 class="page-header">
        <span class="fa fa-users"></span> Users
        <div class="pull-right">
            <a href=" {{ route('dashboard.users.create') }}" type="button" class="btn btn-default">
                <span class="fa fa-plus-circle"></span> Create
            </a>
        </div>
    </h1>

    <table class="table">
        <thead>
            <th>#</th>
            <th>Username</th>
            <th>Email</th>
            <th>Created at</th>
            <th>Role</th>
        </thead>
        @foreach($users as $user)
            <tbody>
                <td>{{ $user['id'] }}</td>
                <td><a href="{{ route('dashboard.users.index').'/'.$user['id'] }}">{{ $user['username'] }}</a></td>
                <td>{{ $user['email'] }}</td>
                <td>{{ $user['created_at'] }}</td>
                <td><a href="{{ route('dashboard.users.roles.index').'/'. $user['role']['name'] }}">{{ $user['role']['name'] }}</td>
            </tbody>
        @endforeach
    </table>


    <?php echo $users->render(); ?>
@endsection