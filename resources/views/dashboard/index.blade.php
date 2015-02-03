@extends('dashboard.layouts.master')

@section('meta')
    <title>Dashboard</title>
@endsection

@section('content')

    <h1 class="page-header">Welcome to dashboard {{ Auth::user()->username }}</h1>

    <a href="/api/callback/digitalocean">DigitalOcean api Authentication</a>

@endsection