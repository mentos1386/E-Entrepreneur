@extends('dashboard.layouts.master')

@section('meta')
    <title>Menus</title>
@endsection

@section('header')

    <h1 class="page-header">
        <span class="fa fa-bars"></span> Menus
        <div class="pull-right">
        </div>
    </h1>

@endsection

@section('content')

    <div class="col-md-3">
        <ul class="list-group cat-tags">
            <ul class="list-group-item list-group-item-heading">
                Theme supports this menus:
            </ul>
            @foreach($menus as $menu)
                <li class="list-group-item">
                    <span class="badge">{{ count($menu['links']).' / '. $menu['max'] }}</span>
                    {{$menu['name']}}
                </li>
            @endforeach
        </ul>
    </div>

    <div class="col-md-3">
        <ul class="list-group cat-tags">
            <ul class="list-group-item list-group-item-heading">
                Create new link:
            </ul>
        </ul>
        {!! Form::open(['url' => route('dashboard.appearance.menus.store')]) !!}

        <div class="form-group">
            {!! Form::label('name', 'Name:') !!}
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('icon', 'Icon:') !!}
            {!! Themes::icon_picker_search_box('menu_icon', 'icon')!!}
        </div>

        <div class="form-group">
            {!! Form::label('url_custom', 'Url:') !!}
            {!! Form::text('url_custom', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            <select class="form-control" name="url" data-size="10" data-live-search="true">

                <option value="">Custom url</option>

                <optgroup label="Site">
                    <option value="/posts/">Blog</option>
                    <option value="/store/">Store</option>
                    <option value="/login/">Login</option>
                    <option value="/register/">Register</option>
                </optgroup>

                <optgroup label="Pages">
                    @foreach($pages as $page)
                        <option value="{{ $page['url'] }}">{{ $page['name'] }}</option>
                    @endforeach
                </optgroup>
                <optgroup label="Posts">
                    @foreach($posts as $post)
                        <option value="/post/{{ $post['id'] }}">{{ $post['title'] }}</option>
                    @endforeach
                </optgroup>

            </select>
        </div>

        <div class="form-group">
            <label>Menu:</label>
            <select class="form-control" name="menu_id" data-size="10">

                @foreach($menus as $menu)
                    <option value="{{ $menu['id'] }}">{{ $menu['name'] }}</option>
                @endforeach

            </select>
        </div>
        <div class="form-group">
            <label>Position</label>
            <input type="number" class="form-control" name="pos">
        </div>

        <div class="form-group">
            <div class="checkbox">
                <label>
                    <input type="checkbox" value="true" name="drop_down"> Drop Down
                </label>
            </div>
        </div>


        <div class="form-group">
            {!! Form::submit('Save', array('class' => 'btn btn-md btn-success')) !!}
        </div>

        {!! Form::close() !!}

    </div>

    <div class="col-md-6">

        @foreach($menus as $menu)
            <ul class="list-group cat-tags">
                <ul class="list-group-item list-group-item-heading">
                    {{ $menu['name'] }} Links:
                </ul>

                <table class="table">
                    <thead>
                    <th>#</th>
                    <th>Name</th>
                    <th>Icon</th>
                    <th>Url</th>
                    <th>Position</th>
                    <th>Remove/Edit</th>
                    </thead>
                    @foreach($menu['links'] as $link)
                        <tbody>
                        <td>{{ $link['id'] }}</td>
                        <td>{{ $link['name'] }}</td>
                        <td><span class="fa {{ $link['icon'] }}"></span></td>
                        <td><a href="{{ $link['url'] }}">{{ $link['url'] }}</a></td>
                        <td>{{ $link['pos'] }}</td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('dashboard.appearance.menus.index').'/'.$link['id'].'/delete' }}"
                                   class="btn btn-danger btn-sm"><span class="fa fa-remove"></span></a>
                                <a href="{{ route('dashboard.appearance.menus.index').'/'.$link['id'].'/edit' }}"
                                   class="btn btn-info btn-sm"><span class="fa fa-pencil"></span></a>
                            </div>
                        </td>
                        </tbody>
                    @endforeach
                </table>
            </ul>
        @endforeach
    </div>

@endsection

@section('scripts')
    {!! Themes::icon_picker_script('menu_icon')!!}
@endsection