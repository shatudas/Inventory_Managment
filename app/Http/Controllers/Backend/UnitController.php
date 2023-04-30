<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Unit;
use Auth;


class UnitController extends Controller
{
   public function view(){
   $data['alldata'] = Unit::all();
   return view('backend.unit.view_unit',$data);
  }

   public function add(){
  	 return view('backend.unit.add_unit');
   }

   public function store(Request $request){
		  	$this->validate($request,[
			  'name'     =>'required',
			  'status'   =>'required'
			  ]);

		  	$data = new Unit();
		   $data->name = $request->name;
		  	$data->status = $request->status;
		  	$data->created_by   = Auth::user()->id;
		   $data->save();
		   return redirect()->route('unit.view')->with('success','Data Saved SuccessFully');
	  }


	   public function edit($id){
	  	$editdata=Unit::find($id);
	   return view('backend.Unit.edit_Unit',compact('editdata'));
	  }

	  public function update(Request $request,$id){
	  	$this->validate($request,[
			  'name'     =>'required',
			  'status'   =>'required'
			  ]);

		  $data = Unit::find($id);
	   $data->name = $request->name;
	  	$data->status = $request->status;
	  	$data->updated_by = Auth::user()->id;
	   $data->save();
	   return redirect()->route('unit.view')->with('success','Data Updated SuccessFully');
	  }


	   public function delete ($id)
	   { 
	    $data = Unit::find($id);
	    $data->delete();
	    return redirect()->route('unit.view')->with('error','Data Delete Successfully');
	   } 


	   public function inactive($id)
	   {
	    Unit::find($id)->where('id',$id)->update(['status'=>1]);
	    return redirect()->back();
	   }
	    
  
	   public function active($id)
	   {
	    Unit::find($id)->where('id',$id)->update(['status'=>0]);
	    return redirect()->back();
	   }





}
