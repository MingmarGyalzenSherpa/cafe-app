@extends('frontend.adminPanel.layouts.main');
@section('container')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <div class="container " style="margin-top:90px;">
       <a href="{{route('cashierDashboard')}}" class="btn" style="color:red;">  <i class="fa-solid fa-arrow-left"></i>  GO BACK</a>
       <div class="download d-flex justify-content-center align-items-center" style="height:600px;">
        <a href="{{route('invoice',[$saleID,$tendered])}}" class="btn btn-primary">DOWNLOAD INVOICE </a>

       </div>
            

    </div>

   
@endsection