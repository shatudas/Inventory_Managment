<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Supplier;
use Auth;

class SupplierController extends Controller
{
    
  public function view(){
  	$data['alldata'] = Supplier::all();
   return view('backend.supplier.view_supplier',$data);
  }


  public function add(){
  	return view('backend.supplier.add_supplier');
  }


	   public function store(Request $request){
		  	$this->validate($request,[
			  'name'     =>'required',
			  'mobile'   =>'required',
			  'email'    =>'required',
			  'address'  =>'required',
			  'status'   =>'required'
			  ]);

		  	$data = new Supplier();
		   $data->name = $request->name;
		  	$data->mobile = $request->mobile;
		  	$data->email = $request->email;
		  	$data->address = $request->address;
		  	$data->status = $request->status;
		  	$data->created_by   = Auth::user()->id;
		   $data->save();
		   return redirect()->route('supplier.view')->with('success','Data Saved SuccessFully');
	  }

	  public function edit($id){
	  	$editdata=Supplier::find($id);
	   return view('backend.supplier.edit_supplier',compact('editdata'));
	  }


	  public function update(Request $request,$id){
	  	$this->validate($request,[
			  'name'     =>'required',
			  'mobile'   =>'required',
			  'email'    =>'required',
			  'address'  =>'required',
			  'status'   =>'required'
			  ]);

		  $data = Supplier::find($id);
	   $data->name = $request->name;
	  	$data->mobile = $request->mobile;
	  	$data->email = $request->email;
	  	$data->address = $request->address;
	  	$data->status = $request->status;
	  	$data->updated_by = Auth::user()->id;
	   $data->save();
	   return redirect()->route('supplier.view')->with('success','Data Updated SuccessFully');
	  }


	  public function delete ($id)
	   { 
	    $data = Supplier::find($id);
	    $data->delete();
	    return redirect()->route('supplier.view')->with('error','Data Delete Successfully');
	   } 


	  public function inactive($id)
	   {
	    Supplier::find($id)->where('id',$id)->update(['status'=>1]);
	    return redirect()->back();
	   }
	    

	  public function active($id)
	   {
	    Supplier::find($id)->where('id',$id)->update(['status'=>0]);
	    return redirect()->back();
	   }



}
