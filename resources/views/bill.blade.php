<head>
  <title>{{ $customer['customer_name'] }}: Bill</title>
</head>
<body>
  <style>
    body {
      font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
      color: #2c3e50;
      margin: 0;
      padding: 20px;
      background: #f5f5f5;
    }

    h2 {
      text-align: center;
      color: #1a73e8;
      margin-bottom: 5px;
      font-size: 28px;
    }

    h4 {
      text-align: center;
      color: #555;
      margin-top: 0;
      font-weight: normal;
      font-size: 18px;
    }

    p.date {
      text-align: right;
      font-size: 14px;
      color: #333;
      margin-bottom: 15px;
    }

    .customer-info {
      margin-bottom: 20px;
      border: 1px solid #ddd;
      padding: 15px;
      border-radius: 8px;
      background: #fff;
      box-shadow: 0 2px 5px rgba(0,0,0,0.05);
    }

    .customer-info p {
      margin: 5px 0;
      font-size: 14px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 10px;
      background: #fff;
      box-shadow: 0 2px 5px rgba(0,0,0,0.05);
    }

    table thead tr {
      background: #1a73e8;
      color: #fff;
      text-align: center;
      font-weight: bold;
    }

    table th, table td {
      border: 1px solid #ddd;
      padding: 10px;
      text-align: center;
      font-size: 14px;
    }

    tbody tr:nth-child(even) {
      background: #f9f9f9;
    }

    /* Highlight Grand Total / Paid / Balance rows */
    tbody tr.total-grand {
      font-weight: bold;
      background: #e8f0fe;
      color: #1a73e8;
      font-size: 16px;
    }

    tbody tr.total-paid {
      font-weight: bold;
      background: #d1e7dd;
      color: #0f5132;
      font-size: 16px;
    }

    tbody tr.total-balance {
      font-weight: bold;
      background: #f8d7da;
      color: #842029;
      font-size: 16px;
    }

    tbody tr.total td {
      padding: 8px;
    }

    .footer {
      text-align: center;
      margin-top: 30px;
      font-style: italic;
      color: #555;
      font-size: 14px;
    }

    /* Buttons row styling */
    .btn-link {
      text-decoration: none;
      color: #1a73e8;
      font-weight: 500;
    }

    .download-btn {
      padding: 6px 14px;
      font-size: 14px;
    }

    /* Buttons alignment */
    .buttons-row {
      margin-bottom: 15px;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    /* Responsive / print */
    @media print {
      body {
        background: #fff;
        padding: 0;
      }

      .btn-link, .download-btn, .buttons-row {
        display: none;
      }
    }
  </style>

  <!-- Buttons row -->
  <div class="buttons-row">
    <a href="/" class="btn btn-link">Go to Dashboard</a>
    <a href="{{ route('invoice.download', $bill->id) }}" 
       class="btn btn-success download-btn" target="_blank">
       Download Bill
    </a>
  </div>

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
          <td>{{ $item['size'] }}</td>
          <td>₹{{ number_format($item['price'],2) }}</td>
          <td>{{ $item['quantity'] }}</td>
          <td>₹{{ number_format($item['price'] * $item['quantity'],2) }}</td>
        </tr>
      @endforeach
      <tr class="total-grand">
        <td colspan="5">Grand Total</td>
        <td>₹{{ number_format($grandTotal,2) }}</td>
      </tr>
      <tr class="total-paid">
        <td colspan="5">Paid</td>
        <td>₹{{ number_format($paidAmount,2) }}</td>
      </tr>
      <tr class="total-balance">
        <td colspan="5">Balance</td>
        <td>₹{{ number_format($balance,2) }}</td>
      </tr>
    </tbody>
  </table>

  <p class="footer">Thank you for shopping with us!</p>
</body>
