@extends('backend.layouts.master')
@section('content')

<div class="content-wrapper">
 
 <div class="content-header">
  <div class="container-fluid">
   <div class="row mb-2">
    <div class="col-sm-6">
     <h1 class="m-0">Manage Credit Customer</h1>
    </div>
    <div class="col-sm-6">
     <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="#">Home</a></li>
      <li class="breadcrumb-item active">Customer</li>
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
       <h3>Credit Customer List
        <a href="{{route('customer.credit.pdf')}}" class=" btn btn-success btn-sm float-right" target="_blank"> <i class="fa fa-download"></i> Download PDF </a>
       </h3>
      </div>
      
      <div class="card-body">
       <table id="example1" class="table table-bordered table-striped">     
        <thead>
         <tr > 
          <th> SL </th>
          <th> Customer Name </th>
          <th> Invoice Number </th>
          <th> Date </th>
          <th> Amount </th>
          <th> Action </th>
         </tr>
        </thead>

        <tbody>
         @foreach($alldata as $key => $payment)
          <tr > 
            <td>{{ $key+1 }}</td>
            <td>
              {{ $payment['customer']['name'] }}, 
              <small>{{ $payment['customer']['address'] }},
              {{ $payment['customer']['mobile'] }}</small>
            </td>
            <td>Invoice No # {{ $payment['invoice']['invoice_no'] }}</td>
            <td>{{ date('d-m-Y',strtotime($payment['invoice']['date']))}} </td>
            <td align="center">
              {{ $payment->due_amount }} TK
            </td>
            <td>
              <a href="{{ route('customer.invoice.edit',$payment->invoice_id) }}" title="Edit" class="btn btn-sm btn-primary" ><i class="fa fa-edit"></i></a>
              <a href="{{ route('customer.invoice.detalis',$payment->invoice_id) }}" title="Detalis" class="btn btn-sm btn-success" target="_blabk"><i class="fa fa-eye"></i></a>
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
