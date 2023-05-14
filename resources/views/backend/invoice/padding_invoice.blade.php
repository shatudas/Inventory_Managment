@extends('backend.layouts.master')
@section('content')

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
       <h3>PaddingInvoices List
       </h3>
      </div>
      
      <div class="card-body">
       <table id="example1" class="table table-bordered table-striped">     
        <thead>
         <tr> 
          <th> SL </th>
          <th> Customer Name</th>
          <th> Invoices No </th>
          <th> Date </th>
          <th> Description </th>
          <th> Amount </th>
          <th>Status</th>
          <th>Action</th>
         </tr>
        </thead>

        <tbody>
         @foreach($alldata as $key => $invoice)
          <tr > 
            <td>{{ $key+1 }}</td>
            <td>
            {{ $invoice['payment']['customer']['name'] }} ,
            {{ $invoice['payment']['customer']['mobile'] }} ,
            {{ $invoice['payment']['customer']['address'] }}
          </td>
            <td>Invoice No #{{ $invoice->invoice_no }}</td>
            <td>{{ date('d-m-Y',strtotime($invoice->date)) }}</td>
            <td>{{ $invoice->description }}</td>
            <td>{{ $invoice['payment']['total_amount'] }}</td>
            <td>
              @if($invoice->status == '0')
              <span class="btn btn-primary btn-sm " > padding </span >
             @else
              <span class="btn btn-danger btn-sm"  > Aprove </span>
             @endif 
            </td>
             <td align="center">
             @if($invoice->status == '0')
              <a href="{{ route('invoices.aprove',$invoice->id) }}" title="aprove"  class="btn btn-sm btn-success"><i class="fa fa-check-circle"></i></a>
              <a href="{{ route('invoices.delete',$invoice->id) }}" title="Delete" id="delete"  class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
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
