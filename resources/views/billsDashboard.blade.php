@include('component.header')

@if(session()->has('user'))
<head>
  <style>
    body {
      background-color: #f8f9fa;
      background: linear-gradient(135deg, #e0f7fa, #f8f9fa);
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }  
    h2 {
      text-align: center;
      font-weight: bold;
      color: #2c3e50;
    }
    .dashboard-card {
      border-radius: 15px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
      text-align: center;
      padding: 20px;
      transition: transform 0.2s ease-in-out;
    }
    .dashboard-card:hover {
      transform: translateY(-5px);
    }
    .dashboard-card h4 {
      font-size: 18px;
      font-weight: 600;
      margin-bottom: 5px;
      color: #34495e;
    }
    .dashboard-card p {
      font-size: 20px;
      font-weight: bold;
      color: #007bff;
    }
  </style>
</head>
<body>
<div class="container">
  <h2 class="p-3">Main Dashboard</h2>
  <div class="row g-4">
    <div class="col-md-4">
      <div class="dashboard-card bg-white">
        <h4>Total Products</h4>
        <p>{{ $productCount }}</p>
      </div>
    </div>
    <div class="col-md-4">
      <div class="dashboard-card bg-white">
        <h4>Total Cost Price</h4>
        <p>₹{{ number_format($costPrice,2) }}</p>
      </div>
    </div>
    <div class="col-md-4">
      <div class="dashboard-card bg-white">
        <h4>Total Market Price</h4>
        <p>₹{{ number_format($mkPrice,2) }}</p>
      </div>
    </div>
    <div class="col-md-4">
      <div class="dashboard-card bg-white">
        <h4>Total Quantity of Product</h4>
        <p>{{ $toalProduct }} Pc</p>
      </div>
    </div>
    <div class="col-md-4">
      <div class="dashboard-card bg-white">
        <h4>Lifetime Customers</h4>
        <p>{{ $billCount }}+</p>
      </div>
    </div>
    <div class="col-md-4">
      <div class="dashboard-card bg-white">
        <h4>Lifetime Sales</h4>
        <p>₹{{ number_format($toalAmount,2) }}</p>
      </div>
    </div>
    <div class="col-md-6">
      <div class="dashboard-card bg-white">
        <h4>Amount Received</h4>
        <p>₹{{ number_format($paidAmount,2) }}</p>
      </div>
    </div>
    <div class="col-md-6">
      <div class="dashboard-card bg-white">
        <h4>Amount in Market</h4>
        <p>₹{{ number_format($balanceAmount,2) }}</p>
      </div>
    </div>
  </div>
</div>  
</body>

@else
  <script>window.location.href = "{{ route('login') }}";</script>
@endif

@include('component.Footer')
