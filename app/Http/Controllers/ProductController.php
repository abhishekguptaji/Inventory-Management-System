<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller {
  function addnewProduct(Request $req){
    $req->validate([
        'productName' => 'required|string',
        'size' => 'required|integer',
        'quantity' => 'required|integer',
        'categoryProduct' => 'required|string',
        'costPrice' => 'required|numeric',
        'sellPrice' => 'required|numeric',
    ]);

    $product = new Product();
    $product->productName = $req->input('productName');
    $product->size = $req->input('size');
    $product->quantity = $req->input('quantity');
    $product->categoryProduct = $req->input('categoryProduct');
    $product->costPrice = $req->input('costPrice');
    $product->sellPrice = $req->input('sellPrice');

    if ($product->save()) {
        return redirect()->route('addStock');
    } else {
        return redirect()->back();
    }
}

 function getProduct(){
    $products = DB::select('SELECT * FROM products');
    return view('checkStock',['products'=>$products]);
 }

 function endProduct(){
    $products = DB::select('SELECT * FROM products where quantity<3');
    return view('aboutEnd',['products'=>$products]); 
 }

  
 public function index(Request $request){
        $query = Product::query();
        if ($request->filled('productName')) {
            $query->where('productName', 'like', '%' . $request->productName . '%');
        }
        if ($request->filled('categoryProduct')) {
            $query->where('categoryProduct', $request->categoryProduct);
        }
        $products = $query->get();
        return view('addStock', compact('products'));
}
//-----------------------------------------------------------------------------------
 public function getByCategory($category) {
    $products = Product::where('categoryProduct', $category)->get();
    return view('categoryList', [
        'products' => $products,
        'selectedCategory' => $category
    ]);
} 
//----------------------------------------------------------------------------------------
function getDashBoard(){
    $categories = ['tools','buildingMaterials', 'plumbing','electricalSupplies','paintsAndCoating','locksAndSecurity','engineParts','ply&Carparenter','othersMaterials'];
    $productCounts = DB::table('products')
    ->select(DB::raw('COUNT(*) as product_count'), 'categoryProduct')
    ->whereIn('categoryProduct', $categories)
    ->groupBy('categoryProduct')
    ->get();

    return view('welcome',compact('productCounts'));
}
 
 public function editStock($id) {
    $product = Product::findOrFail($id);
    return view('updateStock', compact('product'));
  }

  public function updateStock(Request $request,$id) {
    $request->validate([
        'stock' => 'required|integer|min:0',
    ]);
    $product = Product::findOrFail($id);
    $product->quantity += $request->input('stock');
    $product->save();
    return redirect()->route('addStock')->with('success', 'Stock updated successfully!');
  }
    // ----------------------------------------------------//


  public function getByCategoryCart($category){
    $products = Product::where('categoryProduct', $category)->get();
    return view('productList', [
        'products' => $products,
        'selectedCategory' => $category
    ]);
}






}
  
   


