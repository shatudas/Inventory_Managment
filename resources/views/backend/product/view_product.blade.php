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
        <a href="{{route('product.add')}}" class=" btn btn-success btn-sm float-right"> <i class="fa fa-plus-circle"></i> Product Unit </a>
       </h3>
      </div>
      
      <div class="card-body">
       <table id="example1" class="table table-bordered table-striped">     
        <thead>
         <tr > 
          <th> SL </th>
          <th> Supplier </th>
          <th> Category </th>
          <th> Unit </th>
          <th> Name </th>
          <th align="center"> Status </th>
          <th> Action </th>
         </tr>
        </thead>

        <tbody>
         @foreach($alldata as $key => $product)
          <tr > 
            <td>{{ $key+1 }}</td>
            <td>{{ $product['supplier']['name'] }}</td>
            <td>{{ $product['category']['name'] }}</td>
            <td>{{ $product['unit']['name'] }}</td>
            <td>{{ $product->name }}</td>
            <td align="center">
             @if($product->status == '0')
              <a href="{{ route('product.inactive',$product->id) }}" class="btn btn-primary btn-sm " > Publish </a >
             @else
              <a href="{{ route('product.active',$product->id) }}" class="btn btn-danger btn-sm"  > Draft </a>
             @endif 
            </td>
            @php
             $count_product = App\Model\Purchase::where('product_id',$product->id)->count();
            @endphp
            <td>
              <a href="{{ route('product.edit',$product->id) }}" title="Edit" class="btn btn-sm btn-primary" ><i class="fa fa-edit"></i></a>
              @if($count_product<1)
              <a href="{{ route('product.delete',$product->id) }}" title="Delete" id="delete"  class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
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
