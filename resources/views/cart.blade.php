@include('component.header')
@if(session()->has('user')) 
<div class="container pt-2">
  <div class="row g-4">
    
    <!-- 🔹 Left side: Customer Form -->
    <div class="col-md-5">
      @if(count($cart) > 0)
        <div class="card shadow-sm border-0">
          <div class="card-header bg-primary text-white text-center">
            <h4 class="mb-0">🧾 Customer Details</h4>
          </div>
          <div class="card-body">
            <form action="{{ route('cart.generateBill') }}" method="POST" class="needs-validation" novalidate>
              @csrf
              <div class="mb-3">
                <label class="form-label fw-bold">Customer Name</label>
                <input type="text" name="customer_name" class="form-control form-control-lg" required>
              </div>
              <div class="mb-3">
                <label class="form-label fw-bold">Mobile Number</label>
                <input type="text" name="mobile_number" class="form-control form-control-lg" required pattern="[0-9]{10}">
              </div>
              <div class="mb-3">
                <label class="form-label fw-bold">Address</label>
                <textarea name="address" class="form-control form-control-lg" rows="3"></textarea>
              </div>
              <div class="mb-3">
                <label class="form-label fw-bold">Paid Amount</label>
                <input type="number" step="0.01" name="paid_amount" class="form-control form-control-lg" required>
              </div>
              <button type="submit" class="btn btn-primary w-100 btn-lg">Generate Bill</button>
            </form>
          </div>
        </div>
      @endif
    </div>

    <!-- 🔹 Right side: Cart Table -->
    <div class="col-md-7">
      <div class="card shadow-sm border-0">
        <div class="card-header bg-success text-white text-center">
          <h4 class="mb-0">🛒 Your Cart</h4>
        </div>
        <div class="card-body p-0">
          @if(count($cart) > 0)
            <div class="table-responsive">
              <table class="table table-hover mb-0">
                <thead class="table-light text-center">
                  <tr>
                    <th>Product</th>
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
                    <tr class="text-center align-middle">
                      <td>{{ $item['name'] }}</td>
                      <td>{{ $item['size'] }}</td>
                      <td>₹{{ number_format($item['price'],2) }}</td>
                      <td>{{ $item['quantity'] }}</td>
                      <td>₹{{ number_format($total,2) }}</td>
                    </tr>
                  @endforeach
                </tbody>
                <tfoot>
                  <tr class="table-success fw-bold text-center">
                    <td colspan="4" class="text-end">Grand Total:</td>
                    <td>₹{{ number_format($grandTotal,2) }}</td>
                  </tr>
                </tfoot>
              </table>
            </div>
          @else
            <p class="text-muted text-center py-3">Your cart is empty.</p>
          @endif
        </div>
      </div>
    </div>

  </div>
</div>
@endif
@include('component.Footer')
