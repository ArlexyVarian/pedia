@extends('Layout')

@section('content')

<h1>HOME</h1>

<table class="table">
  <thead>
    <tr>
      <th scope="col">Image</th>
      <th scope="col"></th>
      <th scope="col">Name</th>
      <th scope="col">Price</th>
    </tr>
  </thead>
  <tbody>
  @foreach($inventory as $item)
    <tr>
      <td><img src="{{ asset('uploads/product/' . $item->image) }}" alt="image" width="300" heigth="400"><td>
      <td>{{$item->name}}</td>
      <td>Rp. {{$item->price}}</td>
      @if($auth)
      <td><a class="btn btn-primary" href="{{ URL::to('/productDetails/'.$item->id) }}" role="button">View Product Detail</a></td>
      @else
      <td><a class="btn btn-primary" href="/login" role="button">View Product Detail</a></td>
      @endif
    </tr>
    @endforeach
  </tbody>
</table>

{{$inventory->links()}}

@stop

