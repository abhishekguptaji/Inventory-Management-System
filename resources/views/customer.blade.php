<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Customer Details</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5">
  <h2>🧾 Enter Customer Details</h2>
  <form action="{{ route('cart.generateBill') }}" method="POST">
    @csrf
    <div class="mb-3">
      <label class="form-label">Customer Name</label>
      <input type="text" name="customer_name" class="form-control" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Mobile Number</label>
      <input type="text" name="mobile_number" class="form-control" required pattern="[0-9]{10}">
    </div>
    <div class="mb-3">
      <label class="form-label">Address</label>
      <textarea name="address" class="form-control"></textarea>
    </div>
    <div class="mb-3">
      <label class="form-label">Paid Amount</label>
      <input type="number" step="0.01" name="paid_amount" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Generate Bill</button>
  </form>
</body>
</html>
