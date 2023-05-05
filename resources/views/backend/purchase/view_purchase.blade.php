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
       <h3>Purchase List
        <a href="{{route('purchase.add')}}" class=" btn btn-success btn-sm float-right"> <i class="fa fa-plus-circle"></i> Add Purchase </a>
       </h3>
      </div>
      
      <div class="card-body">
       <table id="example1" class="table table-bordered table-striped">     
        <thead>
         <tr> 
          <th> SL </th>
          <th> Purchase No </th>
          <th> Date </th>
          <th> Product </th>
          <th> Unit </th>
          <th align="center"> Status </th>
          <th> Action </th>
         </tr>
        </thead>

        <tbody>
         @foreach($alldata as $key => $purchase)
          <tr > 
            <td>{{ $key+1 }}</td>
            <td>{{ $purchase->purchase_id }}</td>
            <td>{{ $purchase->date }}</td>
            <td>{{ $purchase['product']['name'] }}</td>
            <td>{{-- {{ $purchase['unit']['name'] }} --}}</td>
            <td align="center">
             @if($purchase->status == '0')
              <a href="{{ route('purchase.inactive',$purchase->id) }}" class="btn btn-primary btn-sm " > Publish </a >
             @else
              <a href="{{ route('purchase.active',$purchase->id) }}" class="btn btn-danger btn-sm"  > Draft </a>
             @endif 
            </td>
            <td>
              <a href="{{ route('purchase.edit',$purchase->id) }}" title="Edit" class="btn btn-sm btn-primary" ><i class="fa fa-edit"></i></a>
              <a href="{{ route('purchase.delete',$purchase->id) }}" title="Delete" id="delete"  class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
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
