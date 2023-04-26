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
        <h3> Add User
         <a href="{{route('user.view')}}" class=" btn btn-success btn-sm float-right"> <i class="fa fa-list"></i> User List</a>
        </h3>
       </div>
              
       <div class="card-body">
        <form method="POST" action="{{route('user.store')}}" id="myForm">
         @csrf
         <div class="form-row">

          <div class="form-group col-md-4">
           <label for="user_type">User Role</label>
           <select name="user_type" id="user_type" class="form-control">
            <option value="">Select Role</option>
            <option value="Admin">Admin</option>
            <option value="Oparetor">Oparetor</option>
           </select>
          </div>

          <div class="form-group col-md-4">
           <label for="name">Name</label>
           <input type="text" name="name" class="form-control">
           <font style="color:red">{{($errors->has('name'))?($errors->first('name')):'' }}</font>
          </div>

          <div class="form-group col-md-4">
           <label for="email">Email</label>
           <input type="email" name="email" class="form-control">
           <font style="color:red">{{($errors->has('email'))?($errors->first('email')):'' }}</font>
          </div>

          <div class="form-group col-md-4">
           <label for="password">Password</label>
           <input type="password" name="password" id="password" class="form-control">
           <font style="color:red">{{($errors->has('password'))?($errors->first('password')):'' }}</font>
          </div>

          <div class="form-group col-md-4">
           <label for="comfirmpass">Comfrom Password</label>
           <input type="password" name="comfirmpass" class="form-control">
           <font style="color:red">{{($errors->has('comfirmpass'))?($errors->first('comfirmpass')):'' }}</font>
          </div>

          <div class="form-group col-md-6">
           <input type="submit" value="submit"  class="btn btn-primary">
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
     password: {
     required: true,
     minlength: 6
    },
     comfirmpass: {
     required: true,
     equalTo: '#password'
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
       password: {
        required: "Please Enter Password",
        minlength: "Password Will Be Minimam Six Digit",
      },
       comfirmpass: {
        required: "Please Enter Confirm Password",
        equalTo: "Confirm password Dose Not Match",
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
