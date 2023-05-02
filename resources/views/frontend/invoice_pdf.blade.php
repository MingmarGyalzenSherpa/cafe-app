<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>INVOICE</title>
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
      crossorigin="anonymous"
    />
  </head>
  <body>
    <div class="container" style="width: 80%; margin: 0 auto">
      <h1 class="text-center">Invoice</h1>
      <BR></BR>
      <div class="header d-flex justify-content-around">
        <div class="order-info">
          <h4>Invoice ID: {{$sale->id}}</h4>
          <h4>Bill Date: {{$sale->created_at}}</h4>
        </div>
        <div class="cafe-info">
          <h1>MAS CAFE</h1>
        </div>
      </div>
      <hr />
      <table class="table">
        <tr>
          <th>Item</th>
          <th>Qty</th>
          <th>Rate</th>
          <th>Amount</th>
        </tr>
        @foreach($orders as $order)
        <tr>
            <td>
                {{$order->name}}
            </td>
            <td>
                {{$order->quantity}}
            </td>
            <td>
                {{$order->price}}
            </td>
            <td>
                {{$order->total}}
            </td>

        </tr>
        @endforeach
      </table>
      <hr />
      <p>Gross Amount: {{$sale->Amount}}</p>
      <hr />
      <p>Grand Total: {{$sale->Amount}}</p>
      <hr />
      <p>Customer Paid:{{$tendered}}</p>
      <p>Refund: {{$tendered - $sale->Amount}}</p>
      <p></p>
      <h6>THANK YOU !!PLEASE VISIT AGAIN!!</h6>
    </div>
  </body>
</html>
