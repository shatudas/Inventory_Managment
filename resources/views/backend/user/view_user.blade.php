@extends('backend.layouts.master')
@section('content')

<div class="content-wrapper">
 
 <div class="content-header">
  <div class="container-fluid">
   <div class="row mb-2">
    <div class="col-sm-6">
     <h1 class="m-0">Manage User</h1>
    </div>
    <div class="col-sm-6">
     <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="#">Home</a></li>
      <li class="breadcrumb-item active">User</li>
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
       <h3>User List
        <a href="{{route('user.add')}}" class=" btn btn-success btn-sm float-right"> <i class="fa fa-plus-circle"></i> Add User </a>
       </h3>
      </div>
      
      <div class="card-body">
       <table id="example1" class="table table-bordered table-striped">     
        <thead>
         <tr > 
          <th>SL</th>
          <th>Role</th>
          <th>Name</th>
          <th>Email</th>
          <th align="center">Status</th>
          <th>Action</th>
         </tr>
        </thead>

        <tbody>
         @foreach($alldata as $key => $user)
          <tr > 
            <td>{{ $key+1 }}</td>
            <td>{{ $user->user_type }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td align="center" >
             
             @if($user->status == '0')
              @if($user->delatable == '1')
               <a class="btn btn-success btn-sm " aria-disabled="true" disabled> Active </a >
              @elseif($user->delatable == '0') 
               <a href="{{ route('user.inactive',$user->id) }}" class="btn btn-primary btn-sm " > Publish </a >
              @else
               <a href="{{ route('user.active',$user->id) }}" class="btn btn-danger btn-sm"  > Draft </a>
              @endif
             @endif 
             
            </td>
            <td>

              @if($user->delatable == '1')
              
                <h2><center>
                 <i class="fa fa-smile-o text-warning" aria-hidden="true" ></i>
                 </center></h2>
               
               @elseif($user->delatable == '0')
               <a href="{{ route('user.edit',$user->id) }}" title="Edit" class="btn btn-sm btn-primary" ><i class="fa fa-edit"></i></a>
              <a href="{{ route('user.delete',$user->id) }}" title="Delete" id="delete"  class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
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
