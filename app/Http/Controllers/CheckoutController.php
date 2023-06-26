<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use ShoppingCart;

class CheckoutController extends Controller
{

    public function index()
    {
        if (Session::get('customer_id')) {
            $customer = Customer::find(Session::get('customer_id'));
        } else {
            $customer = '';
        }
        return view('website.checkout.index', ['customer' => $customer]);
    }

    public function placeOrderOnCash(Request $request)
    {

        //form validation needed...


        //realtime registration + order place....
        if (Session::get('customer_id')) {
            $customer = Customer::find(Session::get('customer_id'));
            $this->validate($request, [
                'delivery_address' => 'required',
            ], [
                'delivery_address.required' => 'Delivery address is required.',
            ]);
        } else {
            //form validation if customer is registered but not login...
            $this->validate($request, [
                'customer_name' => 'required',
                'customer_email' => 'required|unique:customers,email',
                'customer_mobile' => 'required|unique:customers,mobile',
                'delivery_address' => 'required',
            ], [
                'customer_name.required' => 'Name is required.',
                'customer_email.required' => 'Email is required.',
                'customer_mobile.required' => 'Mobile is required.',
                'customer_email.unique' => 'This email is already exists.please login or give new email.',
                'customer_mobile.unique' => 'This mobile is already exists.please login or give new mobile.',
                'delivery_address.required' => 'Delivery address is required.',
            ]);

            $customer = Customer::newCustomer($request);
            //for instant login after registration....
            Session::put('customer_id', $customer->id);
            Session::put('customer_name', $customer->name);
            Session::put('customer_image', $customer->image);

        }

        //We can add a separate ship table without inserting data into order table as delivery address//
        //making order...
        $orderId=Order::newOrder($request,$customer->id);

        //inserting order detail....
        foreach (ShoppingCart::all() as $cartPtoduct) {
            $orderDetail = new OrderDetail();
            $orderDetail->order_id = $orderId;
            $orderDetail->product_id = $cartPtoduct->id;
            $orderDetail->product_name = $cartPtoduct->name;
            $orderDetail->product_price = $cartPtoduct->price;
            $orderDetail->product_qty = $cartPtoduct->qty;
            $orderDetail->save();
        }
        ShoppingCart::clean();
        return back()->with('msg', 'Congrats! ' . session('customer_name') . '.' . ' Your order has been placed Successfully. We will contact you soon');
    }
}
