@extends('backend.layouts.master')
@section('content')

<div class="content-wrapper">
 
 <div class="content-header">
  <div class="container-fluid">
   <div class="row mb-2">
    <div class="col-sm-6">
     <h1 class="m-0">Manage Supplier/Product Stock</h1>
    </div>
    <div class="col-sm-6">
     <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="#">Home</a></li>
      <li class="breadcrumb-item active">Stock</li>
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
           <div class="col-sm-12 text-center">
           <strong>Supplier Wise Repost</strong>
           <input type="radio" name="supplier_product_wise" value="supplier_wise" class="serch_value">  &nbsp;  &nbsp;  &nbsp;

           <strong>Product Wise Repost</strong>
           <input type="radio" name="supplier_product_wise" value="product_wise" class="serch_value">  &nbsp;  &nbsp;  &nbsp;
          </div>
         </div>


         <div class="show_supplier" style="display: none;">
          <form method="GET" action="{{ route('stock.report.supplier.product.pdf') }}" id="SupplierWise" target="_blank">
           <div class="form-row">
            <div class="col-sm-8">
             <label>Supplier Name</label>
             <select name="supplier_id" class="form-control">
              <option value="">Select Supplier</option>
              @foreach($supplier as $suppliers)
              <option value="{{ $suppliers->id }}">{{ $suppliers->name }}</option>
            
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
    if(serch_value == 'supplier_wise' ) {
     $('.show_supplier').show();
    }else{
     $('.show_supplier').hide();
    }
   });
  </script>


<script>
 $(function () {
  $('#SupplierWise').validate({
    rules: {
    supplier_id: {
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
