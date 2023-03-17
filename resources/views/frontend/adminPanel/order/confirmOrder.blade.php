@extends('frontend.adminPanel.layouts.main')
@section('container')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<div class="containers " style="margin-top:90px;">
    
    <div class="table ">
        <div class="row justify-content-center">

            <div class="col-sm-6 border ">
                <h4>Order </h4>

            </div>
            <div class="col-sm-2 border  order-quantity">
                <h4>Quantity</h4>
            </div>
            <div class="col-sm-3 border order-action">
                <h4>Actions</h4>
            </div>
        </div>
        <div class="row justify-content-center">

            <div class="col-sm-3 border p-3  dish-img">
                fd
            </div>
            <div class=" col-sm-3 border p-3 dish-name">
    fd
            </div>
            <div class="col-sm-2 border p-3  order-quantity">
fd
            </div>
            <div class="col-sm-3 border p-3 order-action">
                <a href="" class="ps-5 pe-5 p-3" style="background-color:lightgreen;"><i class="fa-solid fa-angle-up" style="color:white;"></i></a>
                <a href="" class=" ps-5 pe-5 p-3" style="background-color:red;"><i class="fa-solid fa-angle-down"style="color:white;"></i></a>

            </div>
        </div>
       


    </div>
</div>
@endsection