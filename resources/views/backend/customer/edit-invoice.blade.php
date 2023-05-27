@extends('backend.layouts.master')
@section('content')

<div class="content-wrapper">
 
 <div class="content-header">
  <div class="container-fluid">
   <div class="row mb-2">
    <div class="col-sm-6">
     <h1 class="m-0">Manage Cradit Customer</h1>
    </div>
    <div class="col-sm-6">
     <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="#">Home</a></li>
      <li class="breadcrumb-item active">Customer</li>
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
       <h3>Cradit Invoice 
        <a href="{{ route('customer.credit') }}" class=" btn btn-success btn-sm float-right"> <i class="fa fa-list"></i> Cradit Customer List</a>
       </h3>
      </div>

      
      
       <div class="card-body">

        <table width="100%">
         <tbody>
          <tr>
            <td  colspan="3"><p>Costomer Info:</p></td>
          </tr>

          <tr>
           <td><p><strong>Name:</strong> {{ $payment['customer']['name'] }}</p></td>
           <td><p><strong>Mobile:</strong> {{ $payment['customer']['mobile'] }}</p></td>
           <td><p><strong>Address:</strong> {{ $payment['customer']['address'] }}</p></td>
          </tr>
         </tbody>
        </table>
        
        <form method="POST" action="{{ route('customer.invoice.update',$payment->invoice_id) }}" id="myForm" >
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
          $invoice_detalis =App\model\InvoiceDetali::where('invoice_id',$payment->invoice_id)->get();
          @endphp

          @foreach($invoice_detalis as $key => $detalis)

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
           <input type="hidden" name="new_pain_amount" value="{{ $payment->due_amount }}">
           <td class="text-right">{{ $payment->due_amount }}</td>
          </tr>

          <tr>
           <td colspan="6" class="text-right">Grand Total</td>
           <td class="text-right">{{ $payment->total_amount }}</td>
          </tr>

         </tbody> 

        </table>

        <div class="row">
         <div class="form-group col-md-4">
          <label>Paid Status</label>
          <select name="paid_status" id="paid_status" class="form-control">
            <option value="">Select Status</option>
            <option value="full_paid">Full Paid</option>
            <option value="partial_paid">Partial Paid</option>
          </select><br>
          <input type="text" name="paid_amount" class="form-control form-control-sm paid_amount" placeholder="Enter paid Amount" style="display:none;">
         </div>

         <div class="form-group col-md-4">
          <label for="date">Date</label>
          <input type="text" name="date"  id="date" class="form-control datepicker"  placeholder="YYYY-MM-DD" readonly>
         </div>

         <div class="form-group col-md-3" style="padding-top:30px;">
          <button type="submit" class="btn btn-primary" id="updateButton">Invoice Update</button>
         </div>
        </div>

        </form>


       </div>
       
      
     
     </div>
    </div>  
   </div>
  </div>
 </section>
</div>
  <!-- /.content-wrapper -->

<script type="text/javascript">
 $(document).on('change','#paid_status', function(){
    var paid_status = $(this).val();
    if(paid_status == 'partial_paid'){
      $('.paid_amount').show();
    }else{
      $('.paid_amount').hide();
    }
   });
</script>


<script>
 $(function () {
  $('#myForm').validate({
    rules: {
    paid_status: {
     required: true,
    },
    date: {
     required: true,
    },
    },
    messages: {
 
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});
</script>



@endsection
