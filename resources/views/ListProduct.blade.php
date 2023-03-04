@extends('AdminLayout')

@section('admincontent')
<h1>Product List</h1>
<br><br>

<table class="table">
  <thead>
    <tr>
      <th scope="col">Product Id</th>
      <th scope="col">Product Image</th>
      <th scope="col"></th>
      <th scope="col">Product Name</th>
      <th scope="col">Product Category</th>
      <th scope="col">Product Price</th>
      <th scope="col">Product Description</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  @foreach($produc as $item)
    <tr>
      <td>{{$item->id}}</td>
      <td><img src="{{ asset('uploads/product/' . $item->image) }}" alt="image" width="300" heigth="400"><td>
      <td>{{$item->name}}</td>
      <td>{{$item->category}}</td>
      <td>Rp. {{$item->price}}</td>
      <td>{{$item->description}}</td>
      <td><a class="btn btn-primary" href="{{ URL::to('/delete/{id}'.$item->id) }}" role="button">Delete</a></td>
    </tr>
    @endforeach
  </tbody>
</table>

{{$produc->links()}}

@stop