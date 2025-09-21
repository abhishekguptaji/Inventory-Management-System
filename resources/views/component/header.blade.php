<head>
  <title>Home | Hardware Store</title>
  <link rel="stylesheet"
   href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
  <style>
    .header {
      background: linear-gradient(135deg, #158e76ff, #093663ff);
    }

    * {
      margin: 0;
      padding: 0;
    }

    /* Make all navbar text white */
    .navbar .navbar-brand,
    .navbar .nav-link,
    .navbar .btn {
      color: #fff !important;
      font:bold;
    }

    /* Hover effect */
    .navbar .nav-link:hover,
    .navbar .btn:hover {
      text-decoration: underline;
      color: #f1f1f1 !important;
    }

  </style>
</head>
<body>
   <nav class="navbar navbar-expand-md bg-body-tertiary header">
    <div class="container-fluid main-nav">
      <a class="navbar-brand" href="#"><h2>Hardware Store</h2></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item"><a class="nav-link active" href="/">Product Board</a></li>
          <li class="nav-item"><a class="nav-link active" href="/addStock">Add Stock</a></li>
          <li class="nav-item"><a class="nav-link active" href="/checkStock">Check Stock</a></li>
          <li class="nav-item"><a class="nav-link active" href="/aboutEnd">About End</a></li>
          <li class="nav-item"><a class="nav-link active" href="/categoryList">Category List</a></li>

      @if(session()->has('user'))
          <li class="nav-item">
            <form action="{{ route('logout') }}" method="POST">
              @csrf
              <button type="submit" class="btn">Logout</button>
            </form>
          </li>
          @else
          <li class="nav-item">
            <a class="nav-link active" href="/login">Login</a>
          </li>
          @endif
        </ul>
      </div>
    </div>
  </nav>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
