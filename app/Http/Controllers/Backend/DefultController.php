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

class DefultController extends Controller
{
    
    public function getcategory(Request $request){
    	$supplier_id =$request->supplier_id;
    	$allCategory = Product::with(['category'])->select('category_id')->where('suplier_id',$supplier_id)->groupBy('category_id')->get();
    	return response()->json($allCategory);

    }


    public function getproduct(Request $request){

    	$category_id =$request->category_id;
    	$allproduct = Product::where('category_id',$category_id)->get();
    	return response()->json($allproduct);

    }


    
}
