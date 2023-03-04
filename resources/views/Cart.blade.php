@extends('Layout')

@section('content')

<h1>Cart</h1>

<table class="table">
  <thead>
    <tr>
      <th scope="col">Image</th>
      <th scope="col"></th>
      <th scope="col">Name</th>
      <th scope="col">Price</th>
      <th scope="col">Quantity</th>
    </tr>
  </thead>
  <tbody>
  @foreach($cart as $item)
    <tr>
      <td><img src="{{ asset('uploads/product/' . $item->image) }}" alt="image" width="300" heigth="400"><td>
      <td>{{$item->name}}</td>
      <td>Rp. {{$item->price}}</td>
      <td>{{$item->quantity}}</td>
      <td><a class="btn btn-primary" href="{{ URL::to('/cartDelete/'.$item->id) }}" role="button">Delete</a></td>
      <td><a class="btn btn-primary" href="/cartPlus" role="button">+</a></td>
      <td><a class="btn btn-primary" href="/cartMinus" role="button">-</a></td>
    </tr>
    @endforeach
  </tbody>
</table>

<a class="btn btn-primary" href="/checkout" role="button">Checkout</a>


@stop

