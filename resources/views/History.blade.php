@extends('Layout')

@section('content')

<h1>Detail Transaction</h1>

<table class="table">
  <thead>
    <tr>
      <th scope="col">Product Image</th>
      <th scope="col"></th>
      <th scope="col">Product Name</th>
      <th scope="col">Quantity</th>
      <th scope="col">Product Price</th>
    </tr>
  </thead>
  <tbody>
  @foreach($transaction as $item)
    <tr>
      <td><img src="{{ asset('uploads/product/' . $item->image) }}" alt="image" width="300" heigth="400"><td>
      <td>{{$item->name}}</td>
      <td>{{$item->quantity}}</td>
      <td>Rp. {{$item->price}}</td>
    </tr>
    @endforeach
  </tbody>
</table>


@stop