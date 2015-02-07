@extends('dashboard.layouts.master')

@section('meta')
    <title>{{ $user['username'] }}</title>
@endsection

@section('content')

    <!-- TODO: REPLACE OLD FORM WITH NEW ONE! CHOSE WHERE ARE YOU GOING TO EDIT USER; HERE OR NEW PAGE? !-->

    <h1 class="page-header">Show: {{ $user['username'] }}</h1>

    <div class="row">

        <div class="col-md-6">
            {!! Form::model($user, ['method' => 'PATCH', 'route' => ['dashboard.users.update', 'user']]) !!}

            <!-- Email Form group -->
            <div class="form-group col-md-12 ">
                {!! Form::label('email', 'Email:') !!}
                {!! Form::text('email', null, ['class' => 'form-control']) !!}
            </div>

            <!-- Password Form group -->
            <div class="form-group col-md-12">
                {!! Form::label('password', 'Password:') !!}
                {!! Form::password('password', ['class' => 'form-control']) !!}
            </div>

            <div class="form-group col-md-12">
                {!! Form::submit('Save', array('class' => 'btn btn-lg btn-success width-100')) !!}
            </div>

            {!! Form::close() !!}
        </div>

        <div class="col-md-4 col-md-offset-1">

            {!! Gravatar::get($user['email'], '200', 'account-gravatar thumbnail img-responsive') !!}
            <p class="text-center"><b><a href="http://www.gravatar.com/">Edit gravatar <span class="fa fa-external-link"></span></a></b></p>

        </div>

    </div>

    <div class="col-md-6">
        <a href="{{ URL::route('dashboard.users.destroy') }}" class="btn btn-danger btn-lg"><span class="fa fa-remove"></span> Delete account</a>
    </div>

    </div>

@endsection