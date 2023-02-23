@extends('frontend.adminPanel.layouts.main');
@section('container')

    <div class="container d-flex" style="margin-top:90px;">
        <div class="container border border-success" style="width:70%;height:200px;">
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
                      <tr>
                        <th scope="row">1</th>
                        <td>Chowmein</td>
                        <td>2</td>
                        <td>120</td>
                        <td>240</td>
                      </tr>
                    </tbody>
                  </table>

            </div>
        <div class="container border border-success" style="width:30%;height:900px;">
            <div class="container border rounded border-danger  mt-3 ">
                <h5>Bill Details</h5></div>


            </div>
    </div>
@endsection