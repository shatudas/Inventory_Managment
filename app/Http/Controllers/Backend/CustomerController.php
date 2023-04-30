<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Customer;
use Auth;


class CustomerController extends Controller
{
  public function view(){
  	$data['alldata'] = Customer::all();
   return view('backend.customer.view_customer',$data);
  }

  public function add(){
  	return view('backend.customer.add_customer');
  }


  public function store(Request $request){
		 	$this->validate($request,[
			 'name'     =>'required',
			 'mobile'   =>'required',
			 'email'    =>'required',
			 'address'  =>'required',
			 'status'   =>'required'
			 ]);

		  $data = new Customer();
		  $data->name = $request->name;
		  $data->mobile = $request->mobile;
		  $data->email = $request->email;
		  $data->address = $request->address;
		  $data->status = $request->status;
		 	$data->created_by   = Auth::user()->id;
		  $data->save();
		  return redirect()->route('customer.view')->with('success','Data Saved SuccessFully');
	  }


	   public function edit($id){
	  	$editdata=Customer::find($id);
	   return view('backend.customer.edit_customer',compact('editdata'));
	  }


	   public function update(Request $request,$id){
	  	$this->validate($request,[
			  'name'     =>'required',
			  'mobile'   =>'required',
			  'email'    =>'required',
			  'address'  =>'required',
			  'status'   =>'required'
			  ]);

		  $data = Customer::find($id);
	   $data->name    = $request->name;
	  	$data->mobile  = $request->mobile;
	  	$data->email   = $request->email;
	  	$data->address = $request->address;
	  	$data->status  = $request->status;
	  	$data->updated_by = Auth::user()->id;
	   $data->save();
	   return redirect()->route('customer.view')->with('success','Data Updated SuccessFully');
	  }


	   public function delete ($id)
	   { 
	    $data = Customer::find($id);
	    $data->delete();
	    return redirect()->route('customer.view')->with('error','Data Delete Successfully');
	   } 


	  public function inactive($id)
	   {
	    Customer::find($id)->where('id',$id)->update(['status'=>1]);
	    return redirect()->back();
	   }
    
	  public function active($id)
	   {
	    Customer::find($id)->where('id',$id)->update(['status'=>0]);
	    return redirect()->back();
	   }
	   

}
