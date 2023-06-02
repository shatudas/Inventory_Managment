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
              <li class="breadcrumb-item active">Inventory</li>
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
         <div class="icon" >
          <i class="fa fa-user-circle-o text-white"></i>
         </div>
         @if(Auth::user()->user_type=='Admin')
         <a href="{{ route('user.view') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
         @else
         <a href="#" class="small-box-footer" disable="">More info <i class="fas fa-arrow-circle-right"></i></a>
         @endif
        </div>
       </div>
        
       <div class="col-lg-3 col-6">
        <div class="small-box bg-success">
         <div class="inner">
           <h3>{{ $customer }}</h3>
          <p> Customer</p>
         </div>
         <div class="icon">
          <i class="fa fa-user text-white"></i>
         </div>
         <a href="{{route('customer.view')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
       </div>
         
       <div class="col-lg-3 col-6"> 
        <div class="small-box bg-warning">
         <div class="inner">
          <h3 style="color: #FFF;" >{{ $product }}</h3>
          <p>Active Product</p>
         </div>
         <div class="icon">
          <i class="fa fa-product-hunt text-white"></i>
         </div>
         <a href="{{route('product.view')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
       </div>

       <div class="col-lg-3 col-6"> 
        <div class="small-box bg-danger">
         <div class="inner">
          <h3>{{ $quantity }}</h3>
          <p>Total Stock</p>
         </div>
         <div class="icon">
          <i class="fa fa-cube text-white"></i>
         </div>
         <a href="{{route('stock.report')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
       </div> 


       <div class="col-lg-3 col-6"> 
        <div class="small-box bg-primary">
         <div class="inner">
          <h3>{{ $total_sale }}</h3>
          <p>Total Sale</p>
         </div>
         <div class="icon">
          <i class="fa fa-shopping-cart text-white" aria-hidden="true"></i>
         </div>
         <a href="{{route('invoices.view')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
       </div> 

       <div class="col-lg-3 col-6"> 
        <div class="small-box bg-secondary">
         <div class="inner">
          <h3>{{ $PaymentDetali }}</h3>
          <p>Paid Amount</p>
         </div>
         <div class="icon">
          <i class="fa fa-money text-white" aria-hidden="true"></i>
         </div>
         <a href="" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
       </div> 


      </div>
     </div>
    </section>
  </div>

@endsection
