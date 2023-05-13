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
  	$data['alldata'] = Invoice::orderBy('date','desc')->orderBy('id','desc')->where('status','1')->get();
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
    $data['date'] = date('Y-m-d');
  	return view('backend.invoice.add_invoice',$data);
  }

  public function store(Request $request){
   if($request->category_id == null){
   return redirect()->back()->with('error','Sorry Do Not Select Any Product');
   }else{
    if($request->paid_amount>$request->estimated_amount){
    return redirect()->back()->with('error','Sorry  paid amount is maximun then total amount');
   }else{
     
     $invoice = new Invoice;
     $invoice->invoice_no = $request->invoice_no;
     $invoice->date = date('Y-m-d',strtotime($request->date));
     $invoice->description =$request->description;
     $invoice->status ='0';
     $invoice->created_by =Auth::user()->id;
     DB::transaction(function() use($request,$invoice){
      if($invoice->save()){
       $count_category = count($request->category_id);
       for ($i=0; $i <$count_category ; $i++) { 
        $invoice_detalis = new InvoiceDetali();
        $invoice_detalis->date =date('Y-m-d',strtotime($request->date));
        $invoice_detalis->invoice_id =$invoice->id;
        $invoice_detalis->category_id = $request->category_id[$i];
        $invoice_detalis->product_id = $request->product_id[$i];
        $invoice_detalis->selling_qty = $request->selling_qty[$i];
        $invoice_detalis->unit_price = $request->unit_price[$i];
        $invoice_detalis->selling_price = $request->selling_price[$i];
        $invoice_detalis->status = '1';
        $invoice_detalis->created_by =Auth::user()->id;
        $invoice_detalis->save();
       }

       if($request->customer_id == '0'){
        $customer = new Customer();
        $customer->name =$request->name;
        $customer->mobile = $request->mobile;
        $customer->address = $request->address;
        $customer->created_by =Auth::user()->id;
        $customer->save();
        $customer_id = $customer->id;

       }else{
        $customer_id =$request->customer_id;
       }

       $payment = new payment();
       $payment_detalis = new PaymentDetali();
       $payment->invoice_id = $invoice->id;
       $payment->customer_id = $customer_id;
       $payment->paid_status = $request->paid_status;
       $payment->discount_amount =$request->discount_amount;
       $payment->total_amount =$request->estimated_amount;
       $payment->created_by =Auth::user()->id;
       
       if($payment->paid_status == 'full_paid'){
         $payment->paid_amount =$request->estimated_amount;
         $payment->due_amount = '0';
         $payment_detalis->current_paid_amount = $request->estimated_amount;

       }elseif($payment->paid_status == 'full_due'){
        $payment->paid_amount = '0';
        $payment->due_amount =$request->estimated_amount;
        $payment_detalis->current_paid_amount = '0';

       }elseif($payment->paid_status == 'partial_paid'){
        $payment->paid_amount = $request->paid_amount;
        $payment->due_amount = $request->estimated_amount-$request->paid_amount;
        $payment_detalis->current_paid_amount = $request->paid_amount;
       }
       $payment->save();

       $payment_detalis->invoice_id = $invoice->id;
       $payment_detalis->date =date('Y-m-d',strtotime($request->date));
       $payment_detalis->save();

      }
     });
    }
   }

   return redirect()->route('invoices.view')->with('error','Sorry Do Not Select Any Product');


  }

 }
