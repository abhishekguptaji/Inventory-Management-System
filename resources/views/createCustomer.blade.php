@include('component.header')

@if(session()->has('user'))
<head>
  <style>
    body {
      background-color: #eef2f7;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background: linear-gradient(135deg, #e0f7fa, #f8f9fa);
    }
    h3{
      text-align:center;
      padding-top:10px;
    }
    
  </style>
</head>
<body>
 <div class="container-fluid px-5 ">
  <h3>Customer Details</h3>
   <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-3">
    <a href="newCustomer" class="btn btn-success">➕ Create New Customer</a>
  </div>

   <div class="search-customer">
    <form action="" method="GET">
      <div class="row g-3 align-items-end">
        <div class="col-md-4">
          <label for="mobileNumber" class="form-label fw-bold">Mobile Number</label>
          <input type="num" name="mobileNumber" id="mobileNumber" class="form-control" required pattern="[0-9]{10}" placeholder="Enter 10-digit mobile number">
        </div>

        <div class="col-md-4">
          <label for="customerName" class="form-label fw-bold">Customer Name</label>
          <input type="num" name="customerName" id="customerName" class="form-control" required placeholder="Enter customer name">
        </div>

        <div class="col-md-4">
          <button type="submit" class="btn btn-primary w-100">🔍 Search</button>
        </div>
      </div>
      <a href="productList" class="btn btn-primary mt-2">Browse Product</a>
    </form>

   </div>





   


 </div>  
</body>
@else
  <script>window.location.href = "{{ route('login') }}";</script>
@endif

@include('component.Footer')

















