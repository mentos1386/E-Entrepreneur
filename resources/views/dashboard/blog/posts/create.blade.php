@extends('dashboard.layouts.master')

@section('meta')
    <title>Create Post</title>
@endsection

@section('header')

    <h1 class="page-header">
        <span class="fa fa-pencil"></span> Create Post
        <div class="pull-right">
        </div>
    </h1>

@endsection

@section('content')

    <div class="row">

        {!! Form::open(['url' => route('dashboard.blog.posts.store')]) !!}

        <div class="col-md-8">

            <!-- Title Form group -->
            <div class="form-group col-md-12">
                {!! Form::label('title', 'Title:') !!}
                {!! Form::text('title', null, ['class' => 'form-control']) !!}
            </div>

            <!-- Body Form group -->
            <div class="form-group col-md-12">
                {!! Form::label('body', 'Body:') !!}
                {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
            </div>


            <div class="form-group col-md-12">
                {!! Form::submit('Save', array('class' => 'btn btn-lg btn-success width-100')) !!}
            </div>


        </div>

        <div class="col-md-4">

            <div class="col-md-12">
                <div class="jumbotron">

                    <p>Here you can create new post.</p>

                </div>
            </div>

            <!-- Select Categories -->
            <div class="col-md-12">
                <div class="form-group">
                    <label for="select-role" class="control-label">Categories:</label>
                    <select class="form-control" name="categories[]" multiple data-live-search="true" data-size="10">
                        @foreach($categories as $category)
                            <option value="{{$category['id']}}">{{ $category['name'] }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <!-- Select Tags -->
            <div class="col-md-12">
                <div class="form-group">
                    <label for="select-role" class="control-label">Tags:</label>
                    <select class="form-control" name="tags[]" multiple data-live-search="true" data-size="10">
                        @foreach($tags as $tag)
                            <option value="{{ $tag['id'] }}">{{ $tag['name'] }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <!-- Select User -->
            <div class="col-md-12">
                <div class="form-group">
                    <label for="select-role" class="control-label">Post as:</label>
                    <select class="form-control" name="user_id" data-live-search="true" data-size="10">

                        <option value="{{ Auth::id() }}">Me</option>

                        @foreach($users as $user)

                            @if($user['id'] != Auth::id())
                                <option value="{{ $user['id'] }}"> {{$user['username']}} </option>
                            @endif

                        @endforeach

                    </select>
                </div>
            </div>

            {!! Form::close() !!}

        </div>

    </div>

@endsection