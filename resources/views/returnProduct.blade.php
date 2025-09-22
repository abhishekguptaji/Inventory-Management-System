@include('component.header')

@if(session()->has('user'))
<head>
  <style>
    body {
      background-color: #f8f9fa;
      background: linear-gradient(135deg, #e0f7fa, #f8f9fa);
    }

    h3 {
      text-align: center;
      margin: 20px 0;
      font-weight: bold;
      color: #2c3e50;
    }

    .search-box {
      background: #fff;
      padding: 20px;
      border-radius: 12px;
      box-shadow: 0px 4px 12px rgba(0,0,0,0.1);
      margin-bottom: 30px;
    }

    .table-container {
      background: #fff;
      padding: 20px;
      border-radius: 12px;
      box-shadow: 0px 4px 12px rgba(0,0,0,0.1);
    }

    table {
      width: 100%;
      border-collapse: collapse;
      overflow: hidden;
      border-radius: 10px;
    }

    thead {
      background: linear-gradient(45deg, #007bff, #00c6ff);
      color: #fff;
    }

    th, td {
      padding: 12px 15px;
      text-align: center;
    }

    tr:nth-child(even) {
      background-color: #f9f9f9;
    }

    tr:hover {
      background-color: #f1faff;
      transition: 0.3s;
    }

    a.edit-link {
      text-decoration: none;
      color: #007bff;
      font-weight: 600;
    }

    a.edit-link:hover {
      color: #0056b3;
      text-decoration: underline;
    }
  </style>
</head>
<body>
    <h3>Return Product</h3>
    <div class="container">
  <div class="search-box">
    <form action="{{route('return.product')}}" method="GET">
      <div class="row g-3 align-items-end">
        <div class="col-md-4">
          <label for="mobile_number" class="form-label fw-bold">Mobile Number</label>
          <input type="text" name="mobile_number" id="mobile_number" class="form-control" required>
        </div>

        <div class="col-md-4">
          <label for="customer_name" class="form-label fw-bold">Customer Name</label>
          <input type="text" name="customer_name" id="customer_name" class="form-control" required>
        </div>

        <div class="col-md-4">
          <button type="submit" class="btn btn-primary w-100">🔍 Search</button>
        </div>
      </div>
    </form>
  </div>
  <!--  -->
  <div class="table-container mt-4">
    @if(isset($customer) && $customer->count())
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Mobile Number</th>
            <th>Customer Name</th>
            <th>Address</th>
            <th>Total Amount</th>
            <th>Paid Amount</th>
            <th>Balance Amount</th>
            <th>Return Product</th>
          </tr>
        </thead>
        <tbody>
          @foreach($customer as $cus)
          <tr>
            <td>{{ $cus->mobile_number }}</td>
            <td>{{ $cus->customer_name }}</td>
            <td>{{ $cus->address }}</td>
            <td>₹{{ number_format($cus->grand_total, 2) }}</td>
            <td>₹{{ number_format( $cus->paid_amount, 2) }}</td>
            <td>₹{{ number_format($cus->balance, 2) }}</td>
            <td><a href="" class="edit-link">Return Product</a></td>
          </tr>
          @endforeach
        </tbody>
      </table>
    @else
      <p class="text-center text-muted mt-3">No Customer Found.</p>
    @endif
  <!-- </div> -->
  <!--  -->
</div>
</div>
</body>
@else
  <script>window.location.href = "{{ route('login') }}";</script>
@endif

@include('component.Footer')




