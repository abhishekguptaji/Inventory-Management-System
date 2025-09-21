@include('component.header')
@if(session()->has('user')) 
<div class="container mt-4">
  <h3 class="mb-3">Your Cart</h3>
  @if(count($cart) > 0)
    <table class="table table-bordered">
      <thead class="table-light">
        <tr>
          <th>Product</th>
          <th>Category</th>
          <th>Size</th>
          <th>Price</th>
          <th>Qty</th>
          <th>Total</th>
        </tr>
      </thead>
      <tbody>
        @php $grandTotal = 0; @endphp
        @foreach($cart as $id => $item)
          @php $total = $item['price'] * $item['quantity']; $grandTotal += $total; @endphp
          <tr>
            <td>{{ $item['name'] }}</td>
            <td>{{ $item['category'] }}</td>
            <td>{{ $item['size'] }}</td>
            <td>₹{{ number_format($item['price'],2) }}</td>
            <td>{{ $item['quantity'] }}</td>
            <td>₹{{ number_format($total,2) }}</td>
          </tr>
        @endforeach
      </tbody>
      <tfoot>
        <tr>
          <td colspan="5" class="text-end fw-bold">Grand Total:</td>
          <td class="fw-bold">₹{{ number_format($grandTotal,2) }}</td>
        </tr>
      </tfoot>
    </table>
    @if(count($cart) > 0)
  <div class="text-end mt-4">
    <a href="{{ route('cart.customerForm') }}" class="btn btn-success btn-lg">
      🧾 Generate Bill
    </a>
  </div>
@endif
  @else
    <p class="text-muted">Your cart is empty.</p>
  @endif
</div>
 
@endif
@include('component.Footer')
