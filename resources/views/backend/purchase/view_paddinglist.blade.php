@extends('backend.layouts.master')
@section('content')

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
       <h3>Padding Purchase List
       </h3>
      </div>
      
      <div class="card-body">
       <table id="example1" class="table table-bordered table-striped ">     
        <thead>
         <tr> 
          <th> SL </th>
          <th> Purchase ID </th>
          <th> Date </th>
          <th> Supulier </th>
          <th> Category </th>
          <th> Product </th>
          <th> Description </th>
          <th> Qty </th>
          <th> Unit Price </th>
          <th> Buying Price </th>
          <th> Status </th>
          <th style="width:8%;"> Action </th>
         </tr>
        </thead>

        <tbody>
         @foreach($alldata as $key => $purchase)
          <tr > 
            <td>{{ $key+1 }}</td>
            <td>{{ $purchase->purchase_id }}</td>
            <td>{{ date('d-m-Y',strtotime($purchase->date)) }}</td>
            <td>{{ $purchase['supplier']['name'] }}</td>
            <td>{{ $purchase['category']['name'] }}</td>
            <td>{{ $purchase['product']['name'] }}</td>
            <td>{{ $purchase->description }}</td>
            <td> 
             {{ $purchase->buying_qty }}
             {{ $purchase['product']['unit']['name'] }}

            </td>
            <td>{{ $purchase->unit_price }}</td>
            <td>
              @if($purchase->status == '0')
              <span class="btn btn-primary btn-sm " > padding </span >
             @else
              <span class="btn btn-danger btn-sm"  > Aprove </span>
             @endif 
            </td>
            </td>
            <td>{{ $purchase->buying_price }}</td>
            <td align="center">
             @if($purchase->status == '0')
              <a href="{{ route('purchase.aprove',$purchase->id) }}" title="aproveBtn" id="aproveBtn"  class="btn btn-sm btn-success"><i class="fa fa-check-circle"></i></a>
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
