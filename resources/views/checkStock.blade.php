@include('component.header')
@if(session()->has('user'))
<head>
  <style>
    body{
        background: linear-gradient(135deg, #e0f7fa, #f8f9fa);
    }
    h3 {
      text-align: center;
      font-weight: bold;
      color: #2c3e50;
    }

    .table-container {
      margin: 10px;
      max-width: 95%;
      background: #fff;
      padding: 20px;
      border-radius: 12px;
      box-shadow: 0px 4px 12px rgba(0,0,0,0.1);
    }

    table {
      width: 100%;
      border-collapse: collapse;
      border-radius: 10px;
      overflow: hidden;
    }

    thead {
      background: linear-gradient(45deg, #007bff, #00c6ff);
      color: #fff;
      font-weight: bold;
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
  </style>
</head>
<body>

<div class="table-container">
  <h3>Stock Details</h3>
  <table>
    <thead>
      <tr>
        <th>Product Code</th>
        <th>Product Name</th>
        <th>Size</th>
        <th>Quantity</th>
        <th>Category</th>
        <th>Cost Price</th>
        <th>Sell Price</th>
      </tr>
    </thead>
    <tbody>
      @foreach($products as $product)
        <tr>
          <td>{{ $product->id }}</td>
          <td>{{ $product->productName }}</td>
          <td>{{ $product->size }}</td>
          <td>{{ $product->quantity }}</td>
          <td>{{ $product->categoryProduct }}</td>
          <td>₹{{ number_format($product->costPrice, 2) }}</td>
          <td>₹{{ number_format($product->sellPrice, 2) }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>

</body>
@else
  <script>window.location.href = "{{ route('login') }}";</script>
@endif

@include('component.Footer')
