@extends('dashboard.layouts.master')

@section('meta')
    <title>Themes</title>
@endsection

@section('header')

    <h1 class="page-header">
        <span class="fa fa-paint-brush"></span> Themes
        <div class="pull-right">
            <button data-target="#install_theme" data-toggle="modal" type="button" class="btn btn-default">
                <span class="fa fa-upload"></span> Install Theme
            </button>
        </div>
    </h1>

@endsection

@section('content')

    <div class="col-md-3">
        <ul class="list-group cat-tags">
            <ul class="list-group-item list-group-item-heading">
                Active theme support:
            </ul>
            <li class="list-group-item">
                <span class="badge">{{ count($appearance['menus']) }}</span>
                Menus
            </li>
            <li class="list-group-item">
                <span class="badge">{{ count($appearance['page_types']) }}</span>
                Page Types
            </li>
            <li class="list-group-item">
                <span class="badge">{{ count($appearance['front_page']) }}</span>
                Custom Front Pages
            </li>
        </ul>
    </div>

    <div class="col-md-9">
        <div class="row">

            @foreach($themes as $theme)
                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail
                        @if ($theme['name'] == $active_theme)
                            thumbnail-active
                        @endif
                            ">
                        <img src="{{ $theme['img'] }}" alt="{{ $theme['name'] }}">

                        <div class="caption">
                            <h3>{{ $theme['name'] }}
                                @if ($theme['name'] !== $active_theme)
                                    <div class="btn-group">
                                        <a href="{{ route('dashboard.appearance.themes.index').'/'.$theme['name'].'/set' }}"
                                           class="btn btn-success" role="button">Change</a>
                                        <a href="{{ route('dashboard.appearance.themes.index').'/'.$theme['name'].'/remove' }}"
                                           class="btn btn-danger" role="button">Remove</a>
                                    </div>
                                @endif
                            </h3>
                        </div>
                    </div>
                </div>
                @endforeach

                        <!-- Modal -->
                <div class="modal fade" id="install_theme" tabindex="-1" role="dialog" aria-labelledby="install_theme"
                     aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                            aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="install_theme"><span class="fa fa-upload"></span> Install
                                    Theme</h4>
                            </div>
                            <div class="modal-body">
                                ...
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>

        </div>
    </div>

@endsection