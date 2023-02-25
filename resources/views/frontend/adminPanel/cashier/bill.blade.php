@extends('frontend.adminPanel.layouts.main');
@section('container')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <div class="container d-flex" style="margin-top:90px;">
        <div class="container border border-success" style="width:70%;height:60vh;overflow:auto;">
            

                <h5 class="mt-3">Order Details</h5><hr>
              

                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">SN</th>
                        <th scope="col">Name</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Price</th>
                        <th scope="col">Total</th>
                      </tr>
                    </thead>
                    <tbody>
                      
                      @for($i=0;$i<$count;$i++)
                      <tr>
                        <th scope="row">{{$i+1}}</th>
                        <td>{{$items[$i]}}</td>
                        <td>{{$orders[$i]->quantity}}
                          
                          <a href="#" class="ps-2 pe-2 p-1" style="background-color:lightgreen;"><i class="fa-solid fa-angle-up" style="color:white;"></i></a>
                            <a href="#" class=" p-1 ps-2 pe-2" style="background-color:red;"><i class="fa-solid fa-angle-down"style="color:white;"></i></a>
                        </td>
                        <td>{{$orders[$i]->price}}</td>
                        <td>{{$orders[$i]->total}}</td>
                      </tr>
                      @endfor
                      
                      {{-- @foreach ($orders as $order)
                      <tr>
                        <th scope="row">{{$i}}</th>
                        <td>{{$order->items->name}}</td>
                        <td>{{$order->quantity}}
                          
                            <button class="button">up</button>
                            <button class="button">down</button>
                        </td>
                        <td>{{$order->price}}</td>
                        <td>{{$order->total}}</td>
                      </tr>
                      @endforeach --}}
                      
                    </tbody>
                </table>
        </div>
    
      <div class="container border border-success" style="width:30%;">
            <div class="container border rounded border-danger  mt-3 p-0">
                <h5 class="border-bottom" style="padding:20px;text-align:center;">Bill Details</h5>
                <div class="bill-details p-0">
                  <div class="d-flex justify-content-between p-2 border-bottom">
                    <span>Sub Total:</span>
                    <span>Rs.{{$subTotal}}</span>
                  </div>
                  <div class="d-flex justify-content-between p-2  border-bottom">
                    <span>Tax:</span>
                    <span>0$</span>
                  </div>
                  <div class="d-flex justify-content-between p-2  border-bottom">
                    <span>Discout:</span>
                    <span>0$</span>
                  </div>
                  <div class="d-flex justify-content-between p-2  border-bottom">
                    <span>Service charge:</span>
                    <span>90$</span>
                  </div>
                  <div class="pt-3 alert m-0  border  pb-3 bold d-flex justify-content-between">
                    <span>Total:</span>
                    <span>90$</span>
                  </div>

                </div>
              
              
              </div>


            </div>
      </div>
    </div>
@endsection