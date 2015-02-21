@extends('dashboard.layouts.master')

@section('meta')
    <title>Roles</title>
@endsection

@section('content')

    <h1 class="page-header">
        <span class="fa fa-align-justify"></span> Roles
        <div class="pull-right">
            <a href=" {{ route('dashboard.users.roles.create') }}" type="button" class="btn btn-default">
                <span class="fa fa-plus-circle"></span> Create
            </a>
        </div>
    </h1>

    <table class="table">

        <thead>
            <th>#</th>
            <th>Name</th>
            <th>Comment</th>
            <th>Users</th>
        </thead>
        @foreach($roles as $role)
            <tbody>
                <td>{{ $role['id'] }}</td>
                <td><a href="{{ route('dashboard.users.roles.index').'/'.$role['id'] }}">{{ $role['name'] }}</a></td>
                <td>{{ $role['comment'] }}</td>
                <td>{{ $role->user->count() }}</td>
            </tbody>
        @endforeach
    </table>

    {!! $roles->render() !!}
@endsection