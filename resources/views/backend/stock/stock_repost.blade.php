@extends('backend.layouts.master')
@section('content')

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
       <h3>Product List
        <a href="{{route('stock.report.pdf')}}" class=" btn btn-success btn-sm float-right" target="_blank"> <i class="fa fa-download"></i> Download PDF </a>
       </h3>
      </div>
      
      <div class="card-body">
       <table id="example1" class="table table-bordered table-striped">     
        <thead>
         <tr > 
          <th> SL </th>
          <th> Supplier </th>
          <th> Category </th>
          <th> Product Name </th>
          <th> Unit </th>
          <th> In.Qty </th>
          <th> Ont.Qty </th>
          <th> Stock </th>
          <th> Status </th>
         </tr>
        </thead>

        <tbody>
         @foreach($alldata as $key => $product)

         @php
         $bayingtotal = App\Model\Purchase::where('category_id',$product->category_id)->where('product_id',$product->id)->where('status','1')->sum('buying_qty');
         $sellingtotal = App\Model\InvoiceDetali::where('category_id',$product->category_id)->where('product_id',$product->id)->where('status','1')->sum('selling_qty');
         @endphp


          <tr > 
            <td>{{ $key+1 }}</td>
            <td>{{ $product['supplier']['name'] }}</td>
            <td>{{ $product['category']['name'] }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product['unit']['name'] }}</td>
            <td>{{ $bayingtotal }}</td>
            <td>{{ $sellingtotal }}</td>
            <td>
              {{ $product->quantity }}
            </td>
            <td align="center">
             @if($product->status == '0')
              <a class="btn btn-primary btn-sm"> Publish </a >
             @else
              <a class="btn btn-danger btn-sm"> Draft </a>
             @endif 
            </td>
          </tr>
         @endforeach
        </tbody>

       </table>
      </div>
     </div>  
    </div>
   </div>
  </div>
 </section>
</div>
  <!-- /.content-wrapper -->



@endsection
