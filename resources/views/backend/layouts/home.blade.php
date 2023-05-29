@extends('backend.layouts.master')
@section('content')

 <div class="content-wrapper">
    <!-- Content Header -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <!-- Main content -->
    <section class="content">
     <div class="container-fluid">
      <div class="row">

       <div class="col-lg-3 col-6">
        <div class="small-box bg-info">
         <div class="inner">
          <h3>{{ $user }}</h3>
          <p>Active User</p>
         </div>
         <div class="icon">
          <i class="fa fa-user-circle-o"></i>
         </div>
         <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
       </div>
        
       <div class="col-lg-3 col-6">
        <div class="small-box bg-success">
         <div class="inner">
           <h3>{{ $customer }}</h3>
          <p> Customer</p>
         </div>
         <div class="icon">
          <i class="fa fa-user"></i>
         </div>
         <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
       </div>
         
       <div class="col-lg-3 col-6"> 
        <div class="small-box bg-warning">
         <div class="inner">
          <h3>{{ $product }}</h3>
          <p>Active Product</p>
         </div>
         <div class="icon">
          <i class="fa fa-product-hunt"></i>
         </div>
         <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
       </div>

       <div class="col-lg-3 col-6"> 
        <div class="small-box bg-danger">
         <div class="inner">
          <h3>{{ $quantity }}</h3>
          <p>Total Stock</p>
         </div>
         <div class="icon">
          <i class="fa fa-inventory"></i>
         </div>
         <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
       </div> 

      </div>
     </div>
    </section>
  </div>

@endsection
