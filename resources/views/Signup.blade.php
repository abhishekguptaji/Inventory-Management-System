@include('component.header')

<div class="container">
  <h2>Create Account</h2>
  <form action="/SignUp" method="POST">
    @csrf

    <div class="mb-3">
      <label for="name" class="form-label">Full Name</label>
      <input type="text" name="name" id="name" class="form-control" required>
    </div>

    <div class="mb-3">
      <label for="email" class="form-label">Email Address</label>
      <input type="email" name="email" id="email" class="form-control" required>
    </div>

    <div class="mb-3">
      <label for="post" class="form-label">Designation</label>
      <input type="text" name="post" id="post" class="form-control" required>
    </div>

    <div class="mb-3">
      <label for="password" class="form-label">Password</label>
      <input type="password" name="password" id="password" class="form-control" required>
    </div>

    <div class="mb-3">
      <label for="password_confirmation" class="form-label">Confirm Password</label>
      <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
    </div>

    <div class="d-grid">
      <button type="submit" class="btn btn-success">Sign Up</button>
    </div>

    <div class="mt-3 text-center">
      <p>Already have an account?<a href="/login"> Login</a></p>
    </div>
  </form>
</div>

@include('component.Footer')

<style>
  body {
    background-color: #e9ecef;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background: linear-gradient(135deg, #e0f7fa, #f8f9fa);
  }

  .container {
    max-width: 480px;
    margin: 5px auto;
    padding: 20px;
    background: #ffffff;
    border-radius: 12px;
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
    transition: transform 0.2s ease-in-out;
  }

  .container:hover {
    transform: translateY(-2px);
  }

  h2 {
    text-align: center;
    /* margin-bottom: 25px; */
    font-weight: 600;
    color: #2c3e50;
  }

  .form-label {
    font-weight: 500;
    color: #333;
  }

  .form-control {
    border-radius: 8px;
    padding: 4px;
    border: 1px solid #ccc;
    transition: all 0.2s ease-in-out;
  }

  .form-control:focus {
    border-color: #28a745;
    box-shadow: 0 0 5px rgba(40, 167, 69, 0.3);
  }

  .btn-success {
    padding: 10px;
    font-weight: 600;
    border-radius: 8px;
    transition: background-color 0.3s ease-in-out, transform 0.2s ease-in-out;
  }

  .btn-success:hover {
    background-color: #218838;
    transform: translateY(-1px);
  }

  .text-center p {
    margin-top: 15px;
    font-size: 14px;
    color: #555;
  }

  .text-center a {
    color: #28a745;
    text-decoration: none;
    font-weight: 600;
    margin-left: 5px;
  }

  .text-center a:hover {
    text-decoration: underline;
  }
</style>
