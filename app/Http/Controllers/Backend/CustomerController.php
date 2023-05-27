<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Customer;
use App\Model\payment;
use App\Model\PaymentDetali;
use Auth;
use PDF;


class CustomerController extends Controller
{
  public function view(){
  	$data['alldata'] = Customer::all();
   return view('backend.customer.view_customer',$data);
  }

  public function add(){
  	return view('backend.customer.add_customer');
  }


  public function store(Request $request){
		 	$this->validate($request,[
			 'name'     =>'required',
			 'mobile'   =>'required',
			 'email'    =>'required',
			 'address'  =>'required',
			 'status'   =>'required'
			 ]);

		  $data = new Customer();
		  $data->name = $request->name;
		  $data->mobile = $request->mobile;
		  $data->email = $request->email;
		  $data->address = $request->address;
		  $data->status = $request->status;
		 	$data->created_by   = Auth::user()->id;
		  $data->save();
		  return redirect()->route('customer.view')->with('success','Data Saved SuccessFully');
	  }


	   public function edit($id){
	  	$editdata=Customer::find($id);
	   return view('backend.customer.edit_customer',compact('editdata'));
	  }


	   public function update(Request $request,$id){
	  	$this->validate($request,[
			  'name'     =>'required',
			  'mobile'   =>'required',
			  'email'    =>'required',
			  'address'  =>'required',
			  'status'   =>'required'
			  ]);

		  $data = Customer::find($id);
	   $data->name    = $request->name;
	  	$data->mobile  = $request->mobile;
	  	$data->email   = $request->email;
	  	$data->address = $request->address;
	  	$data->status  = $request->status;
	  	$data->updated_by = Auth::user()->id;
	   $data->save();
	   return redirect()->route('customer.view')->with('success','Data Updated SuccessFully');
	  }


	   public function delete ($id)
	   { 
	    $data = Customer::find($id);
	    $data->delete();
	    return redirect()->route('customer.view')->with('error','Data Delete Successfully');
	   } 


	  public function inactive($id)
	   {
	    Customer::find($id)->where('id',$id)->update(['status'=>1]);
	    return redirect()->back();
	   }
    
	  public function active($id)
	   {
	    Customer::find($id)->where('id',$id)->update(['status'=>0]);
	    return redirect()->back();
	   }

	 public function creditCustomer(){
	 	$alldata = payment::whereIn('paid_status',['full_due','partial_paid'])->get();
	 	 return view('backend.customer.customer_credit',compact('alldata'));
	 }


	 public function creditCustomePDF(){
	 	$data['alldata'] = payment::whereIn('paid_status',['full_due','partial_paid'])->get();
	 	return view('backend.PDF.customer_credit_pdf',$data);
	 }


	 public function invoiceEdit($invoice_id){

	 	$payment = payment::where('invoice_id',$invoice_id)->first();
   return view('backend.customer.edit-invoice',compact('payment'));
	 }


	 public function invoicepdate(Request $request, $invoice_id){
   if ($request->new_pain_amount<$request->paid_amount) {
   	return redirect()->back()->with('error','Sorry! you paid maximun value');
   } else{
   	$payment = payment::where('invoice_id', $invoice_id)->first();
   	$payment_detalis =new PaymentDetali();
   	$payment->paid_status = $request->paid_status;
   	if ($request->paid_status == 'full_paid') {
   		$payment->paid_amount = payment::where('invoice_id',$invoice_id)->first()['paid_amount'] + $request->new_pain_amount;
   		$payment->due_amount = '0';
   		$payment_detalis->current_paid_amount	= $request->new_pain_amount;
   	}else if($request->paid_status == 'partial_paid'){
     $payment->paid_amount =payment::where('invoice_id',$invoice_id)->first()['paid_amount'] + $request->paid_amount;
     $payment->due_amount =payment::where('invoice_id',$invoice_id)->first()['due_amount'] - $request->paid_amount;
     $payment_detalis->current_paid_amount	= $request->paid_amount;
   	}

   	$payment->save();
   	$payment_detalis->invoice_id = $invoice_id;
   	$payment_detalis->date = date('Y-m-d',strtotime($request->date));
   	
   	$payment_detalis->save();
   	return redirect()->route('customer.credit')->with('error','Invoices Update Successfully'); 

   }
	 }


	 public function invoiceDetalis($invoice_id){
   $payment = payment::where('invoice_id',$invoice_id)->first();
   return view('backend.PDF.invoice_detalis_PDF',compact('payment'));
	 }


	 public function customerPaid(){
	  $alldata = payment::where('paid_status','!=','full_due')->get();
	 	return view('backend.customer.customer_paid',compact('alldata'));
	 }


	 public function paidCustomePDF(){
    $data['alldata'] = payment::where('paid_status','!=','full_due')->get();
	 	return view('backend.PDF.customer_paid_pdf',$data);
	 }



}
