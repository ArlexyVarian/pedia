@extends('Layout')

@section('content')
<body style="background-color: #e7e7f1;">
<div class="container" style="text-align: center; background-color: white;">
<h3 style="text-align: left; margin-left: 15px;font-weight:bold;">Login</h3>
<br>
<form method="POST" action="">
        {{ csrf_field() }}
        <label for="Email">E-mail Address : </label><input type="email" name="email" id="email" style="margin-left: 10px;"> <br>
        <label for="password">Password : </label><input type="password" name="password" id="password" style="margin-left: 45px;"> 
        <br><br>
        <div class="form-group">
        <input type="checkbox" id="remember_me" name="remember_me" >
        <label for="remember_me">Remember me</label>
        <a href="#" style="color:#3662A5; margin-left: 15px;">Forgot Your Password?</a>
        </div>
        <input type="submit" value="submit">
    </form>
    <br>
</div>

@stop 