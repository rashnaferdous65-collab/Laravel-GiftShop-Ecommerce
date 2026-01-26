@extends('layouts.app') 


@section('title', 'Giftshop-That is what makes you surprised.') 


@section('content') 
    
    <body> 

   
       @include('home.header') 

    @include('home.shop')
  
    @include('home.info')
    @endsection