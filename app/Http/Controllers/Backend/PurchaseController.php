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
use DB;

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


  public function store(Request $request){
    if($request->category_id == null){
      return redirect()->back()->with('error','Sorry ! you do not select any item');
    }else{

      $count_category = count($request->category_id);
      for ($i=0; $i <$count_category ; $i++) { 
        $purchase = new Purchase();
        $purchase->date = date('Y-m-d',strtotime($request->date[$i]));
        $purchase->purchase_id  = $request->purchase_id[$i];
        $purchase->supplier_id  = $request->supplier_id[$i];
        $purchase->category_id  = $request->category_id[$i];
        $purchase->product_id   = $request->product_id[$i];
        $purchase->buying_qty   = $request->buying_qty[$i];
        $purchase->unit_price   = $request->unit_price[$i];
        $purchase->buying_price = $request->buying_price[$i];
        $purchase->description  = $request->description[$i];
        $purchase->status       = '0';
        $purchase->created_by   = Auth::user()->id;
        $purchase->save();
      }      

    }
    return redirect()->route('purchase.view')->with('success','Data Saved SuccessFully');
  }

   public function delete ($id)
    { 
     $data = Purchase::find($id);
     $data->delete();
     return redirect()->route('purchase.view')->with('error','Data Delete Successfully');
    } 


   public function purchaselist(){
     $data['alldata'] = Purchase::orderBy('date','desc')->orderBy('id','desc')->where('status','0')->get();
     return view('backend.purchase.view_paddinglist',$data);
   }


   public function aprove($id){

    $purchase = Purchase::find($id);
    $product = Product::where('id',$purchase->product_id)->first();
    $purchase_qty =((float)($purchase->buying_qty))+((float)($product->quantity));
    $product->quantity =$purchase_qty;
    if($product->save()){
     DB::table('purchases')->where('id',$id)->update(['status'=>1]);
    }

    return redirect()->route('purchase.padding.list')->with('success','Data Aproved SuccessFully');
   }








}
