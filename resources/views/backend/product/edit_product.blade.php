@extends('backend.layouts.master')
@section('content')

<!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
  
  <div class="content-header">
   <div class="container-fluid">
    <div class="row mb-2">
     <div class="col-sm-6">
     <h1 class="m-0">Manage Product</h1>
     </div>
      <div class="col-sm-6">
       <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">Product</li>
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
        <h3> Edit Product
         <a href="{{route('product.view')}}" class=" btn btn-success btn-sm float-right"> <i class="fa fa-list"></i> Product List</a>
        </h3>
       </div>
              
       <div class="card-body">
        <form method="POST" action="{{route('product.update',$editdata->id)}}" id="myForm">
         @csrf
         <div class="form-row">

          <div class="form-group col-md-6">
           <label for="suplier_id">Supplier Name</label>
           <select name="suplier_id" id="suplier_id" class="form-control">
            <option value="">Select Supplier</option>
            @foreach($suppliers as $supplier)
            <option value="{{ $supplier->id }}" {{ ($editdata->suplier_id == $supplier->id)?'selected':'' }}>{{ $supplier->name }}</option>
            @endforeach
           </select>
          </div>

          <div class="form-group col-md-6">
           <label for="unit_id">Unit Name</label>
           <select name="unit_id" id="unit_id" class="form-control">
            <option value="">Select Unit</option>
            @foreach($units as $unit)
            <option value="{{ $unit->id }}" {{ ($editdata->unit_id == $unit->id)?'selected':'' }}>{{ $unit->name }}</option>
            @endforeach
           </select>
          </div>

          <div class="form-group col-md-6">
           <label for="category_id">Category Name</label>
           <select name="category_id" id="category_id" class="form-control">
            <option value="">Select Category</option>
            @foreach($categorys as $category)
            <option value="{{ $category->id }}" {{ ($editdata->category_id == $category->id)?'selected':'' }}>{{ $category->name }}</option>
            @endforeach
           </select>
          </div>


          <div class="form-group col-md-6">
           <label for="name">Name</label>
           <input type="text" name="name" class="form-control" value="{{ $editdata->name }}">
           <font style="color:red">{{($errors->has('name'))?($errors->first('name')):'' }}</font>
          </div>

          
           <div class="form-group col-md-6">
           <label for="status">Status</label>
           <select name="status" id="status" class="form-control">
            <option value="">Select Status</option>
            <option value="0" {{ $editdata->status=="0"?"selected":"" }}>Active</option>
            <option value="1" {{ $editdata->status=="1"?"selected":"" }}>Inactive</option>
           </select>
          </div>

          <div class="form-group col-md-6 " style="margin-top:30px;">
           <input type="submit" value="Update"  class="btn btn-primary">
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
