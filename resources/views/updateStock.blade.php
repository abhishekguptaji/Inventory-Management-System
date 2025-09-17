@include('component.header')
<div class="container main-box mt-5">   
  <div class="row pt-5">
    <h4>Add more Quantity on : {{ $product->productName }}</h4>
  <form method="POST" action="/updateStock/{{$product->id}}">
        @csrf
          <label for="stock" class="pb-2">Stock Quantity:</label>
            <input type="number" name="stock" id="stock" class="form-control" value="{{ old('stock', $product->quantity) }}" required>
          <button type="submit" class="btn btn-primary mt-3">Update</button>
    </form>
</div>
</div> 
 @include('component.Footer')

<style>
  body{
      background: linear-gradient(135deg, #e0f7fa, #f8f9fa);
  }  *{
    padding:0;
    margin:0;
  }
.container {
    align-items: center; 
      
}
.main-box {
    background: #ffffff;
    padding: 30px;
    border-radius: 12px;
    box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
    width: 800px;  
    text-align: center;
    padding-top:20px;         
}
</style>