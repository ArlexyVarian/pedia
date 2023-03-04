@extends('Layout')

@section('content')

<h1>Product Details</h1>
<br><br>

<h2>Image</h2>

<table class="table">
  <thead>
    <tr>
      <th scope="col">Image</th>
      <th scope="col"></th>
      <th scope="col">Name</th>
      <th scope="col">Price</th>
      <th scope="col">Description </th>
    </tr>
  </thead>
  <tbody>
  @foreach($inventory as $item)
    <tr>
      <td><img src="{{ asset('uploads/product/' . $item->image) }}" alt="image" width="300" heigth="400"><td>
      <td>{{$item->name}}</td>
      <td>{{$item->price}}</td>
      <td>{{$item->description}}</td> 
      <td><a class="btn btn-primary" href="{{ URL::to('/addToCart/'.$item->id) }}" role="button">Add To Cart</a></td>
    </tr>
    @endforeach
  </tbody>
</table>

@stop