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
           <input type="text" name="date" id="date" class="form-control datepicker form-control-sm"  placeholder="YYYY-MM-DD" readonly>
          </div>

          <div class="form-group col-md-4">
           <label for="purchase_id">Purchase No</label>
           <input type="text" id="purchase_id" name="purchase_id" class="form-control form-control-sm"  >
          </div>

          <div class="form-group col-md-4">
           <label for="suplier_id">Supplier Name</label>
           <select name="supplier_id" id="supplier_id" class="form-control  select2">
            <option value="">Select Supplier</option>
            @foreach($suppliers as $supplier)
            <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
            @endforeach
           </select>
          </div>
         
          <div class="form-group col-md-4">
           <label for="category_id">Category Name</label>
           <select name="category_id" id="category_id" class="form-control select2">
            <option value="">Select Category</option>
           </select>
          </div>

          <div class="form-group col-md-4">
           <label for="product_id">Product Name</label>
           <select name="product_id" id="product_id" class="form-control select2">
            <option value="">Select Product</option>
           </select>
          </div>

          <div class="form-group col-md-2 " style="margin-top:30px;">
           <button class="btn btn-primary btn-sm addeventmore "><i class="fa fa-plus-circle"> Add Item</i>
           </button>
          </div>

         </div>
       </div>


       <div class="card-body">
        <form method="post" action="{{ route('purchase.store') }}" id="myForm">
         @csrf
         <table class="table-sm table-bordered" width="100%">
          
          <thead>
           <tr>
            <th>Category</th>
            <th>Product Name</th>
            <th>Unit</th>
            <th>Unit Price</th>
            <th>Discripson</th>
            <th width="10%">Total Price</th>
            <th>Action</th>
           </tr>
          </thead>

          <tbody id="addRow" class="addRow">
          </tbody>

          <tbody>
           <tr>
            <td colspan="5"></td>
            <td>
             <input type="text" name="estimated_amount" value="0" id="estimated_amount" class="form-control form-control-sm text-right estimated_amount" readonly style="background-color:#D8FDBA">
            </td>
            <td></td>
           </tr>
          </tbody>

         </table>
         <br>
         
         <div class="form-group">
          <button type="submit" class="btn btn-primary"  id="storeButton">Purchase Store</button>
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



<script id="document-template" type="text/x-handlebars-template">
 <tr class="delete_add_more_item" id="delete_add_more_item">
  <input type="hidden" name="date[]" value="@{{date}}">
  <input type="hidden" name="purchase_id[]" value="@{{purchase_id}}">
  <input type="hidden" name="supplier_id[]" value="@{{supplier_id}}">
  <td>
   <input type="hidden" name="category_id[]" value="@{{category_id}}"> 
   @{{category_name}} 
  </td>
  <td>
   <input type="hidden" name="product_id[]" value="@{{product_id}}"> 
   @{{product_name}}
 </td>
 <td>
  <input type="number" name="buying_qty[]" class="form-control form-control-sm text-right buying_qty" min="1" value="1">
 </td>
 <td>
  <input type="number" name="unit_price[]" class="form-control form-control-sm text-right unit_price" value="">
  </td> 
  <td>
   <input type="text" name="description[]" class="form-control form-control-sm">
  </td>
  <td>
   <input name="buying_price[]" class="form-control form-control-sm text-right buying_price"  value="0" readonly>
  </td>
  <td>
   <button class="btn btn-danger btn-sm removeeventmore">
    <i class="fa fa-window-close"></i>
   </button>
  </td>
 </tr>

</script>






<script type="text/javascript">

 $(document).ready(function (){
  $(document).on("click",".addeventmore", function (){
   var date        = $('#date').val();
   var purchase_id = $('#purchase_id').val();
   var supplier_id = $('#supplier_id').val();
   var category_id = $('#category_id').val();
   var category_name = $('#category_id').find('option:selected').text();
   var product_id = $('#product_id').val();
   var product_name =$('#product_id').find('option:selected').text();

   if(date==''){
    $.notify("date is required",{globalPosition:'top right',className:'error'});
    return false;
   }
   if(purchase_id==''){
    $.notify("purchase_id is required",{globalPosition:'top right',className:'error'});
    return false;
   }
   if(supplier_id==''){
    $.notify("supplier_id is required",{globalPosition:'top right',className:'error'});
    return false;
   }
   if(category_id==''){
    $.notify("category_id is required",{globalPosition:'top right',className:'error'});
    return false;
   }
   if(product_id==''){
    $.notify("category_id is required",{globalPosition:'top right',className:'error'});
    return false;
   }

   var source = $("#document-template").html();
   var template = Handlebars.compile(source);
   var data = {
    date:date,
    purchase_id:purchase_id,
    supplier_id:supplier_id,
    category_id:category_id,
    category_name:category_name,
    product_id:product_id,
    product_name:product_name
   };

  var html = template(data);
   $("#addRow").append(html);
  });

  $(document).on("click",".removeeventmore", function(event){
   $(this).closest(".delete_add_more_item").remove();
   totalAmountPrice();
  });

  $(document).on('keyup click','.unit_price,.buying_qty',function(){
   var unit_price =$(this).closest("tr").find("input.unit_price").val();
   var qty =$(this).closest("tr").find('input.buying_qty').val();
   var total = unit_price*qty;
   $(this).closest("tr").find("input.buying_price").val(total);
   totalAmountPrice();
  });


  function totalAmountPrice(){
   var sum = 0;
   $(".buying_price").each(function(){
    var value =$(this).val();
    if(!isNaN(value) && value.length != 0){
     sum +=parseFloat(value);
    }
   });
   $('#estimated_amount').val(sum);
  }
 });
</script>









@endsection





