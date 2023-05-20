@extends('backend.layouts.master')
@section('content')

<div class="content-wrapper">
 
 <div class="content-header">
  <div class="container-fluid">
   <div class="row mb-2">
    <div class="col-sm-6">
     <h1 class="m-0">Manage Invoices</h1>
    </div>
    <div class="col-sm-6">
     <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="#">Home</a></li>
      <li class="breadcrumb-item active">Invoices</li>
     </ol>
    </div>
   </div>
  </div>
 </div>

 <!-- Main content -->
 <section class="content">
  <div class="container-fluid">
   <div class="row">
    <div class="col-12">

     <div class="card">
      <div class="card-header">
       <h3>Invoice No {{$invoice->invoice_no}} <small>{{date('d-m-Y',strtotime($invoice->date))}}</small>
        <a href="{{route('invoices.padding.list')}}" class=" btn btn-success btn-sm float-right"> <i class="fa fa-list"></i> Padding Invoices List </a>
  
       </h3>
      </div>
      
      <div class="card-body">

       @php
        $payment = App\Model\payment::where('invoice_id',$invoice->id)->first();
       @endphp

          <table width="100%">
            <tbody>
              <tr>
                <td width="15%"><p>Costomer Info:</p></td>
                <td width="25%"><p><strong>Name:</strong> {{ $payment['customer']['name'] }}</p></td>
                <td width="25%"><p><strong>Mobile:</strong> {{ $payment['customer']['mobile'] }}</p></td>
                <td width="35%"><p><strong>Address:</strong> {{ $payment['customer']['address'] }}</p></td>
              </tr>
              <tr>
               <td width="15%"></td>
               <td width="85%" colspan="3"><strong>Discripshon:</strong>{{ $invoice->description  }}</td>
              </tr>
            </tbody>
          </table>


          <form method="POST" action="{{ Route('aproval.store',$invoice->id) }}">
           @csrf
           <table border="1" width="100%" style="margin-bottom: 10px;">
            <thead>
             <tr align="center">
              <th>SL</th>
              <th>Category</th>
              <th>Product</th>
              <th>Current Stock</th>
              <th>Qty</th>
              <th>Unit Price</th>
              <th>Total Price</th>
             </tr>
            </thead>
            <tbody>


             @php
             $totalSum = '0';
             @endphp

             @foreach($invoice['invoice_detalis'] as $key => $detalis)

             <input type="hidden" name="category_id[]" value="{{ $detalis->category_id }}">
             <input type="hidden" name="product_id[]" value="{{ $detalis->product_id }}">
             <input type="hidden" name="selling_qty[{{ $detalis->id }}]" value="{{ $detalis->selling_qty }}">

             <tr align="center">
              <td>{{ $key+1 }}</td>
              <td>{{ $detalis['category']['name'] }}</td>
              <td>{{ $detalis['product']['name'] }}</td>
              <td>{{ $detalis['product']['quantity'] }}</td>
              <td>{{ $detalis->selling_qty }}</td>
              <td>{{ $detalis->unit_price }}</td>
              <td class="text-right">{{ $detalis->selling_price }}</td>
             </tr>
             @php
              $totalSum +=  $detalis->selling_price;
             @endphp

             @endforeach

            <tr>
             <td colspan="6" class="text-right">Sub Total</td>
             <td class="text-right">{{ $totalSum }}</td>
            </tr>

            <tr>
             <td colspan="6" class="text-right">Discount</td>
             <td class="text-right">{{ $payment->discount_amount }}</td>
            </tr>

            <tr>
             <td colspan="6" class="text-right">Paid Amount</td>
             <td class="text-right">{{ $payment->paid_amount }}</td>
            </tr>

            <tr>
             <td colspan="6" class="text-right">Due Amount</td>
             <td class="text-right">{{ $payment->due_amount }}</td>
            </tr>

            <tr>
             <td colspan="6" class="text-right">Grand Total</td>
             <td class="text-right">{{ $payment->total_amount }}</td>
            </tr>


             </tbody>
           
           </table>


          <button type="submit" class="btn btn-success">Invoice Aprova</button>
           
          </form>


          
 

      </div>
     </div>  
    </div>
   </div>
  </div>
 </section>
</div>
  <!-- /.content-wrapper -->



@endsection
