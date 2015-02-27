@extends('dashboard.layouts.master')

@section('meta')
    <title>Dashboard</title>
@endsection

@section('header')

    <h1 class="page-header">Welcome back {{ Auth::user()->username }}</h1>

@endsection