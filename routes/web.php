<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;


Route::get('/welcome',[ProductController::class,'getDashBoard'])->name('welcome');

Route::get('/',[ProductController::class,'getDashBoard']);

Route::post('login',[LoginController::class,'login']);
Route::get('/login', function () {
    return view('login');
    })->name('login');

Route::view('SignUp','SignUp');
Route::post('SignUp',[LoginController::class,'SignUp']);

Route::view('/about', 'about')->name('about');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::view('/addStock','addStock')->name('addStock');

Route::view('/newProduct','newProduct')->name('newProduct');
Route::post('newProduct',[ProductController::class,'addnewProduct']);

Route::view('/checkStock','checkStock');
Route::get('/checkStock',[ProductController::class,'getProduct']);

Route::view('/aboutEnd','aboutEnd');
Route::get('/aboutEnd',[ProductController::class,'endProduct']);

Route::view("/categoryList","categoryList");
Route::get('/add-stock', [ProductController::class, 'index'])->name('add.stock');

//--------------------------------------------------------------------------------------------
Route::get('/products/category/{category}', [ProductController::class, 'getByCategory'])->name('products.byCategory');

//--------------------------------------------------------------------------------------------

Route::get('/updateStock/{id}', [ProductController::class, 'editStock']);
Route::post('/updateStock/{id}', [ProductController::class, 'updateStock']);

Route::delete('/aboutEnd/{id}', [ProductController::class, 'deleteStock'])->name('deleteStock');


// --------------------------------------------------------------------------------//

Route::view("/createCustomer","createCustomer")->name("createCustomer");

Route::view("/newCustomer","newCustomer")->name("newCustomer");

Route::view("/productList","productList")->name("productList");

Route::get('/cartProducts/category/{category}', [ProductController::class, 'getByCategoryCart'])->name('cartProducts.byCategory');

Route::view("/customerdata","customerdata")->name("customerdata");
Route::get("/customerdata",[BillsController::class,'custmerdetails'])->name("customerdata");