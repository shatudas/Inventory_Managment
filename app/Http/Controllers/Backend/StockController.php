<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Product;
use App\Model\Supplier;
use App\Model\Category;
use App\Model\Unit;
use Auth;


class StockController extends Controller
{
  
  public function stockReport(){
  	$alldata = Product::orderBy('suplier_id','ASC')->orderBy('category_id','ASC')->get();
   return view('backend.stock.stock_repost',compact('alldata'));
  }

  public function stockReportPDF(){
  	$data['alldata'] = Product::orderBy('suplier_id','ASC')->orderBy('category_id','ASC')->get();
   return view('backend.PDF.stock_report_PDF',$data);
  }

  public function SupplierProduct(){
  	$data['supplier'] = Supplier::where('status','0')->get();
  	return view('backend.stock.supplier_product_repost', $data);
  } 


  public  function SupplierProductPDF(Request $request){
    $data['alldata'] = Product::orderBy('suplier_id','ASC')->orderBy('category_id','ASC')->where('suplier_id', $request->supplier_id)->get();
    return view('backend.PDF.supplier_wise_stock',$data);
    
  }



}
