<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Purchase;
use App\Model\Product;
use App\Model\Supplier;
use App\Model\Category;
use App\Model\Unit;
use App\Model\Invoice;
use App\Model\InvoiceDetali;
use App\Model\payment;
use App\Model\PaymentDetali;
use Auth;
use DB;

class InvoicesController extends Controller
{
	
   public function view(){
  	$data['alldata'] = Invoice::orderBy('date','desc')->orderBy('id','desc')->get();
   return view('backend.invoice.view_invoice',$data);
  }


}
