<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Customer;
use App\Model\Product;
use App\Model\payment;
use App\Model\PaymentDetali;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      $data['customer'] = Customer::where('status','0')->count();
      $data['user'] = User::where('status','0')->count();
      $data['product'] = Product::where('status','0')->count();
      $data['quantity'] = Product::sum('quantity');
      $data['total_sale'] = payment::sum('total_amount');
      $data['PaymentDetali'] = PaymentDetali::sum('current_paid_amount');


      return view('backend.layouts.home',$data);
    }
}
