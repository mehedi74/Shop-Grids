<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CustomerController extends Controller
{
    public function register(Request $request)
    {
        if ($request->isMethod('post')) {
            //form validation
            $this->validate($request,[
                'customer_name' => 'required',
                'customer_email' => 'required|unique:customers,email',
                'customer_mobile' => 'required|unique:customers,mobile',
                'customer_nid' => 'unique:customers,nid',
                'customer_password' => 'required',
                'customer_image' => 'required',
                'customer_address' => 'required',
            ], [
                'customer_name.required' => 'Name is required.',
                'customer_email.required' => 'Email is required.',
                'customer_mobile.required' => 'Mobile is required.',
                'customer_email.unique' => 'This email is already exists.Please login or give new email.',
                'customer_mobile.unique' => 'This mobile is already exists.Please login or give new mobile.',
                'customer_nid.unique' => 'This NID is already exists.Please give unique NID.',
                'customer_password.required' => 'Password is required.',
                'customer_image.required' => 'Image  is required.',
                'customer_address.required' => 'Address  is required.',
            ]);
            Customer::registerOrUpdateCustomer($request);
            return back()->with('msg_registration', 'Congrats! You are a new member of Shop Grids. We are happy to have you.');
        }
        return view('website.customer.login-register');
    }

    public function login(Request $request)
    {

        if ($request->isMethod('post')) {
            $customer = Customer::where('email', $request->customer_email)->first();
            if ($customer) {
                if (password_verify($request->customer_password, $customer->password)) {
                    Session::put('customer_id', $customer->id);
                    Session::put('customer_name', $customer->name);
                    Session::put('customer_image', $customer->image);
                    if (\ShoppingCart::isEmpty()) {
                        return redirect('/customer/dashboard');
                    } else {
                        return redirect('/checkout');
                    }
                } else {
                    return back()->with('msg', "Password is Invalid");
                }
            } else {
                return back()->with('msg', "Email is not correct or Invalid");
            }
        }
        return view('website.customer.login-register');
    }

    public function index()
    {
        return view('website.customer.index', ['customer' => Customer::where('id', Session::get('customer_id'))->first()]);
    }


    public function logout()
    {
        Session::forget('customer_id');
        Session::forget('customer_name');
        Session::forget('customer_image');
        \ShoppingCart::clean();
        return redirect('/');
    }
}
