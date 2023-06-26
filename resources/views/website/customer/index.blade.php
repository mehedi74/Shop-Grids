@extends('website.master')
@section('title')
  Customer Dashboard
@endsection
@section('body')
    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title" style="color: #1c1c27">Wellcome Dear, {{$customer->name}}</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="{{route('home')}}"><i class="lni lni-home"></i> Home</a></li>
                        <li>Dashboard</li>
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
    <section class="checkout-wrapper" style="padding: 20px">
       <div class="container">
           <div class="list-group col-md-2">
               <a href="#" class="list-group-item list-group-item-action" aria-current="true">
                  Update Password
               </a>
               <a href="#" class="list-group-item list-group-item-action">Update Profile</a>
               <a href="#" class="list-group-item list-group-item-action">View Orders</a>
               <a href="#" class="list-group-item list-group-item-action">Wishlist</a>
               <a href="#" class="list-group-item list-group-item-action disabled" tabindex="-1" aria-disabled="true">A disabled link item</a>
           </div>
       </div>
    </section>
@endsection
