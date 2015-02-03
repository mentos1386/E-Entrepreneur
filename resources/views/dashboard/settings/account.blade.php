@extends('dashboard.layouts.master')

@section('content')

    @if (Session::has('flash_message'))
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            {{ Session::get('flash_message') }}
        </div>
    @endif

    <div class="col-md-6">

        <div class="page-header">
            <h2>User settings</h2>
        </div>

        <div class="row">

            <div class="col-md-6">
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

            <div class="col-md-4 col-md-offset-1">

                {{ getGravatar( Auth::user()->email ,'200', 'account-gravatar thumbnail img-responsive') }}
                <p class="text-center"><b><a href="http://www.gravatar.com/">Edit gravatar <span class="fa fa-external-link"></span></a></b></p>

            </div>

        </div>

        <div class="col-md-6">
            <a href="{{ URL::route('users.delete') }}" class="btn btn-danger btn-lg"><span class="fa fa-remove"></span> Delete account</a>
        </div>

    </div>

    <div class="col-md-6">
        <div class="page-header">
            <h2>Contact information</h2>
        </div>

        {{ Form::model($user->account, ['method' => 'PATCH', 'route' => ['dashboard.settings.account.update', 'account']]) }}

            <!-- First Name Form group -->
            <div class="form-group col-md-6 {{ has_errors('first_name', $errors) }}">
                {{ Form::label('first_name', 'First Name:') }}
                {{ Form::text('first_name', NULL, ['class' => 'form-control']) }}
                {{ errors_for('first_name', $errors) }}
            </div>

            <!-- Last Name Form group -->
            <div class="form-group col-md-6 {{ has_errors('last_name', $errors) }}">
                {{ Form::label('last_name', 'Last Name:') }}
                {{ Form::text('last_name', NULL, ['class' => 'form-control']) }}
                {{ errors_for('last_name', $errors) }}
            </div>

            <!-- Website Form group -->
            <div class="form-group col-md-6 {{ has_errors('web_url', $errors) }}">
                {{ Form::label('web_url', 'Website:') }}
                {{ Form::text('web_url', NULL, ['class' => 'form-control']) }}
                {{ errors_for('web_url', $errors) }}
            </div>

            <!-- Twitter Username Form group -->
            <div class="form-group col-md-6 {{ has_errors('twitter_username', $errors) }}">
                {{ Form::label('twitter_username', 'Twitter Username:') }}
                {{ Form::text('twitter_username', NULL, ['class' => 'form-control']) }}
                {{ errors_for('twitter_username', $errors) }}
            </div>

            <!-- Company Name Form group -->
            <div class="form-group col-md-6 {{ has_errors('company_name', $errors) }}">
                {{ Form::label('company_name', 'Company Name:') }}
                {{ Form::text('company_name', NULL, ['class' => 'form-control']) }}
                {{ errors_for('company_name', $errors) }}
            </div>

            <!-- Company title Form group -->
            <div class="form-group col-md-6 {{ has_errors('company_title', $errors) }}">
                {{ Form::label('company_title', 'Company Title:') }}
                {{ Form::text('company_title', NULL, ['class' => 'form-control']) }}
                {{ errors_for('company_title', $errors) }}
            </div>

            <!-- Phone Number Form group -->
            <div class="form-group col-md-6 {{ has_errors('phone', $errors) }}">
                {{ Form::label('phone', 'Phone number:') }}
                {{ Form::text('phone', NULL, ['class' => 'form-control']) }}
                {{ errors_for('phone', $errors) }}
            </div>

            <div class="form-group col-md-12">
                {{ Form::submit('Save', array('class' => 'btn btn-lg btn-success width-100')) }}
            </div>

        {{ Form::close() }}
    </div>

    <div class="col-md-12">

        <div class="page-header">
            <h2>Billing 'n stuff</h2>
        </div>

    </div>
@endsection