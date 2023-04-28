<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Auth;

class ProfileController extends Controller
{
  public function view(){
   $id = Auth::User()->id;
   $user = User::find($id);
   return view('backend.user.view_profile',compact('user'));
  }

  public function edit()
  {
   $id = Auth::user()->id;
   $editdata=User::find($id);
   return view('backend.user.edit_profiles',compact('editdata'));
  }


  public function update(Request $Request)
  {
   $this->validate($Request,[
   'name'=>'required', 
   'email'=>'required'
   ]);
     
   $data= User::find(Auth::user()->id);
   $data->name    = $Request->name;
   $data->email   = $Request->email;
   $data->mobile  = $Request->mobile;
   $data->address = $Request->address;
   $data->gender  = $Request->gender;

   if($Request->file('image'))
   {
    $file = $Request->file('image');
    @unlink(public_path('upload/user_images/'.$data->image));
    $filename = 'IMG_'.date('YmdHis').'.'.$file->getClientOriginalExtension();
    $file->move(public_path('upload/user_images/'),$filename);
    $data['image'] = $filename;
    }
    $data->save();
    return redirect()->route('profiles.view')->with('success','Profile Updated Successfully');
   }





}
