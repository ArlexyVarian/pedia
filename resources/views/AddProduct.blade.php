@extends('AdminLayout')

@section('admincontent')
<h1>Add Product</h1>
<br><br>

<form method="POST" action="" enctype="multipart/form-data">
        {{ csrf_field() }}
        <label for="Name">Name : </label><input type="text" name="name" id="name"> <br>
        <label for="Category">Category : </label><input type="text" name="category" id="category"> <br>
        <label for="Description">Description : </label><input type="text" name="description" id="description"> <br>
        <label for="Price">Price : </label><input type="number" name="price" id="price"> <br>
        <label for="Image">Image : </label><input type="file" name="image" id="image"><br>
        <input type="submit" value="submit">
    </form> 

@stop