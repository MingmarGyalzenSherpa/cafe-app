<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session as FacadesSession;
use PDF;

class InvoiceController extends Controller
{
    public function Invoice($saleID, $tendered)
    {

        $sale = Sale::find($saleID);
        $orders = DB::table('orders')->join('items', 'orders.item_id', '=', 'items.id')->where('orders.sale_id', '=', $sale->id)->select('orders.*', 'items.name')->get();
        // $orders = Order::where('completed', '=', 1)->where('sale_id', '=', $sale->id)->get();
        $pdf = PDF::loadView('frontend.invoice_pdf', compact('sale', 'orders', 'tendered'));


        return $pdf->download('bill_invoice_' . $sale->id . '.pdf');
    }
}
