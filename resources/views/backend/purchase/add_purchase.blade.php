@extends('backend.layouts.master')
@section('content')

<!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
  
  <div class="content-header">
   <div class="container-fluid">
    <div class="row mb-2">
     <div class="col-sm-6">
     <h1 class="m-0">Manage Purchase</h1>
     </div>
      <div class="col-sm-6">
       <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">Purchase</li>
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
        <h3> Add Purchase
         <a href="{{route('purchase.view')}}" class=" btn btn-success btn-sm float-right"> <i class="fa fa-list"></i> Purchase List</a>
        </h3>
       </div>
              
       <div class="card-body">
        
         <div class="form-row">

          <div class="form-group col-md-4">
           <label for="suplier_id">Date</label>
           <input type="text" name="date" class="form-control datepicker" id="date" placeholder="YYYY-MM-DD" readonly>
          </div>

          <div class="form-group col-md-4">
           <label for="purchase_no">Purchase No</label>
           <input type="text" name="purchase_no" class="form-control" id="purchase_no" >
          </div>

          <div class="form-group col-md-4">
           <label for="suplier_id">Supplier Name</label>
           <select name="supplier_id" id="supplier_id" class="form-control">
            <option value="">Select Supplier</option>
            @foreach($suppliers as $supplier)
            <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
            @endforeach
           </select>
          </div>

         
          <div class="form-group col-md-4">
           <label for="category_id">Category Name</label>
           <select name="category_id" id="category_id" class="form-control">
            <option value="">Select Category</option>
           </select>
          </div>

          <div class="form-group col-md-4">
           <label for="product_id">Product Name</label>
           <select name="product_id" id="product_id" class="form-control">
            <option value="">Select Product</option>
           </select>
          </div>


          <div class="form-group col-md-2 " style="margin-top:30px;">
           <span class="btn btn-primary"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add Item</span>
          </div>


         {{--  <div class="form-group col-md-6 " style="margin-top:30px;">
           <input type="submit" value="submit"  class="btn btn-primary">
          </div>
 --}}
         </div>
        </form>
       </div>

     </div>
    </div>
   </div>
  </div>
 </section>


</div>

<script type="text/javascript">
 $(function(){
   $(document).on('change','#supplier_id',function(){
    var supplier_id = $(this).val();
    $.ajax({
     url:"{{ route('get_category') }}",
     type:"GET",
     data:{supplier_id:supplier_id},
     success:function(data){
      var html = '<option value="">Select Category</option>';
      $.each(data,function(key,v){
      html +='<option value="'+v.category_id+'">'+v.category.name+'</option>';
      });
      $('#category_id').html(html);
     }
    });
   });
 });
</script>


<script type="text/javascript">
 $(function(){
   $(document).on('change','#category_id',function(){
    var category_id = $(this).val();
    $.ajax({
     url:"{{ route('get_product') }}",
     type:"GET",
     data:{category_id:category_id},
     success:function(data){
      var html = '<option value="">Select Product</option>';
      $.each(data,function(key,v){
      html +='<option value="'+v.id+'">'+v.name+'</option>';
      });
      $('#product_id').html(html);
     }
    });
   });
 });
</script>







<script>
 $(function () {
  $('#myForm').validate({
    rules: {
    suplier_id: {
     required: true,
    },
    unit_id: {
     required: true,
    },
    category_id: {
     required: true,
    },
    name: {
     required: true,
    },
    status: {
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
