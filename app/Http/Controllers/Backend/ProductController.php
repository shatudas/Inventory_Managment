<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Product;
use App\Model\Supplier;
use App\Model\Category;
use App\Model\Unit;
use Auth;


class ProductController extends Controller
{

   public function view(){
  	$data['alldata'] = Product::all();
   return view('backend.product.view_product',$data);
  }

   public function add(){
   	$data['suppliers'] = Supplier::where('status','0')->get();
   	$data['units']     = Unit::where('status','0')->get();
   	$data['categorys'] = Category::where('status','0')->get();
  	return view('backend.product.add_product',$data);
  }

   public function store(Request $request){
		 	$this->validate($request,[
			 'suplier_id'     =>'required',
			 'unit_id'         =>'required',
			 'category_id'     =>'required',
			 'name'            =>'required',
			 'status'          =>'required'
			 ]);

		  $data = new Product();
		  $data->suplier_id  = $request->suplier_id;
		  $data->unit_id     = $request->unit_id;
		  $data->category_id = $request->category_id;
		  $data->name        = $request->name;
		  $data->status      = $request->status;
		  $data->quantity    = '0';
		 	$data->created_by  = Auth::user()->id;
		  $data->save();
		  return redirect()->route('product.view')->with('success','Data Saved SuccessFully');
	  }


	   public function edit($id){
		  	$data['editdata']  =Product::find($id);
		  	$data['suppliers'] = Supplier::where('status','0')->get();
	   	$data['units']     = Unit::where('status','0')->get();
	   	$data['categorys'] = Category::where('status','0')->get();
		   return view('backend.product.edit_product',$data);
	  }



	   public function update(Request $request,$id){

	  	$this->validate($request,[
			 'suplier_id'      =>'required',
			 'unit_id'         =>'required',
			 'category_id'     =>'required',
			 'name'            =>'required',
			 'status'          =>'required'
			 ]);

		  $data = Product::find($id);
	   $data->suplier_id  = $request->suplier_id;
		  $data->unit_id     = $request->unit_id;
		  $data->category_id = $request->category_id;
		  $data->name        = $request->name;
		  $data->status      = $request->status;
		  $data->quantity    = '0';
	  	$data->updated_by  = Auth::user()->id;

	   $data->save();

	   return redirect()->route('product.view')->with('success','Data Updated SuccessFully');
	  }


	   public function delete ($id)
	   { 
	    $data = Product::find($id);
	    $data->delete();
	    return redirect()->route('product.view')->with('error','Data Delete Successfully');
	   } 


	  public function inactive($id)
	   {
	    Product::find($id)->where('id',$id)->update(['status'=>1]);
	    return redirect()->back();
	   }
    
	  public function active($id)
	   {
	    Product::find($id)->where('id',$id)->update(['status'=>0]);
	    return redirect()->back();
	   }
}
