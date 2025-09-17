@include('component.header')

<style>
  body{
      background: linear-gradient(135deg, #e0f7fa, #f8f9fa);
  }
</style>

<div class="container-fluid">
    <div class="row">
      <h3>Products Counts:</h3>
      @foreach($productCounts as $item)
      <div class="col">
       <div class="card text-dark bg-light mb-3" style="max-width: 18rem;">
        <div class="card-body ">
        <h5 class="card-title">{{$item->categoryProduct}}</h5>
          <p class="card-text display-8">Items:{{$item->product_count}} + Pc</p>
        </div>
       </div>
      </div>
      @endforeach
    </div>    
</div>

@include('component.Footer')
   







