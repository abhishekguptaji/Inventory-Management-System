@include('component.header')  
@if(session()->has('user')) 
<head>
  <style>
    body {
      background: linear-gradient(135deg, #e0f7fa, #f8f9fa);
      font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
      margin: 0;
      padding: 0;
      color: #2c3e50;
    }

    h3, h4 {
      font-weight: bold;
      color: #34495e;
      margin: 15px 0;
    }

    /* Category list styling */
    .categorylist {
      display: flex;
      flex-wrap: wrap;
      gap: 10px;
      list-style: none;
      padding: 0;
      margin: 0 auto;
      justify-content: center;
    }

    .categorylist li a {
      text-decoration: none;
      padding: 12px 20px;
      background: linear-gradient(135deg, #007bff, #00c6ff);
      border-radius: 30px;
      color: #fff;
      font-weight: 600;
      font-size: 15px;
      box-shadow: 0px 4px 10px rgba(0,0,0,0.15);
      transition: all 0.3s ease-in-out;
      display: inline-block;
    }

    .categorylist li a:hover {
      background: linear-gradient(135deg, #0056b3, #0096c7);
      transform: translateY(-3px) scale(1.07);
      box-shadow: 0px 6px 14px rgba(0,0,0,0.2);
    }

   .card {
    border-radius: 15px;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
  }

  .card:hover {
    transform: translateY(-5px);
    box-shadow: 0px 6px 18px rgba(0,0,0,0.15);
  }

  .card-title {
    font-size: 18px;
    margin-bottom: 10px;
  }

  .card-text {
    font-size: 14px;
    color: #555;
  }

  /* Quantity buttons */
  .quantity-btn {
    display: inline-block;
    margin: 0 5px;
    padding: 8px 14px;
    border-radius: 50%;
    background: linear-gradient(135deg, #007bff, #00c6ff);
    color: #fff;
    font-size: 16px;
    font-weight: bold;
    line-height: 1;
    cursor: pointer;
    box-shadow: 0px 2px 6px rgba(0,0,0,0.15);
    transition: all 0.3s ease;
  }

  .quantity-btn:hover {
    background: linear-gradient(135deg, #0056b3, #0096c7);
    transform: scale(1.1);
  }

  /* Price highlight */
  .price {
    color: #28a745;
    font-weight: 600;
  }
  </style>
</head>
<body>
  <div class="container-fluid">
    <div class="row">
      <div class="main-categorylist pt-3 pb-3 text-center">
        <ul class="categorylist">
          <li><a href="{{ route('cartProducts.byCategory', ['category' => 'Tools']) }}">Tools</a></li>
          <li><a href="{{ route('cartProducts.byCategory', ['category' => 'buildingMaterials']) }}">Building Materials</a></li>
          <li><a href="{{ route('cartProducts.byCategory', ['category' => 'Plumbing']) }}">Plumbing</a></li>
          <li><a href="{{ route('cartProducts.byCategory', ['category' => 'electricalSupplies']) }}">Electrical Supplies</a></li>
          <li><a href="{{ route('cartProducts.byCategory', ['category' => 'paintsAndCoating']) }}">Paints & Coatings</a></li>
          <li><a href="{{ route('cartProducts.byCategory', ['category' => 'locksAndSecurity']) }}">Locks & Security</a></li>
          <li><a href="{{ route('cartProducts.byCategory', ['category' => 'engineParts']) }}">Engine Parts</a></li>
          <li><a href="{{ route('cartProducts.byCategory', ['category' => 'ply&Carparenter']) }}">Ply & Carpenter</a></li>
          <li><a href="{{ route('cartProducts.byCategory', ['category' => 'othersMaterials']) }}">Other Materials</a></li>
        </ul>
      </div>
    </div>
  <!-- -------------------------------- -->
  @if(isset($products))
  <div class="row">
    <h4 class="text-center mb-4">📦 Products in Category: 
      <span style="color:#007bff">{{ $selectedCategory }}</span>
    </h4>

    @forelse($products as $product)
      <div class="col-md-4 col-lg-3 mb-4">
        <div class="card shadow-sm border-0 h-100">
          <div class="card-body text-center">
            <h5 class="card-title text-primary fw-bold">{{ $product->productName }}</h5>
            <p class="card-text mb-1"><strong>Category:</strong> {{ $product->categoryProduct }}</p>
            <p class="card-text mb-1 price"><strong>Price:</strong> ₹{{ number_format($product->sellPrice, 2) }}</p>
            
            <div class="d-flex justify-content-center align-items-center mb-2">
              <div class="btn quantity-btn">-</div>
              <div class="mx-2 fw-bold">0</div>
              <div class="btn quantity-btn">+</div>
            </div>

            <p class="card-text"><strong>Size:</strong> {{ $product->size }}</p>
          </div>
        </div>
      </div>
    @empty
      <div class="col-12 text-center text-muted">
        <p>No products found in this category.</p>
      </div>
    @endforelse
  </div>
@endif

  <!-- ------------------------------------- -->

  </div>
</body>
@else   
  <script>window.location.href = "{{ route('login') }}";</script> 
@endif  

@include('component.Footer')

