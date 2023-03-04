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
    <a class="navbar-brand" href="/" style="color: #40AF47; margin-left: 100px; font-weight: bold;">$okopedia</a>    
    </div>
      <ul class="nav navbar-nav navbar-right" style="margin-right: 100px;">
      @if($auth)
      <li><a href="/logout"><span class="glyphicon glyphicon-log-in"></span> Logut</a></li>
      <li><a href="/cart"><span class="glyphicon glyphicon-shopping-cart"></span>Cart</a></li>
      <li><a href="/history"><span class="glyphicon glyphicon-tags"></span> History</a></li>
      @else
        <li><a href="/login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
        <li><a href="/register"><span class="glyphicon glyphicon-user"></span> Register</a></li>
      @endif
      </ul>
    </div>
</nav>
<br><br>
<div class="container">
        @yield('content')
</div>

</body>
</html>