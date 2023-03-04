@extends('AdminLayout')

@section('admincontent')
<h1>Category</h1>
<br><br>

<form method="POST" action="">
        {{ csrf_field() }}
        <label for="Category">Category : </label><input type="text" name="category" id="category"> <br>
        <input type="submit" value="submit">
    </form>

@stop