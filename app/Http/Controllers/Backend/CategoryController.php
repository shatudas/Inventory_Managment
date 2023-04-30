<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Category;
use Auth;


class CategoryController extends Controller
{
   public function view(){
   $data['alldata'] = Category::all();
   return view('backend.category.view_category',$data);
  }

   public function add(){
  	 return view('backend.category.add_category');
   }

   public function store(Request $request){
		  	$this->validate($request,[
			  'name'     =>'required',
			  'status'   =>'required'
			  ]);

		  	$data = new Category();
		   $data->name = $request->name;
		  	$data->status = $request->status;
		  	$data->created_by   = Auth::user()->id;
		   $data->save();
		   return redirect()->route('category.view')->with('success','Data Saved SuccessFully');
	  }


	   public function edit($id){
	  	$editdata=Category::find($id);
	   return view('backend.category.edit_category',compact('editdata'));
	  }

	  public function update(Request $request,$id){
	  	$this->validate($request,[
			  'name'     =>'required',
			  'status'   =>'required'
			  ]);

		  $data = Category::find($id);
	   $data->name = $request->name;
	  	$data->status = $request->status;
	  	$data->updated_by = Auth::user()->id;
	   $data->save();
	   return redirect()->route('category.view')->with('success','Data Updated SuccessFully');
	  }


	   public function delete ($id)
	   { 
	    $data = Category::find($id);
	    $data->delete();
	    return redirect()->route('category.view')->with('error','Data Delete Successfully');
	   } 


	   public function inactive($id)
	   {
	    Category::find($id)->where('id',$id)->update(['status'=>1]);
	    return redirect()->back();
	   }
	    
  
	   public function active($id)
	   {
	    Category::find($id)->where('id',$id)->update(['status'=>0]);
	    return redirect()->back();
	   }
}
