@include('component.header')
@if(session()->has('user'))
<html>   
<head>
  <style>
    body {
      background-color: #f8f9fa;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    h3 {
      color: #2c3e50;
    }
    .custom-card {
      border-radius: 15px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
      transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
      background: linear-gradient(135deg, #ffffff, #f1f9ff);
    }
    .custom-card:hover {
      transform: translateY(-6px);
      box-shadow: 0 8px 18px rgba(0,0,0,0.15);
    }
    .custom-card .card-title {
      font-size: 20px;
      font-weight: 700;
      color: #0d6efd;
    }
    .custom-card .badge {
      font-size: 16px;
      border-radius: 10px;
      padding: 8px 14px;
    }
  </style>
</head>
<body>
<div class="container mt-5">
  <h3 class="mb-4 text-center fw-bold">Products Count</h3>
  <div class="row g-4">
    @foreach($productCounts as $item)
      <div class="col-md-4 col-sm-6">
        <div class="card custom-card h-100">
          <div class="card-body text-center">
            <h5 class="card-title">{{ $item->categoryProduct }}</h5>
            <p class="card-text fs-5 text-muted">
              <span class="badge bg-success">Items: {{ $item->product_count }} Pc</span>
            </p>
          </div>
        </div>
      </div>
    @endforeach
  </div>
</div>
</body>
</html>
@else
<script>window.location.href = "{{ route('login') }}";</script>
@endif
@include('component.Footer')
