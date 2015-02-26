@extends('dashboard.layouts.master')

@section('meta')
    <title>Edit: {{ $post['title'] }}</title>
@endsection

@section('content')

    <h1 class="page-header">
        <span class="fa fa-pencil"></span> Edit: {{ $post['title'] }}
        <div class="pull-right">
        </div>
    </h1>

    <!-- Inlcude Alerts view !-->
    @include('dashboard.layouts.alerts')

    <div class="row">

        {!! Form::model($post, ['method' => 'PUT','route' => ['dashboard.blog.posts.update', $post->id]]) !!}

        <div class="col-md-8">

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


        </div>

        <div class="col-md-4">

            <div class="col-md-12">
                <div class="jumbotron">

                    <p>Here you can edit post.</p>

                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    <div class="list-group cat-tags">
                        <p class="list-group-item list-group-item-heading">
                            Categories
                        </p>
                        @foreach($categories as $category) <!-- TODO: IF IS SELECTED FROM BEFORE; MAKE IT CHECKED! !-->
                            <p class="list-group-item">
                                <input type="checkbox" name="categories[]" value="{{$category['id']}}"
                                @if ($post['category'] !== null)
                                    @foreach($post['category'] as $post_category)
                                        @if ($category['id'] == $post_category['id'])
                                       checked
                                                @endif
                                            @endforeach
                                        @endif
                                >
                                {{ $category['name'] }}
                            </p>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    <div class="list-group cat-tags">
                        <p class="list-group-item list-group-item-heading">
                            Tags
                        </p>
                        @foreach($tags as $tag) <!-- TODO: IF IS SELECTED FROM BEFORE; MAKE IT CHECKED! !-->
                            <p class="list-group-item">
                                <input type="checkbox" name="tags[]" value="{{ $tag['id'] }}"
                                @if ($post['tag'] !== null)
                                    @foreach($post['tag'] as $post_tag)
                                        @if ($tag['id'] == $post_tag['id'])
                                       checked
                                                @endif
                                            @endforeach
                                        @endif
                                >
                                {{ $tag['name'] }}
                            </p>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Select User -->
            <div class="form-group col-md-12">
                <label for="select-role" class="control-label">Post as:</label>
                <select class="form-control" name="user_id">

                    <option value="{{ $post['user_id'] }}">Previous user</option>

                    @foreach($users as $user)

                        @if($user['id'] != $post['user_id'])
                            <option value="{{ $user['id'] }}" checked> {{$user['username']}} </option>
                        @endif

                    @endforeach

                </select>
            </div>

            {!! Form::close() !!}

        </div>

    </div>

@endsection