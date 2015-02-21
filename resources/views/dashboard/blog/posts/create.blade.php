@extends('dashboard.layouts.master')

@section('meta')
    <title>Create Post</title>
@endsection

@section('content')

    <h1 class="page-header">
        <span class="fa fa-pencil"></span> Create Post
        <div class="pull-right">
        </div>
    </h1>

    <!-- Inlcude Alerts view !-->
    @include('dashboard.layouts.alerts')

    <div class="row">

        <div class="col-md-8">

            {!! Form::open(['url' => route('dashboard.blog.posts.store')]) !!}

            <!-- Username Form group -->
            <div class="form-group col-md-12">
                {!! Form::label('title', 'Title:') !!}
                {!! Form::text('title', null, ['class' => 'form-control']) !!}
            </div>

            <!-- Email Form group -->
            <div class="form-group col-md-12">
                {!! Form::label('body', 'Body:') !!}
                {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
            </div>


            <div class="form-group col-md-12">
                {!! Form::submit('Save', array('class' => 'btn btn-lg btn-success width-100')) !!}
            </div>

            {!! Form::close() !!}

        </div>

        <div class="col-md-4">

            <div class="col-md-12">
                <div class="jumbotron">

                    <p>Here you can create new post.</p>

                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    <div class="list-group">
                        <p class="list-group-item list-group-item-heading">
                            Categories
                        </p>
                        @foreach($categories as $category)
                            <p class="list-group-item">
                                <input type="checkbox" value="{{$category['id']}}">
                                {{ $category['name'] }}
                            </p>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    <div class="list-group">
                        <p class="list-group-item list-group-item-heading">
                            Tags
                        </p>
                        @foreach($tags as $tag)
                            <p class="list-group-item">
                                <input type="checkbox" value="{{ $tag['id'] }}">
                                {{ $tag['name'] }}
                            </p>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection