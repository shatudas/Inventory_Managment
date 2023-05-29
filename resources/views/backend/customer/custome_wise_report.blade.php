@extends('backend.layouts.master')
@section('content')

<div class="content-wrapper">
 
 <div class="content-header">
  <div class="container-fluid">
   <div class="row mb-2">
    <div class="col-sm-6">
     <h1 class="m-0">Manage Customer Wise Report</h1>
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
       <h3>Select  Criteria </h3>

      </div>

        <div class="card-body">
         
          <div class="row">
           <div class="col-sm-12 text-center mb-4">
            <strong>Customer Credit Repost</strong>
            <input type="radio" name="customer_wise_repost" value="customer_credit" class="serch_value">  &nbsp;  &nbsp;  &nbsp;
            <strong>Product Paid Repost</strong>
            <input type="radio" name="customer_wise_repost" value="customer_paid" class="serch_value">  &nbsp;  &nbsp;  &nbsp;
           </div>
          </div>

         <div class="show_credit" style="display: none;">
          <form method="GET" action="{{ route('customer.wise.credit.report') }}" id="customer_credit" target="_blank">
           <div class="form-row">
            <div class="col-sm-8">
             <label>Customer Name</label>
             <select name="customer_id" class="form-control">
              <option value="">Select Customer</option>
              @foreach($customer as $customers)
               <option value="{{ $customers->id }}">{{ $customers->name }}, {{ $customers->mobile }}, {{ $customers->address }}</option>
              @endforeach
             </select>
            </div>
            <div class="col-sm-4" style="padding-top:30px;">
             <button type="submit" class="btn btn-primary ">Search</button>
            </div>
           </div>
          </form>
         </div>


         <div class="show_paid" style="display: none;">
          <form method="GET" action="{{ route('customer.wise.paid.report') }}" id="customer_paid" target="_blank">
           <div class="form-row">
            
            <div class="col-sm-8">
             <label>Customer Name</label>
             <select name="customer_id" class="form-control">
              <option value="">Select Customer</option>
              @foreach($customer as $customers)
               <option value="{{ $customers->id }}">{{ $customers->name }}, {{ $customers->mobile }}, {{ $customers->address }}</option>
              @endforeach
             </select>
            </div>
  
            <div class="col-sm-4" style="padding-top:30px;">
             <button type="submit" class="btn btn-primary ">Search</button>
            </div>

           </div>
          </form>
         </div>

        </div>

     </div>  
    </div>
   </div>
  </div>
 </section>
</div>
  <!-- /.content-wrapper -->



 


   <script type="text/javascript">
   $(document).on('change','.serch_value', function(){
    var serch_value = $(this).val();
    if(serch_value == 'customer_credit' ) {
     $('.show_credit').show();
    }else{
     $('.show_credit').hide();
    }

    if(serch_value == 'customer_paid' ) {
     $('.show_paid').show(); 
    }else{
     $('.show_paid').hide();
    }
   });
  </script>



<script>
 $(function () {
  $('#customer_credit').validate({
    rules: {
    customer_id: {
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



<script>
 $(function () {
  $('#customer_paid').validate({
    rules: {
    customer_id: {
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
