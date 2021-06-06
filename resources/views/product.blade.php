@extends('product-layout')
@section('menu')
@include('\includes\menu')
    
@endsection

@section('content')
  <article>
      <h2>{{$product->product_name}}</h2>
      <p>{{$product->product_desc}}</p>
      <p>{{$product->price}}</p>
  </article>
  <a href='/'> Go To Home</a>




@endsection