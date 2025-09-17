@include('component.header')

@if(session()->has('user'))
<head>
  <style>
    body{
      background: linear-gradient(135deg, #e0f7fa, #f8f9fa);
    }
   h3{
    text-align:center;
    padding-top:10px;
   }
  </style>
</head>
<body>
  <h3>New Customer</h3>
  <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-3 mx-5">
    <a href="productList" class="btn btn-primary ">Browse Product</a>
  </div>
   <div class="container-fluid px-5">
    <div class="row">
      <div class="new-customer">
    <form action="" method="Post">
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
          <label for="address" class="form-label fw-bold">Address</label>
          <input type="address" name="address" id="address" class="form-control" required placeholder="Enter customer name">
        </div>
      </div>
     
    </form>
   </div>
    </div>
   </div>
  






</body>
@else
  <script>window.location.href = "{{ route('login') }}";</script>
@endif

@include('component.Footer')