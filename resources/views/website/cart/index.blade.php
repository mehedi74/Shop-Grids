@extends('website.master')
@section('title')
    Cart Page
@endsection
@section('body')
    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">Cart</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="index.html"><i class="lni lni-home"></i> Home</a></li>
                        <li><a href="index.html">Shop</a></li>
                        <li>Cart</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="shopping-cart" style="padding-top: 50px">
        <div class="container">
            <div class="cart-list-head">
                <div class="cart-list-title">
                    <div class="row">
                        <div class="col-lg-1 col-md-1 col-12">
                        </div>
                        <div class="col-lg-4 col-md-3 col-12">
                            <p>Product Name</p>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12">
                            <p>Quantity</p>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12">
                            <p>Subtotal</p>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12">
                            <p>Discount</p>
                        </div>
                        <div class="col-lg-1 col-md-2 col-12">
                            <p>Remove</p>
                        </div>
                    </div>
                </div>
                @foreach($cartProducts as $cartProduct)
                 <form method="post" enctype="multipart/form-data" action="{{route('product.cart.update',$cartProduct->__raw_id)}}">
                        @csrf
                     <div class="cart-single-list">
                    <div class="row align-items-center">
                        <div class="col-lg-1 col-md-1 col-12">
                            <a><img src="{{asset($cartProduct->image)}}" alt="#"></a>
                        </div>
                        <div class="col-lg-4 col-md-3 col-12">
                            <h5 class="product-name"><a href="#">
                                    {{$cartProduct->qty}} * {{$cartProduct->name}}</a></h5>
{{--                            <p class="product-des">--}}
{{--                                <span><em>Type:</em> Mirrorless</span>--}}
{{--                                <span><em>Color:</em> Black</span>--}}
{{--                            </p>--}}
                        </div>
                        <div class="col-lg-2 col-md-2 col-12">
                            <div class="input-group">
                                <input type="number" class="form-control" name="product_qty" value="{{$cartProduct->qty}}" min="1" required>
                                <input type="submit"  class="btn btn-success" value="Update" onclick="functionOne()">
                            </div>
                        </div>
                 </form>
                        <script>
                            function functionOne(){
                                swal('Congrats! Product Updated Successfully');
                            }
                            function functionTwo(){
                                swal('Congrats! Product Deleted Successfully');
                            }
                        </script>
                        <div class="col-lg-2 col-md-2 col-12">
                            <p>{{ShoppingCart::total()}}</p>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12">
                            <p>$00.00</p>
                        </div>
                        <div class="col-lg-1 col-md-2 col-12">
                            <a class="remove-item" onclick="functionTwo()" href="{{route('product.cart.remove',['id'=>$cartProduct->rawId()])}}"><i class="lni lni-close"></i></a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="row">
                <div class="col-12">

                    <div class="total-amount">
                        <div class="row">
                            <div class="col-lg-8 col-md-6 col-12">
                                <div class="left">
                                    <div class="coupon">
                                        <form action="#" target="_blank">
                                            <input name="Coupon" placeholder="Enter Your Coupon">
                                            <div class="button">
                                                <button class="btn">Apply Coupon</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="right">
                                    <ul>
                                        <li>Cart Subtotal<span>${{$total=ShoppingCart::total()}}</span></li>
                                        <li>Shipping<span>${{$shipping=100}}</span></li>
                                        <li>Tax Amount(5%)<span>${{$taxAmount=round(($total*5)/100)}}</span></li>
                                        <li class="last">You Pay<span>${{$grandTotal=$total+$taxAmount+$shipping}}</span></li>
                                    </ul>
                                    <div class="button">
                                        <a href="{{route('checkout')}}" class="btn">Checkout</a>
                                        <a href="{{route('home')}}" class="btn btn-alt">Continue shopping</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
