@extends('dashboard.layouts.master')

@section('meta')
    <title>Create Role</title>
@endsection

@section('content')

    <h1 class="page-header">
        <span class="fa fa-align-justify"></span> Create Role
        <div class="pull-right">
        </div>
    </h1>

    <div class="row">

        <!-- Inlcude Alerts view !-->
        @include('dashboard.layouts.alerts')

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
                        <label class="radio-inline">
                            <input type="radio" name="dashboard_view" value="1"> True
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="dashboard_view" value="0" checked> False
                        </label>
                    </div>
                </div>

                <div class="form-group col-md-12">
                    <div class="col-md-6">
                        <label for="dashboard">Can Edit Users:</label>
                    </div>
                    <div class="col-md-6">
                        <label class="radio-inline">
                            <input type="radio" name="users_edit" value="1"> True
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="users_edit" value="0" checked> False
                        </label>
                    </div>
                </div>

                <div class="form-group col-md-12">
                    <div class="col-md-6">
                        <label for="dashboard">Can Post Comments:</label>
                    </div>
                    <div class="col-md-6">
                        <label class="radio-inline">
                            <input type="radio" name="comments_post" value="1"> True
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="comments_post" value="0" checked> False
                        </label>
                    </div>
                </div>

                <div class="form-group col-md-12">
                    <div class="col-md-6">
                        <label for="dashboard">Can Moderate Comments:</label>
                    </div>
                    <div class="col-md-6">
                        <label class="radio-inline">
                            <input type="radio" name="comments_moderate" value="1"> True
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="comments_moderate"  value="0" checked> False
                        </label>
                    </div>
                </div>

                <div class="form-group col-md-12">
                    <div class="col-md-6">
                        <label for="dashboard">Can See Statistics:</label>
                    </div>
                    <div class="col-md-6">
                        <label class="radio-inline">
                            <input type="radio" name="statistics_view" value="1"> True
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="statistics_view" value="0" checked> False
                        </label>
                    </div>
                </div>

                <div class="form-group col-md-12">
                    <div class="col-md-6">
                        <label for="dashboard">Can Buy Items in Store:</label>
                    </div>
                    <div class="col-md-6">
                        <label class="radio-inline">
                            <input type="radio" name="store_buy" value="1"> True
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="store_buy" value="0" checked> False
                        </label>
                    </div>
                </div>

                <div class="form-group col-md-12">
                    <div class="col-md-6">
                        <label for="dashboard">Can Add Items in Store:</label>
                    </div>
                    <div class="col-md-6">
                        <label class="radio-inline">
                            <input type="radio" name="store_add" value="1"> True
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="store_add" value="0" checked> False
                        </label>
                    </div>
                </div>

                <div class="form-group col-md-12">
                    <div class="col-md-6">
                        <label for="dashboard">Can Edit/See Store Orders:</label>
                    </div>
                    <div class="col-md-6">
                        <label class="radio-inline">
                            <input type="radio" name="store_orders" value="1"> True
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="store_orders" value="0" checked> False
                        </label>
                    </div>
                </div>

                <div class="form-group col-md-12">
                    <div class="col-md-6">
                        <label for="dashboard">Can Create Posts:</label>
                    </div>
                    <div class="col-md-6">
                        <label class="radio-inline">
                            <input type="radio" name="posts_create" value="1"> True
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="posts_create" value="0" checked> False
                        </label>
                    </div>
                </div>

                <div class="form-group col-md-12">
                    <div class="col-md-6">
                        <label for="dashboard">Can Change Site Settings:</label>
                    </div>
                    <div class="col-md-6">
                        <label class="radio-inline">
                            <input type="radio" name="settings_edit" value="1"> True
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="settings_edit" value="0" checked> False
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

    </div>

@endsection