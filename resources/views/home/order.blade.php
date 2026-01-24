@extends('layouts.app')

@section('title', 'Giftshop - That is what makes you surprised.')

@section('content')

<style>
    .order_div{
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 60px 0;
    }

    table{
        width: 800px;
        border: 2px solid black;
        border-collapse: collapse;
    }

    th{
        background-color: skyblue;
        padding: 15px;
        font-size: 20px;
        font-weight: bold;
        color: white;
    }

    td{
        padding: 10px;
        color: black;
        border: 1px solid skyblue;
        text-align: center;
    }
</style>

<div class="hero_area">
    @include('home.header')
</div>

<div class="order_div">
    <table>
        <thead>
            <tr>
                <th>Product Title</th>
                <th>Price</th>
                <th>Delivery Status</th>
                <th>Image</th>
            </tr>
        </thead>

        <tbody>
            @foreach($order as $item)
                <tr>
                    <td>{{ $item->product->title }}</td>
                    <td>{{ $item->product->price }}</td>

                    <td>
                        {{ $item->status == 'Deliverd' ? 'Delivered' : $item->status }}
                    </td>

                    <td>
                        <img src="products/{{ $item->product->image }}" width="80" alt="Product Image">
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@include('home.info')

@endsection
