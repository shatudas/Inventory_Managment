@extends('backend.layouts.master')
@section('content')

<!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
  
  <div class="content-header">
   <div class="container-fluid">
    <div class="row mb-2">
     <div class="col-sm-6">
     <h1 class="m-0">Manage User</h1>
     </div>
      <div class="col-sm-6">
       <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">User</li>
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
        <h3> Edit User
         <a href="{{route('user.view')}}" class=" btn btn-success btn-sm float-right"> <i class="fa fa-list"></i> Edit List</a>
        </h3>
       </div>
              
       <div class="card-body">
        <form method="POST" action="{{route('user.update',$editdata->id)}}" id="myForm">
         @csrf
         <div class="form-row">

          <div class="form-group col-md-4">
           <label for="user_type">User Role</label>
           <select name="user_type" id="user_type" class="form-control">
            <option value="">Select Role</option>
            <option value="Admin" {{ ($editdata->user_type=='Admin')?"selected":"" }}>Admin</option>
            <option value="User" {{ ($editdata->user_type=='User')?"selected":"" }}>User</option>
           </select>
          </div>

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

          <div class="form-group col-md-6">
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
     user_type: {
     required: true,
    },
    name: {
     required: true,
    },
     email: {
     required: true,
     email: true,
    },
    

    },
    messages: {
     user_type: {
        required: "Please Select Type",
      },
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
