<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Bill;
use Barryvdh\DomPDF\Facade\Pdf;


class BillsController extends Controller
{
  public function custmerdetails(){
    $custmerdetails = DB::select('SELECT * FROM customerdetails');
    return view('customerdata',['custmerdetails'=>$custmerdetails]); 
  }
   
  public function findCustomer(Request $request){
        $query = Customerdetail::query();
        if ($request->filled('mobileNumber')) {
            $query->where('mobileNumber', 'like', '%' . $request->mobileNumber . '%');
        }
        if ($request->filled('customerName')) {
            $query->where('customerName', $request->customerName);
        }
        $customer = $query->get();
        return view('createCustomer', compact('customer'));
  }
 
  //----------------------------------------------------------------------------- 
 
   public function index() {
        $cart = session()->get('cart', []);
        return view('cart', compact('cart'));
    }

    // Add product into cart
    public function add(Request $request) {
        $product = Product::find($request->product_id);
        if (!$product) {
            return response()->json(['success' => false, 'message' => 'Product not found']);
        }

        $cart = session()->get('cart', []);

        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity'] += 1;
        } else {
            $cart[$product->id] = [
                "name" => $product->productName,
                "price" => $product->sellPrice,
                "quantity" => 1,
                "size" => $product->size,
                "category" => $product->categoryProduct,
            ];
        }

        session()->put('cart', $cart);

        return response()->json(['success' => true, 'cart' => $cart]);
    }

    // Remove product from cart
    public function remove(Request $request)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$request->product_id])) {
            $cart[$request->product_id]['quantity'] -= 1;

            // If qty becomes 0, remove completely
            if ($cart[$request->product_id]['quantity'] <= 0) {
                unset($cart[$request->product_id]);
            }

            session()->put('cart', $cart);
        }

        return response()->json(['success' => true, 'cart' => $cart]);
    }

    public function bill() {
    $cart = session()->get('cart', []);
    $shopName = "🛠️ Gupta Hardware Store"; // change to your shop name
    $date = now()->format('d-m-Y H:i A');

    return view('bill', compact('cart', 'shopName', 'date'));
    }

    // -----------------------------------------------------------------------------------

    public function generateBill(Request $request)
{
    $cart = session()->get('cart', []);
    if (empty($cart)) {
        return redirect()->back()->with('error', 'Cart is empty!');
    }

    // Calculate grand total
    $grandTotal = collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']);
    $paidAmount = $request->paid_amount;
    $balance = $grandTotal - $paidAmount;

    DB::beginTransaction(); // Start transaction to ensure consistency

    try {
        //Reduce stock for each product
        foreach ($cart as $id => $item) {
            $product = Product::find($id); // Make sure you have Product model
            if (!$product) {
                throw new \Exception("Product not found: {$item['name']}");
            }

            if ($product->quantity < $item['quantity']) {
                throw new \Exception("Not enough stock for {$product->name}");
            }

            $product->quantity -= $item['quantity'];
            $product->save();
        }

        //  Save bill in DB
        $bill = Bill::create([
            'customer_name' => $request->customer_name,
            'mobile_number' => $request->mobile_number,
            'address' => $request->address,
            'grand_total' => $grandTotal,
            'paid_amount' => $paidAmount,
            'balance' => $balance,
            'items' => json_encode($cart)
        ]);

        DB::commit(); // Commit transaction
        session()->forget('cart'); // Clear cart after successful bill

        // 3️⃣ Pass $bill to the view for PDF or confirmation
        return view('bill', [
            'cart' => $cart,
            'shopName' => "Gupta Hardware Store",
            'date' => now()->format('d-m-Y H:i A'),
            'customer' => $request->only(['customer_name', 'mobile_number', 'address']),
            'grandTotal' => $grandTotal,
            'paidAmount' => $paidAmount,
            'balance' => $balance,
            'bill' => $bill,
        ]);

    } catch (\Exception $e) {
        DB::rollBack();
        return redirect()->back()->with('error', $e->getMessage());
    }
}




// ///////--------------------------------
public function downloadInvoicePdf($billId)
{
    $bill = Bill::findOrFail($billId);

    $shopName = "Hardware Store";
    $date = $bill->created_at->format('d-m-Y H:i');
    $customer = [
        'customer_name' => $bill->customer_name,
        'mobile_number' => $bill->mobile_number,
        'address' => $bill->address,
    ];

$items = json_decode($bill->items); // convert string to array/object

$cart = collect($items)->map(function ($item) {
    return [
        'name' => $item->name,
        'category' => $item->category,
        'size' => $item->size,
        'price' => $item->price,
        'quantity' => $item->quantity,
    ];
})->toArray();

    $grandTotal = $bill->grand_total;
    $paidAmount = $bill->paid_amount;
    $balance = $bill->balance;

    $pdf = Pdf::loadView('invoice', compact(
        'shopName','date','customer','cart','grandTotal','paidAmount','balance'
    ));

    return $pdf->download('Invoice_'.$bill->id.'.pdf');
}

//-------------------------------------------

}