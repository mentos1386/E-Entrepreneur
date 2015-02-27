@extends('dashboard.layouts.master')

@section('meta')
    <title>Create Page</title>
@endsection

@section('header')

    <h1 class="page-header">
        <span class="fa fa-server"></span> Create Page
        <div class="pull-right">
        </div>
    </h1>

@endsection

@section('content')

    <div class="row">

        {!! Form::open(['url' => route('dashboard.pages.store')]) !!}

        <div class="col-md-8">

            <!-- Name Form group -->
            <div class="form-group col-md-12">
                {!! Form::label('name', 'Name:') !!}
                {!! Form::text('name', null, ['class' => 'form-control']) !!}
            </div>

            <!-- Content Form group -->
            <div class="form-group col-md-12">
                {!! Form::label('content', 'Content:') !!}
                {!! Form::textarea('content', null, ['class' => 'form-control']) !!}
            </div>


            <div class="form-group col-md-12">
                {!! Form::submit('Save', array('class' => 'btn btn-lg btn-success width-100')) !!}
            </div>


        </div>

        <div class="col-md-4">

            <div class="col-md-12">
                <div class="jumbotron">

                    <p>Here you can create new page.</p>

                </div>
            </div>

            <!-- Name Form group -->
            <div class="form-group col-md-12">
                {!! Form::label('url', 'Url to page:') !!}
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon">example.com/</div>
                        {!! Form::text('url', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
            </div>

            <!-- Select Role Permission -->
            <div class="form-group col-md-12">
                <label for="select-role" class="control-label">Accessible to role:</label>
                <select class="form-control" name="role_id[]" multiple data-size="10"
                        data-live-search="true" multiple data-selected-text-format="count>4">

                    @foreach($roles as $role)

                        <option value="{{ $role['id'] }}"> {{$role['name']}} </option>

                    @endforeach

                </select>
            </div>

            <!-- Select User Permission -->
            <div class="form-group col-md-12">
                <label for="select-role" class="control-label">Accessible to user:</label>
                <select class="form-control" name="user_id[]" multiple data-size="10"
                        data-live-search="true" multiple data-selected-text-format="count>4">

                    <option value="">Everyone</option>

                    @foreach($users as $user)

                        <option value="{{ $user['id'] }}"> {{$user['username']}} </option>

                    @endforeach

                </select>
            </div>

            <!-- Password protected -->
            <div class="col-md-12">
                <div class="form-group">
                    {!! Form::label('password', 'Password protected:') !!}
                    {!! Form::password('password', ['class' => 'form-control']) !!}
                </div>
            </div>

            <!-- Select Page Type -->
            <div class="form-group col-md-12">
                <label for="select-role" class="control-label">Page type:</label>
                <select class="form-control" name="type">

                    <!-- WHEN MAKING THEMES SYSTEM; HERE SHOULD BE AUTO POPULATED DEPENDING ON THEME CAPABILITIES !-->

                    <option value="red">Red</option>
                    <option value="blue">Blue</option>
                    <option value="green">Green</option>

                </select>
            </div>

            {!! Form::close() !!}

        </div>

    </div>

@endsection