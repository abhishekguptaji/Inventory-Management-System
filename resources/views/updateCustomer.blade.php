@include('component.header')

@if(session()->has('user'))
<meta charset="UTF-8">
<head>
  <title>Bill Update</title>
  <style>
    body {
      font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
      color: #2c3e50;
      margin: 0;
      padding: 0;
      background: #f4f6f9;
    }

    h2, h3, h4 {
      margin: 0;
      color: #007bff;
    }

    /* 🔹 Flex container for left and right */
    .main-container {
      display: flex;
      gap: 20px;
      flex-wrap: wrap; /* responsive wrap on small screens */
    }

    .left-section {
      flex: 2;
      min-width: 400px;
    }

    .right-section {
      flex: 1;
      min-width: 250px;
    }

    .customer-info {
      margin-bottom: 20px;
      padding: 15px 20px;
      border-radius: 12px;
      background: #ffffff;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
    }

    .customer-info p {
      margin: 6px 0;
      font-size: 15px;
    }

    .table-container {
      max-height: 400px;
      overflow-y: auto;
      border-radius: 10px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.08);
      margin-top: 10px;
      background: #fff;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      min-width: 700px;
    }

    table thead tr {
      background: linear-gradient(120deg, #4facfe, #00f2fe);
      color: #fff;
      text-align: center;
      position: sticky;
      top: 0;
      z-index: 2;
    }

    table th, table td {
      border: 1px solid #e6e6e6;
      padding: 12px 10px;
      text-align: center;
      font-size: 15px;
    }

    tbody tr:nth-child(even) { background-color: #f9f9f9; }
    tbody tr:hover { background-color: #f1faff; transition: 0.3s; }
    tbody tr.total { font-weight: bold; background: #f1f3f6; }
    tbody tr.total td { padding: 10px; font-size: 15px; color: #007bff; }

    /* 🔹 Form Section Right */
    .form-section {
      padding: 20px;
      background: #ffffff;
      border-radius: 12px;
      box-shadow: 0 6px 16px rgba(0,0,0,0.12);
    }

    .form-section h3 {
      margin-bottom: 15px;
      font-weight: 600;
      text-align: center;
    }

    .form-section form {
      display: flex;
      flex-direction: column;
      gap: 15px;
    }

    .input-group {
      display: flex;
      align-items: center;
      border: 1px solid #ccc;
      border-radius: 6px;
      overflow: hidden;
    }

    .input-group-text {
      background: #007bff;
      color: #fff;
      padding: 10px 14px;
      border: none;
      font-weight: bold;
    }

    .form-control {
      flex: 1;
      padding: 10px;
      border: none;
      outline: none;
      font-size: 15px;
    }

    .btn-primary {
      padding: 10px;
      background: #007bff;
      border: none;
      border-radius: 6px;
      color: #fff;
      font-size: 16px;
      cursor: pointer;
      transition: 0.3s;
    }

    .btn-primary:hover {
      background: #0056b3;
      transform: translateY(-2px);
      box-shadow: 0 4px 12px rgba(0, 123, 255, 0.3);
    }

    /* Responsive for smaller screens */
    @media (max-width: 900px) {
      .main-container {
        flex-direction: column;
      }
      .left-section, .right-section {
        min-width: 100%;
      }
    }

  </style>
</head>
<body>

  <div class="main-container">

    <!-- Left: Customer info + table -->
    <div class="left-section">
      <div class="customer-info">
        <p><strong>Customer Name:</strong> {{$customer->customer_name}}</p>
        <p><strong>Mobile:</strong> {{$customer->mobile_number}}</p>
        <p><strong>Address:</strong> {{$customer->address}}</p>
      </div>

      <div class="table-container">
        <table>
          <thead>
            <tr>
              <th>#</th>
              <th>Product</th>
              <th>Size</th>
              <th>Price</th>
              <th>Qty</th>
              <th>Total</th>
            </tr>
          </thead>
          <tbody>
            @foreach(json_decode($customer->items) as $index => $cus)
            <tr>
              <td>{{ $index + 1 }}</td>
              <td>{{ $cus->name }}</td>
              <td>{{ $cus->size ?? '-' }}</td>
              <td>₹{{ number_format($cus->price,2) }}</td>
              <td>{{ $cus->quantity }}</td>
              <td>₹{{ number_format($cus->price * $cus->quantity,2) }}</td>
            </tr>
            @endforeach

            <tr class="total">
              <td colspan="5">Grand Total</td>
              <td>₹{{ number_format($customer->grand_total,2) }}</td>
            </tr>
            <tr class="total">
              <td colspan="5">Paid</td>
              <td>₹{{ number_format($customer->paid_amount,2) }}</td>
            </tr>
            <tr class="total">
              <td colspan="5">Balance</td>
              <td>₹{{ number_format($customer->balance,2) }}</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <!-- Right: Form -->
     @if($customer->balance>0)
    <div class="right-section">
      <div class="form-section">
        <h3>Update Payment</h3>
        <form action="/updateCustomer/{{$customer->id}}" method="POST">
          @csrf
          <label for="updatePaidAmount" class="form-label">Update Paid Amount</label>
          <div class="input-group">
            <span class="input-group-text">₹</span>
            <input 
              type="number" 
              step="0.01" 
              name="paid_amount" 
              id="updatePaidAmount" 
              class="form-control" 
              value="{{ $customer->paid_amount }}" 
              required
            >
          </div>
          <button type="submit" class="btn-primary">Update</button>
        </form>
      </div>
    </div>
   @endif
  </div>

</body>
@else
  <script>window.location.href = "{{ route('login') }}";</script>
@endif

@include('component.Footer')
