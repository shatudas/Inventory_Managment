@extends('backend.layouts.master')
@section('content')

<div class="content-wrapper">
 
 <div class="content-header">
  <div class="container-fluid">
   <div class="row mb-2">
    <div class="col-sm-6">
     <h1 class="m-0">Manage Customer</h1>
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
       <h3>Customer List
        <a href="{{route('customer.add')}}" class=" btn btn-success btn-sm float-right"> <i class="fa fa-plus-circle"></i> Add Customer </a>
       </h3>
      </div>
      
      <div class="card-body">
       <table id="example1" class="table table-bordered table-striped">     
        <thead>
         <tr > 
          <th> SL </th>
          <th> Name </th>
          <th> Mobile </th>
          <th> Email </th>
          <th> Address </th>
          <th align="center"> Status </th>
          <th> Action </th>
         </tr>
        </thead>

        <tbody>
         @foreach($alldata as $key => $customer)
          <tr > 
            <td>{{ $key+1 }}</td>
            <td>{{ $customer->name }}</td>
            <td>{{ $customer->mobile }}</td>
            <td>{{ $customer->email }}</td>
            <td>{{ $customer->address }}</td>
            <td align="center">
             @if($customer->status == '0')
              <a href="{{ route('customer.inactive',$customer->id) }}" class="btn btn-primary btn-sm " > Publish </a >
             @else
              <a href="{{ route('customer.active',$customer->id) }}" class="btn btn-danger btn-sm"  > Draft </a>
             @endif 
            </td>
            <td>
              <a href="{{ route('customer.edit',$customer->id) }}" title="Edit" class="btn btn-sm btn-primary" ><i class="fa fa-edit"></i></a>
              <a href="{{ route('customer.delete',$customer->id) }}" title="Delete" id="delete"  class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
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
