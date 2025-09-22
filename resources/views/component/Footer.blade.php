<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Footer</title>
  <link rel="stylesheet"
   href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
   <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
   <style>
    .main-footer{
      position: fixed;
      bottom: 0;
     width:100%;
    }
   </style>

</head>
<body>
  <div class="container-fluid main-footer">
   <ul class="footer-list">
    <li><a href="/billsDashboard">DashBoard</a></li>
    <li><a href="/about">About</a></li>
    <li><a href="/customerdata">Customer Details</a></li> 
    <li><a href="/productList">ProductList</a></li>
    <li><a href="/cart">Cart</a></li>
    <li><a href="/returnProduct">Return Product</a></li>
   </ul>
  </div>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>