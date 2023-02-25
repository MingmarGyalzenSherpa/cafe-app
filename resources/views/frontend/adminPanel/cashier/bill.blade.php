@extends('frontend.adminPanel.layouts.main');
@section('container')

    <div class="container d-flex" style="margin-top:90px;">
        <div class="container border border-success" style="width:70%;">
            <div class="container border rounded mt-3 border-danger">

                <h5>Order Details</h5></div>

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
                          
                            <button class="button">up</button>
                            <button class="button">down</button>
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
@endsection