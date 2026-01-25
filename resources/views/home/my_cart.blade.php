@extends('layouts.app')

@section('title', 'Giftshop - That is what makes you surprised.')

@section('content')

<style>
.div_deg{
    display:flex;
    justify-content:space-between;
    align-items:flex-start;
    margin:60px 0;
}
table{
    width:800px;
    border:2px solid black;
}
th{
    background:skyblue;
    color:white;
    padding:15px;
    font-size:20px;
}
td{
    padding:10px;
    border:1px solid skyblue;
}
.form_container{flex:1;padding:20px;margin-right:20px;}
.table_container{flex:2;padding:20px;}
.price_div{
    text-align:center;
    font-size:30px;
    font-weight:bold;
    margin:30px 0;
}
</style>

<div class="hero_area">
    @include('home.header')

    <div class="div_deg">

        {{-- Order Form --}}
        <div class="form_container">
            <form action="{{ url('confirm_order') }}" method="POST">
                @csrf

                <label>Receiver Name</label>
                <input type="text" name="name" value="{{ Auth::user()->name }}">

                <label>Receiver Address</label>
                <input type="text" name="address" value="{{ Auth::user()->address }}">

                <label>Receiver Phone Number</label>
                <input type="number" name="phone" value="{{ Auth::user()->phone }}">

                <br>
                <input type="submit" value="Cash On Delivery" class="btn btn-primary text-white">
                <a href="{{ url('stripe') }}" class="btn btn-warning text-white">Payment On Card</a>
            </form>
        </div>

        {{-- Cart Table --}}
        <div class="table_container">
            @php $total = 0; @endphp

            <table>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>

                @foreach($cart as $item)
                    <tr>
                        <td>{{ $item->product->title }}</td>
                        <td>${{ $item->product->price }}</td>
                        <td>
                            <img src="/products/{{ $item->product->image }}" width="80">
                        </td>
                        <td>
                            <form action="{{ route('delete_cart', $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">Remove</button>
                            </form>
                        </td>
                    </tr>

                    @php $total += $item->product->price; @endphp
                @endforeach
            </table>
        </div>
    </div>

    <div class="price_div">
        Total Value of Cart Is: ${{ $total }}
    </div>

    @include('home.info')
</div>

@endsection
