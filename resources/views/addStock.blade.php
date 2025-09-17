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
<div class="container">
  <h3>📦 Add Stock</h3>

  <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-3">
    <a href="/newProduct" class="btn btn-success">➕ Create New Product</a>
  </div>

  <div class="search-box">
    <form action="{{ route('add.stock') }}" method="GET">
      <div class="row g-3 align-items-end">
        <div class="col-md-4">
          <label for="productName" class="form-label fw-bold">Product Name</label>
          <input type="text" name="productName" id="productName" class="form-control" required>
        </div>

        <div class="col-md-4">
          <label for="categoryProduct" class="form-label fw-bold">Category</label>
          <select id="categoryProduct" name="categoryProduct" class="form-select" required>
            <option value="" disabled selected>Select a category</option>
            <option value="tools">Tools</option>
            <option value="buildingMaterials">Building Materials</option>
            <option value="plumbing">Plumbing</option>
            <option value="electricalSupplies">Electrical Supplies</option>
            <option value="paintsAndCoating">Paints and Coating</option>
            <option value="locksAndSecurity">Locks and Security</option>
            <option value="engineParts">Engine Parts</option>
            <option value="plyAndCarpenter">Ply & Carpenter</option>
            <option value="othersMaterials">Others Materials</option>
          </select>
        </div>

        <div class="col-md-4">
          <button type="submit" class="btn btn-primary w-100">🔍 Search</button>
        </div>
      </div>
    </form>
  </div>

  <div class="table-container mt-4">
    @if(isset($products) && $products->count())
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Product Id</th>
            <th>Product Name</th>
            <th>Category</th>
            <th>Quantity</th>
            <th>Size</th>
            <th>Sell Price</th>
            <th>Update Stock</th>
          </tr>
        </thead>
        <tbody>
          @foreach($products as $product)
          <tr>
            <td>{{ $product->id }}</td>
            <td>{{ $product->productName }}</td>
            <td>{{ $product->categoryProduct }}</td>
            <td>{{ $product->quantity }}</td>
            <td>{{ $product->size }}</td>
            <td>₹{{ number_format($product->sellPrice, 2) }}</td>
            <td><a href="/updateStock/{{ $product->id }}" class="edit-link">✏ Edit Stock</a></td>
          </tr>
          @endforeach
        </tbody>
      </table>
    @else
      <p class="text-center text-muted mt-3">No products found.</p>
    @endif
  </div>
</div>
</body>
@else
  <script>window.location.href = "{{ route('login') }}";</script>
@endif

@include('component.Footer')
