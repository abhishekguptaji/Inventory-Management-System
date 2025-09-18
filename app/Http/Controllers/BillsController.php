<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Customerdetails;

class BillsController extends Controller
{
  function custmerdetails(){
    $custmerdetails = DB::select('SELECT * FROM custmerdetails where quantity<3');
    return view('custmerdata',['custmerdetails'=>$custmerdetails]); 
 }      
}
