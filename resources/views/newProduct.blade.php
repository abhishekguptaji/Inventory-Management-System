@include('component.header')
<div class="container">
  @if(session()->has('user'))
   <h2>Create New Product</h2>
   <form action="/newProduct" method="Post">
     @csrf
    <div class="mb-3">
        <label for="productName" class="form-label">Product Name</label>
        <input type="text" name="productName" id="productName" class="form-control" required>
      </div>
<!-- --------------------------------------// -->
      <div class="mb-3">
        <div class="row">
          <div class="col-6">
            <label for="size" class="form-label">Size of Product</label>
           <input type="number" name="size" id="size" class="form-control" required>
          </div>
          <div class="col-6">
             <label for="quantity" class="form-label">Quantity</label>
             <input type="number" name="quantity" id="quantity" class="form-control" required>
          </div>
        </div>
       
      </div>
<!-- ----------------------------------// -->
      <div class="mb-3">
       <label for="categoryProduct" class="form-label">Category</label>
        <select id="categoryProduct" name="categoryProduct" class="form-control" required>
          <option value="tools">Tools</option>
          <option value="buildingMaterials">Building Materials</option>
          <option value="plumbing">Plumbing</option>
          <option value="electricalSupplies">Electrical Supplies</option>
          <option value="paintsAndCoating">Paints and Coating</option>
          <option value="locksAndSecurity">Locks and Security</option>
          <option value="engineParts">Engine Parts</option>         
          <option value="ply&Carparenter">Ply & Carparenter</option>
          <option value="othersMaterials">Others Materials</option>
        </select>
      </div>

      <div class="mb-3">
        <label for="costPrice" class="form-label">Cost Price</label>
        <input type="number" name="costPrice" id="costPrice" class="form-control" required>
      </div>

      <div class="mb-3">
        <label for="sellPrice" class="form-label">Sell Price</label>
        <input type="number" name="sellPrice" id="sellPrice" class="form-control" required>
      </div>

      <button type="submit" class="btn btn-primary">Add the Product</button>
   </form>
   
   </div>

  @else
    <script>window.location.href = "{{ route('login') }}";</script>
  @endif

</div>

  @include('component.Footer')



  <style>
    h2{
      text-align:center;
      padding:0px;
    }
    background: linear-gradient(135deg, #e0f7fa, #f8f9fa);
  </style>