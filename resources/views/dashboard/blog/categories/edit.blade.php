@extends('dashboard.layouts.master')

@section('meta')
    <title>Edit Category</title>
@endsection

@section('content')

    <h1 class="page-header">
        <span class="fa fa-sitemap"></span> Edit Category
        <div class="pull-right">
        </div>
    </h1>

    <!-- Inlcude Alerts view !-->
    @include('dashboard.layouts.alerts')

    <div class="row">

        {!! Form::model($category, ['method' => 'PUT','route' => ['dashboard.blog.categories.update', $category->id]])
        !!}

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

                    <p>Here you can edit category.</p>

                </div>
            </div>

            <!-- Select Parent -->
            <div class="form-group col-md-12">
                <label for="select-role" class="control-label">Select parent:</label>
                <select class="form-control" name="parent">


                    @if ($category['parent'] != null || $category['parent'] != 0)
                        <option value="{{ $category['parent'] }}">Current parent</option>
                    @endif

                    <option value="">No parent</option>

                    @foreach($categories as $category_all)

                        @if ($category['parent'] != $category_all['id'])
                            <option value="{{ $category_all['id'] }}"> {{$category_all['name']}} </option>
                        @endif

                    @endforeach

                </select>
            </div>

            {!! Form::close() !!}

        </div>

    </div>

@endsection