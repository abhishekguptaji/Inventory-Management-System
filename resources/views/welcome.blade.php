@include('component.header')
    @if(session()->has('user'))
 <html>   
<body>
<div class="container mt-5">
  <h3 class="mb-4 text-center fw-bold">Products Count</h3>
  <div class="row g-4">
    @foreach($productCounts as $item)
      <div class="col-md-4 col-sm-6">
        <div class="card shadow-sm border-0 rounded-3 h-100">
          <div class="card-body text-center">
            <h5 class="card-title text-primary fw-bold">{{ $item->categoryProduct }}</h5>
            <p class="card-text fs-5 text-muted">
              <span class="badge bg-success p-2">Items: {{ $item->product_count }} Pc</span>
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
