<head>
  <title>{{ $customer['customer_name'] }}:Bill</title>
</head>
<body>
  <style>
    body {
      font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
      color: #2c3e50;
      margin: 0;
      padding: 20px;
    }

    h2 {
      text-align: center;
      color: #007bff;
      margin-bottom: 5px;
    }

    h4 {
      text-align: center;
      color: #555;
      margin-top: 0;
    }

    p.date {
      text-align: right;
      font-size: 14px;
    }

    .customer-info {
      margin-bottom: 15px;
      border: 1px solid #ddd;
      padding: 10px;
      border-radius: 8px;
      background: #f9f9f9;
    }

    .customer-info p {
      margin: 3px 0;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 10px;
    }

    table thead tr {
      background: #007bff;
      color: #fff;
      text-align: center;
    }

    table th, table td {
      border: 1px solid #ddd;
      padding: 8px;
      text-align: center;
    }

    tbody tr:nth-child(even) {
      background: #f9f9f9;
    }

    tbody tr.total {
      font-weight: bold;
      background: #f1f1f1;
      text-align: right;
    }

    tbody tr.total td {
      padding: 6px;
    }

    .footer {
      text-align: center;
      margin-top: 30px;
      font-style: italic;
      color: #555;
    }
  </style>

  <h2>{{ $shopName }}</h2>
  <h4>Invoice / Bill</h4>
  <p class="date"><strong>Date:</strong> {{ $date }}</p>

  <div class="customer-info">
    <p><strong>Customer Name:</strong> {{ $customer['customer_name'] }}</p>
    <p><strong>Mobile:</strong> {{ $customer['mobile_number'] }}</p>
    <p><strong>Address:</strong> {{ $customer['address'] }}</p>
  </div>

  <table>
    <thead>
      <tr>
        <th>#</th>
        <th>Product</th>
        <th>Category</th>
        <th>Size</th>
        <th>Price</th>
        <th>Qty</th>
        <th>Total</th>
      </tr>
    </thead>
    <tbody>
      @php $i=1; @endphp
      @foreach($cart as $item)
        <tr>
          <td>{{ $i++ }}</td>
          <td>{{ $item['name'] }}</td>
          <td>{{ $item['category'] }}</td>
          <td>{{ $item['size'] }}</td>
          <td>₹{{ number_format($item['price'],2) }}</td>
          <td>{{ $item['quantity'] }}</td>
          <td>₹{{ number_format($item['price'] * $item['quantity'],2) }}</td>
        </tr>
      @endforeach
      <tr class="total">
        <td colspan="6">Grand Total</td>
        <td>₹{{ number_format($grandTotal,2) }}</td>
      </tr>
      <tr class="total">
        <td colspan="6">Paid</td>
        <td>₹{{ number_format($paidAmount,2) }}</td>
      </tr>
      <tr class="total">
        <td colspan="6">Balance</td>
        <td>₹{{ number_format($balance,2) }}</td>
      </tr>
    </tbody>
  </table>
  <p class="footer">Thank you for shopping with us!</p>
</body>
