@extends('Layout')

@section('content')
<body style="background-color: #e7e7f0;">
<div class="container" style="text-align: center; background-color: white;">
<h3 style="text-align: left; margin-left: 15px;font-weight:bold;">Register</h3>
<br>
<form method="POST" action="">
        {{ csrf_field() }}
        <label for="Name">Name : </label><input type="text" name="name" id="name" style="margin-left: 90px;"> <br>
        <label for="Email">E-Mail Address : </label><input type="email" name="email" id="email" style="margin-left: 29px;"> <br>
        <label for="password">Password : </label><input type="password" name="password" id="password" style="margin-left: 66px;"> <br>
        <label for="password">Confirm Password : </label><input type="password" name="password_confirmation" id="password" style="margin-left: 10px;"> 
        <br><br>
        <input type="submit" value="submit">
        <br><br>
    </form>
</div>

@stop