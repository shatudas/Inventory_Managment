<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
  public function view(){
   $data['alldata'] = User::all();
   return view('Backend.user.view_user',$data);
  }


  public function add(){
  	return view('Backend.user.add_user');
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



}
