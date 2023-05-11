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
use App\Model\Customer;
use Auth;
use DB;

class InvoicesController extends Controller
{
	
  public function view(){
  	$data['alldata'] = Invoice::orderBy('date','desc')->orderBy('id','desc')->get();
   return view('backend.invoice.view_invoice',$data);
  }


  public function add(){
    $data['customers'] = customer::all();
    $data['categorys'] = Category::where('status','0')->get();
   	$invoiceData = Invoice::orderBy('id','desc')->first();
    if($invoiceData == null){
     $firstReg = '0';
     $data['invoiceNo'] = $firstReg + 1;

    }else{
    $invoiceData = Invoice::orderBy('id','desc')->first()->invoice_no;
    $data['invoiceNo'] = $invoiceData + 1;
    }
  	return view('backend.invoice.add_invoice',$data);
  }


}
