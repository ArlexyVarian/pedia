<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header">
    <a class="navbar-brand" href="/admin" style="color: #40AF47; margin-left: 100px; font-weight: bold;">ADMIN</a>    
    </div>
      <ul class="nav navbar-nav navbar-left" style="margin-right: 100px;">
      @if($auth)
      
      <li><a href="/addProduct"><span class="glyphicon glyphicon-shopping-cart"></span>Add Product</a></li>
      <li><a href="/listProduct"><span class="glyphicon glyphicon-briefcase"></span> Show All Product</a></li>
      <li><a href="/addCategory"><span class="glyphicon glyphicon-plus"></span> Add Category</a></li>
      <li><a href="/listCategory"><span class="glyphicon glyphicon-plus-sign"></span> Show All Category</a></li>
      @else
        <li><a href="/login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
        <li><a href="/register"><span class="glyphicon glyphicon-user"></span> Register</a></li>
      @endif
      </ul>
      <ul class="nav navbar-nav navbar-right" style="margin-left: 100px;">
      <li><a href="/logout"><span class="glyphicon glyphicon-log-in"></span> Logut</a></li>
      <a class="navbar-brand" href="/" style="color: #40AF47; margin-left: 10px; font-weight: bold;">$okopedia</a>
      </ul>
    </div>
</nav>
<br><br>
<div class="container">
        @yield('admincontent')
</div>
</body>
</html>