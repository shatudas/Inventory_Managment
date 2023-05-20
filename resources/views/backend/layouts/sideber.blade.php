@php
 $prefix = Request::route()->getPrefix();
 $route = Route::current()->getName();
@endphp
  
 <!-- Sidebar Menu -->
 <nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

   <li class="nav-item {{($prefix=='/user')?'menu-open':''}}">
    <a href="#" class="nav-link">
     <i class="nav-icon fas fa-copy"></i>
     <p>
      Manage User
      <i class="fas fa-angle-left right"></i>
     </p>
    </a>

    <ul class="nav nav-treeview">
     <li class="nav-item">
      <a href="{{ route('user.view') }}" class="nav-link {{($route=='user.view')?'active':''}}">
       <i class="far fa-circle nav-icon"></i>
       <p> View User </p>
      </a>
     </li>  
    </ul>
   </li>


   <li class="nav-item has-treeview {{($prefix=='/profiles')?'menu-open':''}}">
    <a href="#" class="nav-link">
     <i class="nav-icon fas fa-copy"></i>
     <p> Manage Profile <i class="fas fa-angle-left right"></i> <span class=""></span></p>
    </a>
    <ul class="nav nav-treeview ">
     <li class="nav-item">
      <a href="{{route('profiles.view')}}" class="nav-link  {{($route=='profiles.view')?'active':''}}">
       <i class="far fa-circle nav-icon"></i>
       <p>Your Profile</p>
      </a>
     </li>
     <li class="nav-item">
      <a href="{{route('profiles.password.view')}}" class="nav-link {{($route=='profiles.password.views')?'active':''}}">
       <i class="far fa-circle nav-icon"></i>
       <p>Change Password</p>
      </a>
     </li>
    </ul>
   </li>


   <li class="nav-item has-treeview {{($prefix=='/supplier')?'menu-open':''}}">
    <a href="#" class="nav-link">
     <i class="nav-icon fas fa-copy"></i>
     <p> Manage Suppliers <i class="fas fa-angle-left right"></i> <span class=""></span></p>
    </a>
    <ul class="nav nav-treeview ">
     <li class="nav-item">
      <a href="{{route('supplier.view')}}" class="nav-link  {{($route=='supplier.view')?'active':''}}">
       <i class="far fa-circle nav-icon"></i>
       <p>View Suppliers</p>
      </a>
     </li>
    </ul>
   </li>


   <li class="nav-item has-treeview {{($prefix=='/customer')?'menu-open':''}}">
    <a href="#" class="nav-link">
     <i class="nav-icon fas fa-copy"></i>
     <p> Manage Customers <i class="fas fa-angle-left right"></i> <span class=""></span></p>
    </a>
    <ul class="nav nav-treeview ">
     <li class="nav-item">
      <a href="{{route('customer.view')}}" class="nav-link  {{($route=='customer.view')?'active':''}}">
       <i class="far fa-circle nav-icon"></i>
       <p>View Customers </p>
      </a>
     </li>
    </ul>
   </li>


   <li class="nav-item has-treeview {{($prefix=='/unit')?'menu-open':''}}">
    <a href="#" class="nav-link">
     <i class="nav-icon fas fa-copy"></i>
     <p> Manage Unit  <i class="fas fa-angle-left right"></i> <span class=""></span></p>
    </a>
    <ul class="nav nav-treeview ">
     <li class="nav-item">
      <a href="{{route('unit.view')}}" class="nav-link  {{($route=='unit.view')?'active':''}}">
       <i class="far fa-circle nav-icon"></i>
       <p>View unit </p>
      </a>
     </li>
    </ul>
   </li>


   <li class="nav-item has-treeview {{($prefix=='/category')?'menu-open':''}}">
    <a href="#" class="nav-link">
     <i class="nav-icon fas fa-copy"></i>
     <p> Manage Category  <i class="fas fa-angle-left right"></i> <span class=""></span></p>
    </a>
    <ul class="nav nav-treeview ">
     <li class="nav-item">
      <a href="{{route('category.view')}}" class="nav-link  {{($route=='category.view')?'active':''}}">
       <i class="far fa-circle nav-icon"></i>
       <p>View Category  </p>
      </a>
     </li>
    </ul>
   </li>


   <li class="nav-item has-treeview {{($prefix=='/product')?'menu-open':''}}">
    <a href="#" class="nav-link">
     <i class="nav-icon fas fa-copy"></i>
     <p> Manage Product  <i class="fas fa-angle-left right"></i> <span class=""></span></p>
    </a>
    <ul class="nav nav-treeview ">
     <li class="nav-item">
      <a href="{{route('product.view')}}" class="nav-link  {{($route=='product.view')?'active':''}}">
       <i class="far fa-circle nav-icon"></i>
       <p>View Product </p>
      </a>
     </li>
    </ul>
   </li>


   <li class="nav-item has-treeview {{($prefix=='/purchase')?'menu-open':''}}">
    <a href="#" class="nav-link">
     <i class="nav-icon fas fa-copy"></i>
     <p> Manage Purchase  <i class="fas fa-angle-left right"></i> <span class=""></span></p>
    </a>
    <ul class="nav nav-treeview ">
     <li class="nav-item">
      <a href="{{route('purchase.view')}}" class="nav-link  {{($route=='purchase.view')?'active':''}}">
       <i class="far fa-circle nav-icon"></i>
       <p>View Purchase </p>
      </a>
     </li>
     <li class="nav-item">
      <a href="{{route('purchase.padding.list')}}" class="nav-link  {{($route=='purchase.padding.list')?'active':''}}">
       <i class="far fa-circle nav-icon"></i>
       <p>Approval Purchase </p>
      </a>
     </li>
    </ul>
   </li>


   <li class="nav-item has-treeview {{($prefix=='/invoices')?'menu-open':''}}">
    <a href="#" class="nav-link">
     <i class="nav-icon fas fa-copy"></i>
     <p> Manage Invoices  <i class="fas fa-angle-left right"></i> <span class=""></span></p>
    </a>
    <ul class="nav nav-treeview ">
     <li class="nav-item">
      <a href="{{route('invoices.view')}}" class="nav-link  {{($route=='invoices.view')?'active':''}}">
       <i class="far fa-circle nav-icon"></i>
       <p>View Invoices </p>
      </a>
     </li>
     <li class="nav-item">
      <a href="{{route('invoices.padding.list')}}" class="nav-link  {{($route=='invoices.padding.list')?'active':''}}">
       <i class="far fa-circle nav-icon"></i>
       <p>View Approval</p>
      </a>
     </li>
     <li class="nav-item">
      <a href="{{route('invoices.print.list')}}" class="nav-link  {{($route=='invoices.print.list')?'active':''}}">
       <i class="far fa-circle nav-icon"></i>
       <p>Print Invoices</p>
      </a>
     </li>
     <li class="nav-item">
      <a href="{{route('daily.report')}}" class="nav-link  {{($route=='daily.report')?'active':''}}">
       <i class="far fa-circle nav-icon"></i>
       <p>Daily Invoice Report </p>
      </a>
     </li>

     
    </ul>
   </li>










  
  </ul>
 </nav>