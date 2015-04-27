@extends('dashboard.layouts.master')

@section('meta')
    <title>Store</title>
@endsection

@section('header')

    <h1 class="page-header">
        <span class="fa fa-shopping-cart"></span> Store
        <div class="pull-right">
            <a href=" {{ route('dashboard.store.create') }}" type="button" class="btn btn-default">
                <span class="fa fa-plus-circle"></span> Create
            </a>
        </div>
    </h1>

@endsection

@section('content')

    <table class="table">
        <thead>
        <th>#</th>
        <th>Name</th>
        <th>Description</th>
        <th>Price</th>
        <th>Stock</th>
        <th>Reviews</th>
        </thead>
        @foreach($store as $store_item)
            <tbody>
            <td>{{ $store_item['id'] }}</td>
            <td><a href="{{ route('dashboard.store.index').'/'.$store_item['id'] }}">{{ $store_item['name'] }}</a></td>
            <td>{{ $store_item['description'] }}</td>
            <td>{{ $store_item['price'] }}</td>
            <td>{{ $store_item['stock'] }}</td>
            <td>{{ count($store_item['reviews']) }}</td>

            </tbody>
        @endforeach
    </table>


    <?php echo $store->render(); ?>
@endsection