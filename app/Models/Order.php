<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class Order extends Model
{
    use HasFactory;

    public static function newOrder($request,$customer_id)
    {
        $order = new Order();
        $order->customer_id = $customer_id;
        $order->order_date = date('Y-m-d');
        $order->order_timestamp = strtotime(date('Y-m-d'));
        $order->order_total = Session::get('grandTotal');
        $order->tax_total = Session::get('tax');
        $order->shipping_total = Session::get('shipTotal');
        $order->delivery_address = $request->delivery_address;
        $order->payment_type = $request->payment_type;
        $order->save();
        return $order->id;
    }
}
