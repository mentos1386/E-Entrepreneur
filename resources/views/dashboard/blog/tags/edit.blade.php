@extends('dashboard.layouts.master')

@section('meta')
    <title>Edit Tag</title>
@endsection

@section('header')

    <h1 class="page-header">
        <span class="fa fa-tag"></span> Edit Tag
        <div class="pull-right">
        </div>
    </h1>

@endsection

@section('content')

    <div class="row">

        {!! Form::model($tag, ['method' => 'PUT','route' => ['dashboard.blog.tags.update', $tag->id]])!!}

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

                    <p>Here you can edit tag.</p>

                </div>
            </div>


            {!! Form::close() !!}

        </div>

    </div>

@endsection