{{-- @extends('backend.layouts.master')
@section('content')
 --}}
<!DOCTYPE html>
<html>
<head>
  <title></title>
   <!-------datatable-------->
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('backend') }}/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('backend') }}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('backend') }}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset('backend') }}/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('backend') }}/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('backend') }}/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('backend') }}/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('backend') }}/plugins/summernote/summernote-bs4.min.css">
  <!-------datatable-------->
  <link rel="stylesheet" href="{{ asset('backend') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="{{ asset('backend') }}/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="{{ asset('backend') }}/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

</head>
<body>


 <!-- Main content -->
 <section class="content mt-5">
  <div class="container">
   <div class="row">
    <div class="col-12">

     <div class="card">
      <div class="card-header">
       <h3>Invoice No # {{$invoice->invoice_no}} <small>{{date('d-m-Y',strtotime($invoice->date))}}</small>
       </h3>
      </div>
      
      <div class="card-body">

       @php
        $payment = App\Model\payment::where('invoice_id',$invoice->id)->first();
       @endphp

          <table width="100%">
            <tbody>
              <tr>
                <td width="15%"><p>Costomer Info:</p></td>
                <td width="25%"><p><strong>Name:</strong> {{ $payment['customer']['name'] }}</p></td>
                <td width="25%"><p><strong>Mobile:</strong> {{ $payment['customer']['mobile'] }}</p></td>
                <td width="35%"><p><strong>Address:</strong> {{ $payment['customer']['address'] }}</p></td>
              </tr>
              <tr>
               <td width="15%"></td>
               <td width="85%" colspan="3"><strong>Discripshon:</strong>{{ $invoice->description  }}</td>
              </tr>
            </tbody>
          </table>


          <form method="POST" action="{{ Route('aproval.store',$invoice->id) }}">
           @csrf
           <table border="1" width="100%" style="margin-bottom: 10px;">
            <thead>
             <tr align="center">
              <th>SL</th>
              <th>Category</th>
              <th>Product</th>
              <th>Current Stock</th>
              <th>Qty</th>
              <th>Unit Price</th>
              <th>Total Price</th>
             </tr>
            </thead>
            <tbody>


             @php
             $totalSum = '0';
             @endphp

             @foreach($invoice['invoice_detalis'] as $key => $detalis)

             <input type="hidden" name="category_id[]" value="{{ $detalis->category_id }}">
             <input type="hidden" name="product_id[]" value="{{ $detalis->product_id }}">
             <input type="hidden" name="selling_qty[{{ $detalis->id }}]" value="{{ $detalis->selling_qty }}">

             <tr align="center">
              <td>{{ $key+1 }}</td>
              <td>{{ $detalis['category']['name'] }}</td>
              <td>{{ $detalis['product']['name'] }}</td>
              <td>{{ $detalis['product']['quantity'] }}</td>
              <td>{{ $detalis->selling_qty }}</td>
              <td>{{ $detalis->unit_price }}</td>
              <td class="text-right">{{ $detalis->selling_price }}</td>
             </tr>
             @php
              $totalSum +=  $detalis->selling_price;
             @endphp

             @endforeach

            <tr>
             <td colspan="6" class="text-right">Sub Total</td>
             <td class="text-right">{{ $totalSum }}</td>
            </tr>

            <tr>
             <td colspan="6" class="text-right">Discount</td>
             <td class="text-right">{{ $payment->discount_amount }}</td>
            </tr>

            <tr>
             <td colspan="6" class="text-right">Paid Amount</td>
             <td class="text-right">{{ $payment->paid_amount }}</td>
            </tr>

            <tr>
             <td colspan="6" class="text-right">Due Amount</td>
             <td class="text-right">{{ $payment->due_amount }}</td>
            </tr>

            <tr>
             <td colspan="6" class="text-right">Grand Total</td>
             <td class="text-right">{{ $payment->total_amount }}</td>
            </tr>

           </tbody>
           
           </table>


           @php
            $date = new DateTime('now', new DateTimezone('Asia/Dhaka'));
           @endphp

           <i>Prining Time : {{ $date->format('F j ,Y, g:i a') }}</i>


           <table width="100%" class="mt-5">
             <tbody>
               <tr>
                 <td width="50%" align="center">
                  <hr width="40%" align="center">
                   Seller Signature
                 </td>
                 <td width="50%" align="center">
                  <hr width="40%" align="center">
                   Customer Name 
                 </td>
               </tr>
             </tbody>
           </table>
 

      </div>
     </div>  
    </div>
   </div>
  </div>
 </section>



<script src="{{ asset('backend') }}/plugins/jquery/jquery.min.js"></script>

<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('backend') }}/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('backend') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="{{ asset('backend') }}/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="{{ asset('backend') }}/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="{{ asset('backend') }}/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="{{ asset('backend') }}/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('backend') }}/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="{{ asset('backend') }}/plugins/moment/moment.min.js"></script>
<script src="{{ asset('backend') }}/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('backend') }}/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="{{ asset('backend') }}/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('backend') }}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ asset('backend') }}/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('backend') }}/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('backend') }}/dist/js/pages/dashboard.js"></script>
<!-- jquery-validation -->
<script src="{{ asset('backend') }}/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="{{ asset('backend') }}/plugins/jquery-validation/additional-methods.min.js"></script>
<!-- Select2 -->
<script src="{{ asset('backend') }}/plugins/select2/js/select2.full.min.js"></script>


<script src="{{ asset('backend') }}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{ asset('backend') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ asset('backend') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{ asset('backend') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="{{ asset('backend') }}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{ asset('backend') }}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="{{ asset('backend') }}/plugins/jszip/jszip.min.js"></script>
<script src="{{ asset('backend') }}/plugins/pdfmake/pdfmake.min.js"></script>
<script src="{{ asset('backend') }}/plugins/pdfmake/vfs_fonts.js"></script>
<script src="{{ asset('backend') }}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="{{ asset('backend') }}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="{{ asset('backend') }}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-----handlebars---------->
<script src="{{ asset('backend') }}/plugins/datatables-buttons/js/handlebars.js"></script>

</body>
</html>



{{-- @endsection --}}
