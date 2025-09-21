@include('component.header')

@if(session()->has('user'))
<style>
  body {
    background-color: #f8f9fa;
    font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
    background: linear-gradient(135deg, #e0f7fa, #f8f9fa);
  }

  h3, h4 {
    font-weight: bold;
    color: #2c3e50;
    margin: 15px 0;
  }

  /* Category list styling */
  .categorylist {
    display: flex;
    flex-wrap: wrap;
    gap: 12px;
    list-style: none;
    padding: 0;
    margin: 0 auto;
    justify-content: center;
  }

  .categorylist li a {
    text-decoration: none;
    padding: 10px 18px;
    background: linear-gradient(135deg, #007bff, #00c6ff);
    border-radius: 25px;
    color: #fff;
    font-weight: 600;
    box-shadow: 0px 2px 6px rgba(0,0,0,0.15);
    transition: all 0.3s ease;
    display: inline-block;
  }

  .categorylist li a:hover {
    background: linear-gradient(135deg, #0056b3, #0096c7);
    transform: scale(1.05);
  }

  /* Table styling */
  .table-container {
    margin: 20px auto;
    max-width: 100%;
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
</style>
</head>
<body>

<div class="container-fluid">
  <div class="row">
    <div class="main-categorylist pt-3 pb-3 text-center">
      <ul class="categorylist">
        <li><a href="{{ route('products.byCategory', ['category' => 'Tools']) }}">Tools</a></li>
        <li><a href="{{ route('products.byCategory', ['category' => 'buildingMaterials']) }}">Building Materials</a></li>
        <li><a href="{{ route('products.byCategory', ['category' => 'Plumbing']) }}">Plumbing</a></li>
        <li><a href="{{ route('products.byCategory', ['category' => 'electricalSupplies']) }}">Electrical Supplies</a></li>
        <li><a href="{{ route('products.byCategory', ['category' => 'paintsAndCoating']) }}">Paints & Coatings</a></li>
        <li><a href="{{ route('products.byCategory', ['category' => 'locksAndSecurity']) }}">Locks & Security</a></li>
        <li><a href="{{ route('products.byCategory', ['category' => 'engineParts']) }}">Engine Parts</a></li>
        <li><a href="{{ route('products.byCategory', ['category' => 'ply&Carparenter']) }}">Ply & Carpenter</a></li>
        <li><a href="{{ route('products.byCategory', ['category' => 'othersMaterials']) }}">Other Materials</a></li>
      </ul>
    </div>
  </div>

  @if(isset($products))
    <div class="row">
      <div class="table-container">
        <h4 class="text-center mb-3">Products in Category: <span style="color:#007bff">{{ $selectedCategory }}</span></h4>
        <table>
          <thead>
            <tr>
              <th>Product Code</th>
              <th>Product Name</th>
              <th>Size</th>
              <th>Quantity</th>
              <th>Cost Price</th>
              <th>Sell Price</th>
            </tr>
          </thead>
          <tbody>
            @forelse($products as $product)
              <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->productName }}</td>
                <td>{{ $product->size }}</td>
                <td>{{ $product->quantity }}</td>
                <td>₹{{ number_format($product->costPrice, 2) }}</td>
                <td>₹{{ number_format($product->sellPrice, 2) }}</td>
              </tr>
            @empty
              <tr>
                <td colspan="6" class="text-muted">No products found in this category.</td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  @endif
</div>

</body>
@else
  <script>window.location.href = "{{ route('login') }}";</script>
@endif

@include('component.Footer')
