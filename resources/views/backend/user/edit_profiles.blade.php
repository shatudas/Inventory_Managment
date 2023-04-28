@extends('backend.layouts.master')
@section('content')

<!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
  
  <div class="content-header">
   <div class="container-fluid">
    <div class="row mb-2">
     <div class="col-sm-6">
     <h1 class="m-0">Manage Profile</h1>
     </div>
      <div class="col-sm-6">
       <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">Profile</li>
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
        <h3> Edit Profile
         <a href="{{route('profiles.view')}}" class=" btn btn-success btn-sm float-right"> <i class="fa fa-list"></i> Your Profile</a>
        </h3>
       </div>
              
       <div class="card-body">
        <form method="POST" action="{{route('profiles.update')}}" id="myForm" enctype="multipart/form-data">
         @csrf
         <div class="form-row">

          <div class="form-group col-md-4">
           <label for="name">Name</label>
           <input type="text" name="name" value="{{ $editdata->name }}" class="form-control">
           <font style="color:red">{{($errors->has('name'))?($errors->first('name')):'' }}</font>
          </div>

          <div class="form-group col-md-4">
           <label for="email">Email</label>
           <input type="email" name="email" value="{{ $editdata->email }}" class="form-control">
           <font style="color:red">{{($errors->has('email'))?($errors->first('email')):'' }}</font>
          </div>

          <div class="form-group col-md-4">
           <label for="mobile">Mobile</label>
           <input type="number" name="mobile" value="{{$editdata->mobile}}" class="form-control">
           <font style="color:red">{{($errors->has('mobile'))?($errors->first('mobile')):'' }}</font>
          </div>

          <div class="form-group col-md-4">
           <label for="address">Address</label>
           <input type="text" name="address" value="{{$editdata->address}}" class="form-control">
           <font style="color:red">{{($errors->has('address'))?($errors->first('address')):'' }}</font>
          </div>

          <div class="form-group col-md-4">
           <label for="gender">gender</label>
           <select name="gender" id="usertype" class="form-control">
            <option value="">Select Gender</option>
            <option value="Male" {{$editdata->gender=="Male"?"selected":""}}>Male</option>
            <option value="Female" {{$editdata->gender=="Female"?"selected":""}}>Female</option>
           </select>
          </div>
                
          <div class="form-group col-md-4">
           <label for="image">Image</label>
           <input type="file" name="image" class="form-control" id="image">
          </div>

          <div class="form-group col-md-2">
           <img id="showImage" src="{{!empty($editData->image)?url('upload/user_images/'.$editData->image):url('upload/No-image.jpg')}}" style="width:120px; height:120px; border:1px solid #ccc;">
          </div>

          <div class="form-group col-md-6" style="padding-top:30px;">
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
     
    name: {
     required: true,
    },
     email: {
     required: true,
     email: true,
    },
    

    },
    messages: {
    
     name: {
        required: "Please Enter Name",
      },
      email: {
        required: "Please Enter a Email Address",
        email: "Please enter a <em>valid</em> email address",
      },
      

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
