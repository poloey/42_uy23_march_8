<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
  <link rel="stylesheet" href="/css/bootstrap.min.css">
</head>
<body>
  <div class="bg-info text-white py-5">
    <div class="container">
      <a href="/" class="btn btn-secondary">Home</a>
      <a href="/about" class="btn btn-secondary">About</a>
      <a href="/contact" class="btn btn-secondary">Contact</a>
    </div>
  </div>
  <div class="container my-4">
     @yield('content') 
  </div>
  <div class="bg-dark text-white text-center py-5">
    &copy; Feni college {{date('Y')}}. All rights reserved
  </div>
</body>
</html>