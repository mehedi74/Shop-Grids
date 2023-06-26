
<div class="preloader">
    <div class="preloader-inner">
        <div class="preloader-icon">
            <span></span>
            <span></span>
        </div>
    </div>
</div>

<header class="header navbar-area">
    <div class="topbar">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 col-md-4 col-12">
                    <div class="top-left">
                        <ul class="menu-top-link">
                            <li>
                                <div class="select-position">
                                    <select id="select4">
                                        <option value="0" selected>$ USD</option>
                                        <option value="1">€ EURO</option>
                                        <option value="2">$ CAD</option>
                                        <option value="3">₹ INR</option>
                                        <option value="4">¥ CNY</option>
                                        <option value="5">৳ BDT</option>
                                    </select>
                                </div>
                            </li>
                            <li>
                                <div class="select-position">
                                    <select id="select5">
                                        <option value="0" selected>English</option>
                                        <option value="1">Español</option>
                                        <option value="2">Filipino</option>
                                        <option value="3">Français</option>
                                        <option value="4">العربية</option>
                                        <option value="5">हिन्दी</option>
                                        <option value="6">বাংলা</option>
                                    </select>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-12">
                    <div class="top-middle">
                        <ul class="useful-links">
                            <li><a href="index.html">Home</a></li>
                            <li><a href="about-us.html">About Us</a></li>
                            <li><a href="contact.html">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-12">
                    <div class="top-end">
                        @if(Session::get('customer_name'))
                        <div class="user">
                           <img src="{{asset(Session::get('customer_image'))}}" style="width: 40px;height: 40px;border-radius: 50px">
                            Hello {{session('customer_name')}}
                            <ul class="user-login">
                                <li>
                                    <a href="{{route('customer.index')}}">Dashboard</a>
                                </li>
                                <li>
                                    <a href="{{route('customer.logout')}}">Logout</a>
                                </li>
                            </ul>
                        </div>
                        @else
                        <ul class="user-login">
                            <li>
                                <a href="{{route('customer.login')}}">Sign In</a>
                            </li>
                            <li>
                                <a href="{{route('customer.register')}}">Register</a>
                            </li>
                        </ul>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="header-middle">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3 col-md-3 col-7">

                    <a class="navbar-brand" href="{{route('home')}}">
                        <img src="{{asset('website')}}/assets/images/logo/logo.svg" alt="Logo">
                    </a>

                </div>
                <div class="col-lg-5 col-md-7 d-xs-none">

                    <div class="main-menu-search">

                        <div class="navbar-search search-style-5">
                            <div class="search-select">
                                <div class="select-position">
                                    <select id="select1">
                                        <option selected>All</option>
                                        @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="search-input">
                                <input type="text" placeholder="Search">
                            </div>
                            <div class="search-btn">
                                <button><i class="lni lni-search-alt"></i></button>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="col-lg-4 col-md-2 col-5">
                    <div class="middle-right-area">
                        <div class="nav-hotline">
                            <i class="lni lni-phone"></i>
                            <h3>Hotline:
                                <span>(+100) 123 456 7890</span>
                            </h3>
                        </div>
                        <div class="navbar-cart">
                            <div class="wishlist">
                                <a href="javascript:void(0)">
                                    <i class="lni lni-heart"></i>
                                    <span class="total-items">0</span>
                                </a>
                            </div>
                            <div class="cart-items">
                                <a href="javascript:void(0)" class="main-btn">
                                    <i class="lni lni-cart"></i>
                                    <span class="total-items">{{ShoppingCart::countRows()}}</span>
                                </a>

                                <div class="shopping-item">
                                    <div class="dropdown-cart-header">
                                        <span>{{ShoppingCart::countRows()}} Items</span>
                                        <a href="{{route('show.cart')}}">View Cart</a>
                                    </div>
                                   @php
                                     $cartProducts=ShoppingCart::all();
                                   @endphp
                                    <ul class="shopping-list">
                                        @foreach($cartProducts as $cartProduct)
                                        <li>
                                            <a href="{{route('product.cart.remove',['id'=>$cartProduct->rawId()])}}" onclick="function1()" class="remove" title="Remove this item"><i class="lni lni-close"></i></a>
                                            <script>
                                                function function1(){
                                                        swal('Congrats! Product Deleted Successfully');
                                                }
                                            </script>
                                            <div class="cart-img-head">
                                                <a class="cart-img"><img src="{{asset($cartProduct->image)}}" alt="#"></a>
                                            </div>
                                            <div class="content">
                                                <h4><a href="#">
                                                    {{$cartProduct->name}}</a></h4>
                                                <p class="quantity"> {{$cartProduct->qty}} x - <span class="amount">{{$cartProduct->price}}</span></p>
                                            </div>
                                        </li>
                                        @endforeach
                                    </ul>
                                    <div class="bottom">
                                        <div class="total">
                                            <span>Total</span>
                                            <span class="total-amount">{{ShoppingCart::total()}}</span>
                                        </div>
                                        <div class="button">
                                            <a href="{{route('checkout')}}" class="btn animate">Checkout</a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 col-md-6 col-12">
                <div class="nav-inner">
                    <div class="mega-category-menu">
                        <span class="cat-button"><i class="lni lni-menu"></i>All Categories</span>
                        <ul class="sub-category">
                            @foreach($categories as $category)
                            <li><a href="{{route('product.by.category',['id'=>$category->id])}}">{{$category->name}}<i class="lni lni-chevron-right"></i></a>

                                   @if(count($category->subcategories) > 0)
                                <ul class="inner-sub-category">
                                    @foreach($category->subcategories as $subcategory)
                                            <li><a href="{{route('product.by.subcategory',['id'=>$subcategory->id])}}">{{$subcategory->name}}</a></li>
                                    @endforeach
                                </ul>
                                @endif
                            </li>
                            @endforeach
                        </ul>
                    </div>

                    <nav class="navbar navbar-expand-lg">
                        <button class="navbar-toggler mobile-menu-btn" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                            <ul id="nav" class="navbar-nav ms-auto">
                                <li class="nav-item">
                                    <a href="index.html" class="active" aria-label="Toggle navigation">Home</a>
                                </li>
                                @foreach($categorieslimit as $category)
                                <li class="nav-item">
                                    <a href="{{route('product.by.category',['id'=>$category->id])}}">{{$category->name}}</a>
                                    <ul class="sub-menu collapse" id="submenu-1-2">
                                        @foreach($category->subcategories as $subcategory)
                                            <li><a href="{{route('product.by.subcategory',['id'=>$subcategory->id])}}">{{$subcategory->name}}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                                @endforeach
                                <li class="nav-item">
                                    <a href="index.html" aria-label="Toggle navigation">About Us</a>
                                </li>
                            </ul>
                        </div>
                    </nav>

                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12">

                <div class="nav-social">
                    <h5 class="title">Follow Us:</h5>
                    <ul>
                        <li>
                            <a href="javascript:void(0)"><i class="lni lni-facebook-filled"></i></a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"><i class="lni lni-twitter-original"></i></a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"><i class="lni lni-instagram"></i></a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"><i class="lni lni-skype"></i></a>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </div>

</header>
