@extends('layouts.app') 


@section('title', 'Giftshop-That is what makes you surprised.') 


@section('content') 
    
    <body> 

    <style>

        .order_div{
    display: flex;
    justify-content: center;
    align-items: center;
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




    </style>

    <div class="hero_area">
       
           
        @include('home.header') 

        </div>

        <div class="order_div">

        
        <table>

        
            <tr>
                <th>Product Title</th>
                <th>Price</th>
                 <th>Delivary Status</th>
                <th>Image</th>
               
            </tr>
        @foreach($order as $order)
            <tr>
                <td>{{$order->product->title}}</td>
                <td>{{$order->product->price}}</td>
                                  <td>
    @if ($order->status == 'Deliverd')
        Delivered 
    @else
        {{ $order->status }}
    @endif
</td>
              

                <td>
                   <img src="products/{{$order->product->image}}"  width="80" alt="">
                </td>

              
            </tr>
          @endforeach
         

        </table>
    </div>
        
      

    @include('home.info')
    @endsection