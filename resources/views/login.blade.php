@include('component.header')
<html>
<head>
<style>
    body {
      background-color: #f8f9fa;
      background: linear-gradient(135deg, #e0f7fa, #f8f9fa);
    }
    .login-container {
      max-width: 400px;
      margin: 80px auto;
      padding: 20px;
      background-color: #ffffff;
      border-radius: 10px;
      box-shadow: 0 0 15px rgba(0,0,0,0.1);
    }
    h1 {
      text-align: center;
      margin-bottom: 25px;
    }

  </style>
</head>
<body>
<div class="login-container">
    <h1>Login Page</h1>
    <form action="/login" method="post">
      @csrf
      <div class="mb-3 pt-3">
        <input type="email" name="email" class="form-control" placeholder="Enter your email" required>
      </div>
      <div class="mb-3">
        <input type="password" name="password" class="form-control" placeholder="Enter your password" required>
      </div>
      <div class="d-grid">
        <button type="submit" class="btn btn-primary">Login</button>
      </div>
    </form>
    <p class="pt-5">If you have not account SignUp first.
      <a href="/SignUp">SignUp</a>
    </p>
  </div>    
</body>
</html>


  
  @include('component.Footer')