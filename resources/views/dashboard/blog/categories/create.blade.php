@extends('dashboard.layouts.master')

@section('meta')
    <title>Create Category</title>
@endsection

@section('header')

    <h1 class="page-header">
        <span class="fa fa-sitemap"></span> Create Category
        <div class="pull-right">
        </div>
    </h1>

@endsection

@section('content')

    <div class="row">

        {!! Form::open(['url' => route('dashboard.blog.categories.store')]) !!}

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

                    <p>Here you can create new category.</p>

                </div>
            </div>

            <!-- Select Parent -->
            <div class="form-group col-md-12">
                <label for="select-role" class="control-label">Select parent:</label>
                <select class="form-control" name="parent">

                    <option value="">No parent</option>

                    @foreach($categories as $category)

                        <option value="{{ $category['id'] }}"> {{$category['name']}} </option>

                    @endforeach

                </select>
            </div>

            {!! Form::close() !!}

        </div>

    </div>

@endsection