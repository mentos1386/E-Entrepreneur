@extends('dashboard.layouts.master')

@section('meta')
    <title>Users</title>
@endsection

@section('content')

    <h1 class="page-header">Users</h1>

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
                <td><a href="{{ route('dashboard.users.index').'/'.$user['username'] }}">{{ $user['username'] }}</a></td>
                <td>{{ $user['email'] }}</td>
                <td>{{ $user['created_at'] }}</td>
                <td>{{ $user['role_id'] }}</td>
            </tbody>
        @endforeach
    </table>


    <?php echo $users->render(); ?>
@endsection