@extends('backend.layouts.master')
@section('content')

<!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
  
  <div class="content-header">
   <div class="container-fluid">
    <div class="row mb-2">
     <div class="col-sm-6">
     <h1 class="m-0">Manage Invoices</h1>
     </div>
      <div class="col-sm-6">
       <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">Invoices</li>
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
        <h3> Select Criteria</h3>
       </div>


       <form method="GET" action="{{ route('daily.report.pdf') }}" id="myForm" target="_black">
              
       <div class="card-body">
        <div class="form-row">

          <div class="form-group col-md-4">
           <label for="date">Start Date</label>
           <input type="text" name="start_date" id="start_date" class="form-control datepicker form-control-sm"  placeholder="YYYY-MM-DD" readonly>
          </div>

          <div class="form-group col-md-4">
           <label for="date">End Date</label>
           <input type="text" name="end_date" id="end_date" class="form-control datepicker form-control-sm"  placeholder="YYYY-MM-DD" readonly>
          </div>

          <div class="form-group col-md-2 " style="margin-top:30px;">
           <button class="btn btn-primary btn-sm  "><i class="fa fa-search"> Search </i>
           </button>
          </div>

        

         </div>
       </div>

        </form>

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
    start_date: {
     required: true,
    },
    end_date: {
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





