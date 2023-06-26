@extends('website.master')
@section('title')
    Checkout
@endsection
@section('body')
    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">checkout</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="index.html"><i class="lni lni-home"></i> Home</a></li>
                        <li><a href="index.html">Shop</a></li>
                        <li>checkout</li>
                    </ul>
                </div>
            </div>
            @if(Session::has('msg'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{session('msg')}}</strong>
                </div>
            @endif
        </div>
    </div>
    <section class="checkout-wrapper mt-40">
        <div class="container">
            @if(!Session::get('customer_id'))
            <h6 class="mb-5">Are you a registered member? If yes, please <a style="color: red" href="{{route('customer.login')}}">Login from here...</a></h6>
            @endif
                <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="checkout-steps-form-style-1">
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                                        aria-selected="true">Cash On Delivery
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-profile" type="button" role="tab"
                                        aria-controls="pills-profile" aria-selected="false">Online
                                </button>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                 aria-labelledby="pills-home-tab">
                                <form action="{{route('place-order.cash')}}" enctype="multipart/form-data" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="single-form form-default">
                                                <label>Full Name</label>
                                                <div class="form-input form">
                                                    @if(isset($customer->id))
                                                        <input  value="{{$customer->name}}" name="customer_name"  readonly type="text" placeholder="Enter full name">
                                                    @else
                                                        <input name="customer_name" type="text" placeholder="Enter full name">
                                                        <span style="color: red">{{$errors->has('customer_name') ? $errors->first('customer_name') : ''}}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="single-form form-default">
                                                <label>Email Address</label>
                                                <div class="form-input form">
                                                    @if(isset($customer->id))
                                                    <input name="customer_email"  value="{{$customer->email}}" readonly type="email" placeholder="Email Address">
                                                    @else
                                                        <input name="customer_email" type="email" placeholder="Email Address">
                                                        <span style="color: red">{{$errors->has('customer_email') ? $errors->first('customer_email') : ''}}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="single-form form-default">
                                                <label>Mobile Number</label>
                                                <div class="form-input form">
                                                    @if(isset($customer->id))
                                                    <input  value="{{$customer->mobile}}" readonly name="customer_mobile" type="number" placeholder="Mobile number">
                                                    @else
                                                        <input name="customer_mobile" type="number" placeholder="Mobile number">
                                                        <span style="color: red">{{$errors->has('customer_mobile') ? $errors->first('customer_mobile') : ''}}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="single-form form-default">
                                                <label>Delivery Address<sup style="color: red">*</sup></label>
                                                <div class="form-input form">
                                                    <textarea name="delivery_address" placeholder="Enter Address" style="padding-top: 10px;height: 100px"></textarea>
                                                    <span style="color: red">{{$errors->has('delivery_address') ? $errors->first('delivery_address') : ''}}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="single-form form-default">
                                                <label>Payment Type</label>
                                                <div>
                                                <label><input type="radio" value="0" name="payment_type" checked> Cash On Delivery</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="single-form button">
                                                <button class="btn btn-primary" type="submit">Place Order</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                                 aria-labelledby="pills-profile-tab">SSLCOMMERZ WILL BE ADDED
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="checkout-sidebar">
                        <div class="checkout-sidebar-price-table mt-30">
                            <h5 class="title">Pricing Table</h5>
                            <div class="sub-total-price">
                                <div class="total-price">
                                    <p class="value">SubTotal Price:</p>
                                    <p class="price">${{$total=ShoppingCart::total()}}</p>
                                </div>
                                <div class="total-price shipping">
                                    <p class="value">Tax Amount(5%)</p>
                                    <p class="price">${{$taxAmount=round(($total*5)/100)}}</p>
                                </div>
                                <div class="total-price shipping">
                                    <p class="value">Shipping Charge</p>
                                    <p class="price">${{$shipping=100}}</p>
                                </div>
                            </div>
                            <div class="total-payable">
                                <div class="payable-price">
                                    <p class="value">Payable Price:</p>
                                    <p class="price">${{$grandTotal=$total+$taxAmount+$shipping}}</p>
                                </div>
                            </div>

                            <?php
                               Session::put('shipTotal',$shipping);
                               Session::put('tax',$taxAmount);
                               Session::put('grandTotal',$grandTotal);
                            ?>

                        </div>
                        <div class="checkout-sidebar-banner mt-30">
                            <a href="product-grids.html">
                                <img src="{{asset('website')}}/assets/images/banner/banner.jpg" alt="#">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
