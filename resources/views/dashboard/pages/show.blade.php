@extends('dashboard.layouts.master')

@section('meta')
    <title>{{ $page['name'] }}</title>
@endsection

@section('header')

    <h1 class="page-header">
        <span class="fa fa-server"></span> Page: {{ $page['name'] }}
        <div class="pull-right">
            <div class="btn-group" role="group">
                <a href=" {{ route('dashboard.pages.index').'/'.$page['id'].'/edit' }}" type="button"
                   class="btn btn-default">
                    <span class="fa fa-pencil"></span> Edit
                </a>
                <a href=" {{ route('dashboard.pages.index').'/'.$page['id'].'/delete' }}" type="button"
                   class="btn btn-default">
                    <span class="fa fa-minus-circle"></span> Delete
                </a>
            </div>
        </div>
    </h1>

@endsection

@section('content')

    <div class="row">

        <div class="col-md-9">
            <div col-md-12>
                <div class="well">{{ $page['content'] }}</div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="col-md-12">
                <ul class="list-group cat-tags">
                    <ul class="list-group-item list-group-item-heading">
                        <span class="fa fa-info-circle"></span> Info
                    </ul>
                    <a href="/{{ $page['url'] }}" class="list-group-item">
                        <span class="fa fa-user"></span> Url <span class="badge">{{ $page['url'] }}</span>
                    </a>
                    <a href="#" class="list-group-item" data-toggle="modal" data-target="#users-show">
                        <span class="fa fa-user"></span> User Restrictions <span
                                class="badge">{{ count($page['user']) }}</span>
                    </a>
                    <a href="#" class="list-group-item" data-toggle="modal" data-target="#roles-show">
                        <span class="fa fa-align-justify"></span> Role Restrictions <span
                                class="badge">{{ count($page['role']) }}</span>
                    </a>
                    <li class="list-group-item">
                        <span class="fa fa-key"></span> Password protected <span
                                class="badge">{{(($page['password'] !== "")? 'True' : 'False') }}</span>
                    </li>
                    <li class="list-group-item">
                        <span class="fa fa-paint-brush"></span> Type <span
                                class="badge">{{ $page['pagetypes']['name'] }}</span>
                    </li>
                </ul>
            </div>
        </div>

    </div>

    {!! HtmlH::modal(
    'users-show',
    '<span class="fa fa-users"></span> Users with access',
    null,
    '
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>',
    'users',
    $page['user']
    ) !!}

    {!! HtmlH::modal(
    'roles-show',
    '<span class="fa fa-align-justify"></span> Roles with access',
    null,
    '
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>',
    'roles',
    $page['role']
    ) !!}

@endsection