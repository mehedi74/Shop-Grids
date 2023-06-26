@extends('website.master')
@section('title')
    Login/Register
@endsection
@section('body')
    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">Login/Register</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="{{route('home')}}"><i class="lni lni-home"></i> Home</a></li>
                        <li><a href="index.html">Shop</a></li>
                        <li>Login/Register</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <section class="checkout-wrapper"  @if(Session::has('msg') || Session::has('msg_registration') ) style="padding:5px" @else style="padding:60px" @endif>
        <div class="container">
            @if(Session::has('msg_registration'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{session('msg_registration')}}</strong>
                    <a class="btn btn-primary" href="{{route('customer.login')}}">Login to your account</a>
                </div>
            @endif
            @if(Session::has('msg'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{session('msg')}}</strong>
                </div>
            @endif
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <div class="card">
                        <div class="card-header">
                          <h4>Login Form</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{route('customer.login')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group mt-1">
                                    <label for="customer_email">Email address</label>
                                    <input type="email" name="customer_email" class="form-control" id="customer_email" aria-describedby="emailHelp" placeholder="Enter email">
                                </div>
                                <div class="form-group mt-10">
                                    <label for="customer_password">Password</label>
                                    <input  name="customer_password" type="password" class="form-control" id="customer_email" placeholder="Password">
                                </div>
                                <div class="form-group form-check"  style="margin-top: 10px">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Remember me</label>
                                </div>
                                <button type="submit" class="btn btn-primary mt-10">Login</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 offset-1">
                   @if($errors->any())
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                        </ul>
                    </div>
                    @endif
                    <div class="card">
                        <div class="card-header">
                           <h4>Registration Form</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{route('customer.register')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group mt-1">
                                    <label for="customer_email">Name<sup style="color: red">*</sup></label>
                                    <input type="text" name="customer_name" class="form-control" id="customer_name" aria-describedby="emailHelp" placeholder="Enter your name">
                                </div>
                                <div class="form-group mt-1">
                                    <label for="customer_mobile">Mobile<sup style="color: red">*</sup> </label>
                                    <input type="number" name="customer_mobile" class="form-control" id="customer_mobile" aria-describedby="emailHelp" placeholder="Enter your mobile">
                                </div>
                                <div class="form-group mt-10">
                                    <label for="customer_email">Email<sup style="color: red">*</sup></label>
                                    <input type="email" name="customer_email" class="form-control" id="customer_email"  placeholder="Enter email">
                                </div>
                                <div class="form-group mt-10">
                                    <label for="customer_password">Password<sup style="color: red">*</sup></label>
                                    <input  name="customer_password" type="text" class="form-control" id="customer_password" placeholder="Password">
                                </div>
                                <div class="form-group mt-10">
                                    <label for="customer_birth">Date 0f Birth</label>
                                    <input  name="customer_birth" type="date" class="form-control" id="customer_birth" placeholder="Password">
                                </div>
                                <div class="form-group mt-10">
                                    <label for="customer_nid">NID</label>
                                    <input  name="customer_nid" type="number" class="form-control" id="customer_nid" placeholder="Password">
                                </div>
                                <div class="form-group mt-10">
                                    <label for="customer_password">Image<sup style="color: red">*</sup></label>
                                    <input  name="customer_image" type="file" class="form-control" id="customer_image" placeholder="Password">
                                </div>
                                <div class="form-group mt-10">
                                    <label for="customer_blood">Blood Group</label>
                                    <input  name="customer_blood" type="text" class="form-control" id="customer_blood" placeholder="Password">
                                </div>
                                <div class="form-group mt-1">
                                    <label for="customer_address">Address<sup style="color: red">*</sup></label>
                                    <textarea  name="customer_address" class="form-control" id="customer_address" style="height: 60px"></textarea>
                                </div>
                                <div class="form-group form-check"  style="margin-top: 10px">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Remember me</label>
                                </div>
                                <button type="submit" class="btn btn-primary mt-10">Register</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
