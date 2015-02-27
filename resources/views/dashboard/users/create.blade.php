@extends('dashboard.layouts.master')

@section('meta')
    <title>Create User</title>
@endsection

@section('header')

    <h1 class="page-header">
        <span class="fa fa-user"></span> Create User
        <div class="pull-right">
        </div>
    </h1>

@endsection

@section('content')

    <div class="row">



        <div class="col-md-6">

            {!! Form::open(['url' => route('dashboard.users.store')]) !!}

            <!-- Username Form group -->
            <div class="form-group col-md-12">
                {!! Form::label('username', 'Username:') !!}
                {!! Form::text('username', null, ['class' => 'form-control']) !!}
            </div>

            <!-- Email Form group -->
            <div class="form-group col-md-12">
                {!! Form::label('email', 'Email:') !!}
                {!! Form::text('email', null, ['class' => 'form-control']) !!}
            </div>

            <!-- Password Form group -->
            <div class="form-group col-md-12">
                {!! Form::label('password', 'Password:') !!}
                {!! Form::password('password', ['class' => 'form-control']) !!}
            </div>

            <!-- Select Role -->
            <div class="form-group col-md-12">
                <label for="select-role" class="control-label">Select role:</label>
                <select class="form-control" name="role_id">

                    @foreach($roles as $role)

                        <option value="{{ $role['id'] }}"> {{$role['name']}} </option>

                    @endforeach

                </select>
            </div>

            <div class="form-group col-md-12">
                {!! Form::submit('Save', array('class' => 'btn btn-lg btn-success width-100')) !!}
            </div>

            {!! Form::close() !!}

        </div>

        <div class="col-md-6">

            <div class="jumbotron">

                <p>Here you can create new user.</p>

            </div>

        </div>

    </div>

@endsection