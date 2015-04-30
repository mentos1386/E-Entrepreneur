@extends('themes.Photon.frontend.layouts.master')
@section('head.title')
    Store
@endsection
@section('content')
    <section class="main style1">
        <div class="container">
            <div class="row 150%">
                <div class="width-100">
                    <header class="major">
                        <h2 class="width-100">
                            <a href="{{ URL::previous() }}" title="Back"><i
                                        class="fa fa-chevron-circle-left"></i> </a>
                            |
                            <i class="fa fa-shopping-cart"></i>
                            You have <strong>{{count($items)}}</strong> items in you Cart
                        </h2>
                    </header>
                    @if(count($items) > 0)
                        <div class="table-wrapper" id="cart">
                            <table class="store-cart">
                                <thead>
                                <th class="id">#</th>
                                <th class="name">Name</th>
                                <th class="quantity">Quantaty</th>
                                <th class="price">Price</th>
                                <th class="remove">Remove</th>
                                </thead>
                                @foreach($items as $item)
                                    <tbody>
                                    <td class="id">{{$item['id']}}</td>
                                    <td class="name"><a
                                                href="{{route('store.index').'/'.$item['id']}}">{{$item['name']}}</a>
                                    </td>
                                    <td class="quantity">{{$item['quantaty']}}</td>
                                    <td class="price">{{$item['price']}} €</td>
                                    <td class="remove"><a href="{{route('store.cart').'/remove/'.$item['id'] }}"><i
                                                    class="fa fa-times"></i></a></td>
                                    </tbody>
                                @endforeach
                            </table>
                            <table class="store-cart">
                                <td class="total"><strong>Total</strong></td>
                                <td class="total-cost"><strong>{{$cost}} €</strong></td>
                                <td class="total-cost-fix"></td>
                            </table>
                        </div>
                        <a href="#" class="button special" style="float:right">
                            Payment <i class="fa fa-chevron-right"></i>
                        </a>
                    @else
                        <h3 style="text-align: center">You dont have any items in cart.</h3>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection