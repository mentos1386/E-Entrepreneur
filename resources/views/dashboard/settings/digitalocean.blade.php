@extends('dashboard.layouts.master')

@section('content')

    <div class="col-md-8">
        <div class="page-header">
            <h2>Digital Ocean authentication</h2>
        </div>

        <!-- TODO: ADD FIELDS I REALY NEED -->

        {{ Form::model($user, ['method' => 'PATCH', 'route' => ['users.update', 'user']]) }}

        <!-- Email Form group -->
        <div class="form-group col-md-12 {{ has_errors('email', $errors) }}">
            {{ Form::label('email', 'Email:') }}
            {{ Form::text('email', null, ['class' => 'form-control']) }}
            {{ errors_for('email', $errors) }}
        </div>

        <!-- Password Form group -->
        <div class="form-group col-md-12 {{ has_errors('password', $errors) }}">
            {{ Form::label('password', 'Password:') }}
            {{ Form::password('password', ['class' => 'form-control']) }}
            {{ errors_for('password', $errors) }}
        </div>

        <div class="form-group col-md-12">
            {{ Form::submit('Save', array('class' => 'btn btn-lg btn-success width-100')) }}
        </div>

        {{ Form::close() }}

    </div>

    <div class="col-md-4">
        <div class="page-header">
            <h2>Why is it used / help</h2>
        </div>

        <ul class="list-group-item">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </ul>
        <ul class="list-group-item">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </ul>
        <ul class="list-group-item">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </ul>
    </div>

@endsection