@extends('dashboard.layouts.master')

@section('meta')
    <title>Create Role</title>
@endsection

@section('header')

    <h1 class="page-header">
        <span class="fa fa-align-justify"></span> Create Role
        <div class="pull-right">
        </div>
    </h1>

@endsection

@section('content')

    <div class="col-md-12">
        {!! Form::open(['url' => route('dashboard.users.roles.store')]) !!}

        <div class="col-md-6">
            <!-- Name Form group -->
            <div class="form-group col-md-12">
                {!! Form::label('name', 'Name:') !!}
                {!! Form::text('name', null, ['class' => 'form-control']) !!}
            </div>


            <div class="form-group col-md-12">
                <div class="col-md-6">
                    <label for="dashboard">Can Use Dashboard:</label>
                </div>
                <div class="col-md-6">
                    <label>
                        {!! Form::radio('dashboard', '1') !!} True
                    </label>
                    <label>
                        {!! Form::radio('dashboard', '0', true) !!} False
                    </label>
                </div>
            </div>

            <div class="form-group col-md-12">
                <div class="col-md-6">
                    <label for="dashboard">Can Edit Users:</label>
                </div>
                <div class="col-md-6">
                    <label>
                        {!! Form::radio('dashboard_users', '1') !!} True
                    </label>
                    <label>
                        {!! Form::radio('dashboard_users', '0', true) !!} False
                    </label>
                </div>
            </div>

            <div class="form-group col-md-12">
                <div class="col-md-6">
                    <label for="dashboard">Can Post Comments:</label>
                </div>
                <div class="col-md-6">
                    <label>
                        {!! Form::radio('user_comments_post', '1') !!} True
                    </label>
                    <label>
                        {!! Form::radio('user_comments_post', '0', true) !!} False
                    </label>
                </div>
            </div>

            <div class="form-group col-md-12">
                <div class="col-md-6">
                    <label for="dashboard">Can Moderate Comments:</label>
                </div>
                <div class="col-md-6">
                    <label>
                        {!! Form::radio('dashboard_blog_comments', '1') !!} True
                    </label>
                    <label>
                        {!! Form::radio('dashboard_blog_comments', '0', true) !!} False
                    </label>
                </div>
            </div>

            <div class="form-group col-md-12">
                <div class="col-md-6">
                    <label for="dashboard">Can See Statistics:</label>
                </div>
                <div class="col-md-6">
                    <label>
                        {!! Form::radio('dashboard_statistics', '1') !!} True
                    </label>
                    <label>
                        {!! Form::radio('dashboard_statistics', '0', true) !!} False
                    </label>
                </div>
            </div>

            <div class="form-group col-md-12">
                <div class="col-md-6">
                    <label for="dashboard">Can Buy Items in Store:</label>
                </div>
                <div class="col-md-6">
                    <label>
                        {!! Form::radio('user_store_buy', '1') !!} True
                    </label>
                    <label>
                        {!! Form::radio('user_store_buy', '0', true) !!} False
                    </label>
                </div>
            </div>

            <div class="form-group col-md-12">
                <div class="col-md-6">
                    <label for="dashboard">Can Add Items in Store:</label>
                </div>
                <div class="col-md-6">
                    <label>
                        {!! Form::radio('dashboard_store_add', '1') !!} True
                    </label>
                    <label>
                        {!! Form::radio('dashboard_store_add', '0', true) !!} False
                    </label>
                </div>
            </div>

            <div class="form-group col-md-12">
                <div class="col-md-6">
                    <label for="dashboard">Can Edit/See Store Orders:</label>
                </div>
                <div class="col-md-6">
                    <label>
                        {!! Form::radio('dashboard_store_orders', '1') !!} True
                    </label>
                    <label>
                        {!! Form::radio('dashboard_store_orders', '0', true) !!} False
                    </label>
                </div>
            </div>

            <div class="form-group col-md-12">
                <div class="col-md-6">
                    <label for="dashboard">Can Create Posts:</label>
                </div>
                <div class="col-md-6">
                    <label>
                        {!! Form::radio('dashboard_blog_posts', '1') !!} True
                    </label>
                    <label>
                        {!! Form::radio('dashboard_blog_posts', '0', true) !!} False
                    </label>
                </div>
            </div>

            <div class="form-group col-md-12">
                <div class="col-md-6">
                    <label for="dashboard">Can Change Site Appearance:</label>
                </div>
                <div class="col-md-6">
                    <label>
                        {!! Form::radio('dashboard_appearance', '1') !!} True
                    </label>
                    <label>
                        {!! Form::radio('dashboard_appearance', '0', true) !!} False
                    </label>
                </div>
            </div>

            <div class="form-group col-md-12">
                <div class="col-md-6">
                    <label for="dashboard">Can Add/Remove Pages:</label>
                </div>
                <div class="col-md-6">
                    <label>
                        {!! Form::radio('dashboard_pages', '1') !!} True
                    </label>
                    <label>
                        {!! Form::radio('dashboard_pages', '0', true) !!} False
                    </label>
                </div>
            </div>

            <div class="form-group col-md-12">
                <div class="col-md-6">
                    <label for="dashboard">Can Change Site Settings:</label>
                </div>
                <div class="col-md-6">
                    <label>
                        {!! Form::radio('dashboard_settings', '1') !!} True
                    </label>
                    <label>
                        {!! Form::radio('dashboard_settings', '0', true) !!} False
                    </label>
                </div>
            </div>
        </div>

        <div class="col-md-6">

            <div class="jumbotron">

                <p>Here you can create new role.</p>

            </div>

            <!-- Comment Form group -->
            <div class="form-group col-md-12">
                {!! Form::label('comment', 'Comment:') !!}
                {!! Form::textarea('comment', null, ['class' => 'form-control']) !!}
            </div>

        </div>

        <div class="form-group col-md-12">
            {!! Form::submit('Save', array('class' => 'btn btn-lg btn-success width-100')) !!}
        </div>

        {!! Form::close() !!}


    </div>

@endsection