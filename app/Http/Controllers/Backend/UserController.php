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
}
