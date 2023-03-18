@extends('frontend.adminPanel.layouts.main')
@section('container')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<div class="containers " style="margin-top:90px;">
    <div class="btn-container d-flex mb-2  justify-content-between" style="width:85%; margin: 0 auto;">
        <a href="{{route('orderDashboard',$tableID)}}" class="btn btn-danger p-3 ps-4 pe-4 "><i class="fas fa-angle-left pe-2"></i>Go back </a>
        <a href="{{route('orderTableDashboard')}}" class="btn btn-success p-3 ps-4 pe-4 ">Proceed <i class="ps-2 fas fa-angle-right"></i></a>
    </div>
    <div class="table ">
        <div class="row justify-content-center">

            <div class="col-sm-5 border ">
                <h4>Order </h4>

            </div>
            <div class="col-sm-2 border  order-quantity">
                <h4>Quantity</h4>
            </div>
            <div class="col-sm-3 border order-action">
                <h4>Actions</h4>
            </div>
        </div>
        @foreach($orders as $order)
        <div class="row justify-content-center">

            <div class="col-sm-2 border p-3  dish-img ">
                <img src="{{asset('/storage/'.$order->img_path)}}" style="width:100%;" alt="">
            </div>
            <div class=" col-sm-3 border p-3 dish-name d-flex align-items-center justify-content-center">
                <h5>{{$order->name}}</h5>
            </div>
            <div class="col-sm-2 border p-3  order-quantity d-flex align-items-center justify-content-center">
                <h5>{{$order->quantity}}</h5>
            </div>
            <div class="col-sm-3 border p-3 order-action d-flex align-items-center justify-content-center gap-5">
                <a href="{{route('increasePendingOrderQty',$order->id)}}" class="ps-5 pe-5 p-3" style="background-color:lightgreen;"><i class="fa-solid fa-angle-up" style="color:white;"></i></a>
                <a href="{{route('decreasePendingOrderQty',$order->id)}}" class=" ps-5 pe-5 p-3" style="background-color:red;"><i class="fa-solid fa-angle-down"style="color:white;"></i></a>

            </div>
        </div>
       @endforeach


    </div>
</div>
@endsection