@include('component.header')
@if(session()->has('user')) 
<head>
  <style>
    body {
      background: linear-gradient(135deg, #e0f7fa, #f8f9fa);
      font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
      margin: 0; padding: 0; color: #2c3e50;
    }
    h4 { font-weight: bold; color: #34495e; margin: 15px 0; }
    .categorylist { display: flex; flex-wrap: wrap; gap: 10px; list-style: none; justify-content: center; }
    .categorylist li a { text-decoration: none; padding: 12px 20px; background: linear-gradient(135deg, #007bff, #00c6ff); border-radius: 30px; color: #fff; font-weight: 600; font-size: 15px; box-shadow: 0px 4px 10px rgba(0,0,0,0.15); transition: all 0.3s ease-in-out; }
    .categorylist li a:hover { background: linear-gradient(135deg, #0056b3, #0096c7); transform: translateY(-3px) scale(1.07); }
    .card { border-radius: 15px; transition: transform 0.3s ease, box-shadow 0.3s ease; }
    .card:hover { transform: translateY(-5px); box-shadow: 0px 6px 18px rgba(0,0,0,0.15); }
    .quantity-btn { margin: 0 5px; padding: 8px 14px; border-radius: 50%; background: linear-gradient(135deg, #007bff, #00c6ff); color: #fff; font-size: 16px; font-weight: bold; cursor: pointer; transition: all 0.3s ease; user-select: none; }
    .quantity-btn:hover { background: linear-gradient(135deg, #0056b3, #0096c7); transform: scale(1.1); }
    .price { color: #28a745; font-weight: 600; }
  </style>
</head>
<body>
  <div class="container-fluid">
    <!-- Category -->
    <div class="row">
      <div class="main-categorylist pt-3 pb-3 text-center">
        <ul class="categorylist">
          <li><a href="{{ route('cartProducts.byCategory', ['category' => 'Tools']) }}">Tools</a></li>
          <li><a href="{{ route('cartProducts.byCategory', ['category' => 'buildingMaterials']) }}">Building Materials</a></li>
          <li><a href="{{ route('cartProducts.byCategory', ['category' => 'Plumbing']) }}">Plumbing</a></li>
          <li><a href="{{ route('cartProducts.byCategory', ['category' => 'electricalSupplies']) }}">Electrical Supplies</a></li>
        </ul>
      </div>
    </div>

    <!-- Products -->
    @if(isset($products))
    <div class="row">
      <h4 class="text-center mb-4">Products in Category: 
        <span style="color:#007bff">{{ $selectedCategory }}</span>
      </h4>

      @forelse($products as $product)
        <div class="col-md-4 col-lg-3 mb-4">
          <div class="card shadow-sm border-0 h-100" data-id="{{ $product->id }}">
            <div class="card-body text-center">
              <h5 class="card-title text-primary fw-bold">{{ $product->productName }}</h5>
              <p class="card-text mb-1"><strong>Category:</strong> {{ $product->categoryProduct }}</p>
              <p class="card-text mb-1 price"><strong>Price:</strong> ₹{{ number_format($product->sellPrice, 2) }}</p>

              <div class="d-flex justify-content-center align-items-center mb-2">
                <div class="btn quantity-btn minus-btn">-</div>
                <div class="mx-2 fw-bold quantity">0</div>
                <div class="btn quantity-btn plus-btn">+</div>
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
  </div>

  <!-- Quantity Button Script -->
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      document.querySelectorAll(".card").forEach(function(card) {
        const minusBtn = card.querySelector(".minus-btn");
        const plusBtn = card.querySelector(".plus-btn");
        const qtyElement = card.querySelector(".quantity");

        let qty = 0;
        const productId = card.getAttribute("data-id");

        // Add to cart
        plusBtn.addEventListener("click", function() {
          fetch("{{ route('cart.add') }}", {
            method: "POST",
            headers: {
              "Content-Type": "application/json",
              "X-CSRF-TOKEN": "{{ csrf_token() }}"
            },
            body: JSON.stringify({ product_id: productId })
          })
          .then(res => res.json())
          .then(data => {
            if(data.success) {
              qty++;
              qtyElement.textContent = qty;
            }
          });
        });

        // Remove from cart
        minusBtn.addEventListener("click", function() {
          if (qty > 0) {
            fetch("{{ route('cart.remove') }}", {
              method: "POST",
              headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
              },
              body: JSON.stringify({ product_id: productId })
            })
            .then(res => res.json())
            .then(data => {
              if(data.success) {
                qty--;
                qtyElement.textContent = qty;
              }
            });
          }
        });
      });
    });
  </script>
</body>
@else   
  <script>window.location.href = "{{ route('login') }}";</script> 
@endif  

@include('component.Footer')
