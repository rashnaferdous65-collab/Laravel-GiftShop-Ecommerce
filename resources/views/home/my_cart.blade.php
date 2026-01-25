@extends('layouts.app') 


@section('title', 'Giftshop-That is what makes you surprised.') 


@section('content') 
      <style>
.div_deg{
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    margin-top: 60px;
    margin-bottom: 60px;
}

table{
    border: 2px solid black;
    width: 800px;
}

th{
    background-color: skyblue;
    padding: 15px;
    font-size: 20px;
    font-weight: bold;
    color: white;
}

td{
    color: black;
    padding: 10px;
    border: 1px solid skyblue;
}

.form_container{
    flex: 1;
    padding: 20px;
    margin-right: 20px;
}

.table_container{
    flex: 2;
    padding: 20px;
}

.form_container div{
    margin-bottom: 15px;
}

.form_container label{
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
}

.form_container input[type="text"],
.form_container input[type="address"],
.form_container input[type="number"]{
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

.price_div{

    font-weight:bold;
    font-size: 30px;
    margin-top: 30px;
    margin-bottom: 30px;
    text-align: center ;
    padding-left: 30px;

}
</style>

    
    <body> 

    <div class="hero_area">
       
           
        @include('home.header') 

     
         <div class="div_deg">

    <div class="form_container">
        <form action="{{url('confirm_order')}}" method="POST">
          @csrf
            <div>
                <label>Receiver Name</label>
                <input type="text" name="name" value="{{Auth::user()->name}}">
            </div>

            <div>
                <label>Receiver Address</label>
                <input type="text" name="address" value="{{Auth::user()->address}}">
            </div>

            <div>
                <label>Receiver Phone Number</label>
                <input type="number" name="phone" value="{{Auth::user()->phone}}">
            </div>

            <div class="div_gap">
                <input type="submit" value="Cash On Delivary" class="btn btn-primary text-white">
                <a href="{{url('stripe')}}" class="btn btn-warning text-white">Payment On Card</a>
            </div>
        </form>
    </div>

    <div class="table_container">
        <table>
            <tr>
                <th>Product Title</th>
                <th>Price</th>
                <th>Image</th>
                <th>Remove</th>
            </tr>

            <?php $value = 0; ?>

            @foreach($cart as $cartItem)
            <tr>
                <td>{{ $cartItem->product->title }}</td>
                <td>{{ $cartItem->product->price }}</td>

                <td>
                    <img src="/products/{{ $cartItem->product->image }}" width="80" alt="Product Image">
                </td>

                <td>
                    <form action="{{ route('delete_cart', $cartItem->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" >Remove</button>
                    </form>
                </td>
            </tr>

            <?php $value += $cartItem->product->price; ?>
            @endforeach

        </table>
    </div>

</div>


<div class="price_div">

<h3>Total Value of Cart Is: ${{$value}}</h3>
</div>
    
 
    @include('home.info')
    @endsection