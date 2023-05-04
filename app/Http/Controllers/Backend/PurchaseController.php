<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Purchase;
use App\Model\Product;
use App\Model\Supplier;
use App\Model\Category;
use App\Model\Unit;
use Auth;

class PurchaseController extends Controller
{
   public function view(){
  	$data['alldata'] = Purchase::orderBy('date','desc')->orderBy('id','desc')->get();
   return view('backend.purchase.view_purchase',$data);
  }


  public function add(){
    $data['suppliers'] = Supplier::where('status','0')->get();
   	$data['units']     = Unit::where('status','0')->get();
   	$data['categorys'] = Category::where('status','0')->get();
  	return view('backend.purchase.add_purchase',$data);
  }


	   

}
