<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
  public function view(){
   $data['alldata'] = User::all();
   return view('backend.user.view_user',$data);
  }


  public function add(){
  	return view('backend.user.add_user');
  }


  public function store(Request $request){

  	$this->validate($request,[
	  'user_type'  =>'required',
	  'name'       =>'required',
	  'email'      =>'required|unique:users,email',
	  'password'   =>'required'
	  ]);

  	$data = new User();
   $data->user_type = $request->user_type;
  	$data->name = $request->name;
  	$data->email = $request->email;
  	$data->password = bcrypt($request->password);
   $data->save();
   return redirect()->route('user.view');
  }


  public function edit($id){
  	$editdata=User::find($id);
   return view('backend.user.edit_user',compact('editdata'));
  }


  public function update(Request $request,$id){

  	$this->validate($request,[
	  'user_type'  =>'required',
	  'name'       =>'required',
	  'email'      =>'required|unique:users,email'
	  ]);

	  $data = User::find($id);
   $data->user_type = $request->user_type;
  	$data->name = $request->name;
  	$data->email = $request->email;
   $data->save();
   return redirect()->route('user.view');


  }







}
