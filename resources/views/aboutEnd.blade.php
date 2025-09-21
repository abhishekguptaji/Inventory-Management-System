@include('component.header')

@if(session()->has('user'))
<head>
  <style>
    body {
      background-color: #f8f9fa;
      font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
    }

    h3 {
      font-weight: bold;
      color: #2c3e50;
    }

    table {
      width: 90%;
      margin: 20px auto;
      border-collapse: collapse;
      border-radius: 10px;
      overflow: hidden;
      box-shadow: 0px 4px 12px rgba(0,0,0,0.1);
      background: #fff;
    }

    thead {
      background: linear-gradient(45deg, #007bff, #00c6ff);
      color: #fff;
      font-size: 1rem;
      text-transform: uppercase;
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

    td.quantity {
      font-weight: bold;
      color: #e74c3c;
    }
  </style>
</head>
<body>
<div class="container">
  <div class="row">
     <h3 class="text-center mt-3 mb-3">About End Product</h3>
  </div>
  <div class="row">
    <table>
      <thead>
        <tr>
          <th>Product Code</th>
          <th>Product Name</th>
          <th>Category</th>
          <th>Size</th>
          <th>Quantity</th>
        </tr> 
      </thead>
      <tbody>
        @foreach($products as $product)
          <tr>
            <td>{{ $product->id }}</td>
            <td>{{ $product->productName }}</td>
            <td>{{ $product->categoryProduct }}</td>
            <td>{{ $product->size }}</td>
            <td class="quantity">{{ $product->quantity }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
</body>
@else
  <script>window.location.href = "{{ route('login') }}";</script>
@endif

@include('component.Footer')
