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
         <a href="{{route('invoices.add')}}" class=" btn btn-success btn-sm float-right"> <i class="fa fa-list"></i> Purchase List</a>
        </h3>
       </div>
              
       <div class="card-body">
        
         <div class="form-row">


          <div class="form-group col-md-1">
           <label for="invoice_no">Invoices No</label>
           <input type="text" id="invoice_no" name="invoice_no" class="form-control form-control-sm" value="{{ $invoiceNo }}" readonly style="background-color:#D8FDBA">
          </div>

          <div class="form-group col-md-2">
           <label for="date">Date</label>
           <input type="text" name="date" value="{{ $date }}" id="date" class="form-control datepicker form-control-sm"  placeholder="YYYY-MM-DD" readonly>
          </div>

          <div class="form-group col-md-3">
           <label for="suplier_id">Category Name</label>
           <select name="category_id" id="category_id" class="form-control  select2">
            <option value="">Select Category</option>
            @foreach($categorys as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
           </select>
          </div>
  
          <div class="form-group col-md-3">
           <label for="product_id">Product Name</label>
           <select name="product_id" id="product_id" class="form-control select2">
            <option value="">Select Product</option>
           </select>
          </div>

          <div class="form-group col-md-2">
           <label for="product_id">Stock</label>
           <input type="text" name="current_stock_qty" id="current_stock_qty" class="form-control form-control-sm pdemo" readonly style="background-color:#D8FDBA">
          </div>

          <div class="form-group col-md-1 " style="margin-top:30px;">
           <button class="btn btn-primary btn-sm addeventmore "><i class="fa fa-plus-circle"> Add </i>
           </button>
          </div>

         </div>
       </div>


       <div class="card-body">
        <form method="post" action="{{ route('invoices.store') }}" id="myForm">
         @csrf
         <table class="table-sm table-bordered" width="100%">
          <thead>
           <tr>
            <th>Category</th>
            <th>Product Name</th>
            <th>Unit</th>
            <th>Unit Price</th>
            <th>Total Price</th>
            <th>Action</th>
           </tr>
          </thead>
          <tbody id="addRow" class="addRow">
           
          </tbody>
          <tbody>
           <tr>
            <td colspan="4">Discount</td>
            <td>
             <input type="text" name="discount_amount" id="discount_amount" class="form-control form-control-sm discount_amount text-right" placeholder="Enter Discount Amount"  >
            </td>
           </tr>
           <tr>
            <td colspan="4"></td>
            <td>
             <input type="text" name="estimated_amount" value="0" id="estimated_amount" class="form-control form-control-sm text-right estimated_amount" readonly >
            </td>
            <td></td>
           </tr>
          </tbody>
         </table>
         <br>

         <div class="form-row">
          <div class="form-group col-12">
           <textarea class="form-control" id="description" name="description" placeholder="whire description here">
           </textarea>
          </div>
         </div>


         <div class="form-row">
          <div class="form-group col-md-4">
           <label>Paid Status</label>
           <select name="paid_status" id="paid_status" class="form-control">
            <option value="">Select Status</option>
            <option value="full_paid">Full Paid</option>
            <option value="full_due">Full Due</option>
            <option value="partial_paid">Partial Paid</option>
           </select><br>
           <input type="text" name="paid_amount" class="form-control form-control-sm paid_amount" placeholder="Enter paid Amount" style="display:none;">
          </div>

          <div class="form-group col-md-8">
           <label>Cuntomer Name</label>
            <select name="customer_id" id="customer_id" class="form-control customer_id">
             @foreach($customers as $customer)
            <option value={{ $customer->id }}"">{{ $customer->name }} ({{ $customer->mobile }}, {{ $customer->address }})</option>
            @endforeach
            <option value="0">New Customer</option>
           </select>
          </div>

         </div>

          <div class="form-row new_cuntomer" style="display:none;">
           <div class="form-group col-md-4">
            <input type="text" name="name" id="name" class="form-control form-control-sm" placeholder="Write Customer Name">
           </div>
           <div class="form-group col-md-4">
            <input type="text" name="mobile" id="mobile" class="form-control form-control-sm" placeholder="Write Customer mobile">
           </div>
           <div class="form-group col-md-4">
            <input type="text" name="address" id="address" class="form-control form-control-sm" placeholder="Write Customer address">
           </div>
          </div>
    
         <div class="form-group">
          <button type="submit" class="btn btn-primary"  id="storeButton">Invoice Store</button>
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


 <script type="text/javascript">
  $(function(){
   $(document).on('change','#product_id', function(){
    var product_id = $(this).val();
    $.ajax({
     url:"{{route('chack-product-stock')}}",
     type:"GET",
     data:{product_id:product_id},
     success:function(data){
      console.log(data)
      $('#current_stock_qty').val(data);
     }
    });
   });
  });
 </script>


 <script id="document-template" type="text/x-handlebars-template">
  <tr class="delete_add_more_item" id="delete_add_more_item">
   <input type="hidden" name="date" value="@{{date}}">
   <input type="hidden" name="invoice_no" value="@{{invoice_no}}">
   <td>
    <input type="hidden" name="category_id[]" value="@{{category_id}}"> 
    @{{category_name}} 
   </td>
   <td>
    <input type="hidden" name="product_id[]" value="@{{product_id}}"> 
    @{{product_name}}
  </td>
  <td>
   <input type="number" name="selling_qty[]" class="form-control form-control-sm text-right selling_qty" min="1" value="1">
  </td>
  <td>
   <input type="number" name="unit_price[]" class="form-control form-control-sm text-right unit_price" value="">
   </td> 
   <td>
    <input name="selling_price[]" class="form-control form-control-sm text-right selling_price"  value="0" readonly>
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
   var invoice_no = $('#invoice_no').val();
   var supplier_id = $('#supplier_id').val();
   var category_id = $('#category_id').val();
   var category_name = $('#category_id').find('option:selected').text();
   var product_id = $('#product_id').val();
   var product_name =$('#product_id').find('option:selected').text();

   if(date==''){
    $.notify("date is required",{globalPosition:'top right',className:'error'});
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
    invoice_no:invoice_no,
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

  $(document).on('keyup click','.unit_price,.selling_qty',function(){
   var unit_price =$(this).closest("tr").find("input.unit_price").val();
   var qty =$(this).closest("tr").find('input.selling_qty').val();
   var total = unit_price*qty;
   $(this).closest("tr").find("input.selling_price").val(total);
   $('#discount_amount').trigger('keyup');
  });

  $(document).on('keyup','#discount_amount',function(){
   totalAmountPrice();
  });


  function totalAmountPrice(){
   var sum = 0;
   $(".selling_price").each(function(){
    var value =$(this).val();
    if(!isNaN(value) && value.length != 0){
     sum +=parseFloat(value);
    }
   });

   var discount_amount = parseFloat($('#discount_amount').val());
   if(!isNaN(discount_amount) && discount_amount.length != 0){
    sum -= parseFloat(discount_amount);
   }
   $('#estimated_amount').val(sum);
  }
 });
</script>


  <script type="text/javascript">
   $(document).on('change','#paid_status', function(){
    var paid_status = $(this).val();
    if(paid_status == 'partial_paid'){
      $('.paid_amount').show();
    }else{
      $('.paid_amount').hide();
    }
   });

   $(document).on('change','.customer_id',function(){
    var customer_id = $(this).val();
    if(customer_id == '0'){
      $('.new_cuntomer').show();
    }else{
      $('.new_cuntomer').hide();
    }
   });

  </script>


 
   






@endsection





