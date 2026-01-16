@extends('layouts.app') 


@section('title', 'Giftshop-That is what makes you surprised.') 


@section('content') 
    
    <body> 

    <div class="hero_area">
       
           
        @include('home.header') 

        @include('home.slider')
        </div>
      

    @include('home.shop')
    @include('home.contact')
    @include('home.info')
    @endsection