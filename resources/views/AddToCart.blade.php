@extends('Layout')

@section('content')
<h1>Add To Cart</h1>
<br><br>


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
  <form method="POST" action="">
  {{ csrf_field() }}
    <tr>
      <td><img src="{{ asset('uploads/product/' . $item->image) }}" alt="image" width="300" heigth="400"><td>
      <td>{{$item->name}}</td>
      <td>{{$item->price}}</td>
      <td>{{$item->description}}</td> 
      <td><input class="quantity" min="0" name="quantity" value="1" type="number" id="quantity"></td>
      <td><input type="submit" value="Add To Cart"></td>
    </tr>
    </form>
    @endforeach
  </tbody>
</table>

@stop

