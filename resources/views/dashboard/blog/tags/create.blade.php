@extends('dashboard.layouts.master')

@section('meta')
    <title>Create Tag</title>
@endsection

@section('content')

    <h1 class="page-header">
        <span class="fa fa-tags"></span> Create Tag
        <div class="pull-right">
        </div>
    </h1>

    <!-- Inlcude Alerts view !-->
    @include('dashboard.layouts.alerts')

    <div class="row">

        {!! Form::open(['url' => route('dashboard.blog.tags.store')]) !!}

        <div class="col-md-8">

            <!-- Name Form group -->
            <div class="form-group col-md-12">
                {!! Form::label('name', 'Name:') !!}
                {!! Form::text('name', null, ['class' => 'form-control']) !!}
            </div>

            <!-- Comment Form group -->
            <div class="form-group col-md-12">
                {!! Form::label('comment', 'Comment:') !!}
                {!! Form::textarea('comment', null, ['class' => 'form-control']) !!}
            </div>


            <div class="form-group col-md-12">
                {!! Form::submit('Save', array('class' => 'btn btn-lg btn-success width-100')) !!}
            </div>


        </div>

        <div class="col-md-4">

            <div class="col-md-12">
                <div class="jumbotron">

                    <p>Here you can create new tag.</p>

                </div>
            </div>

            {!! Form::close() !!}

        </div>

    </div>

@endsection