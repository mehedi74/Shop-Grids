<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use ShoppingCart;

class CartController extends Controller
{
   public function index(){
       return view('website.cart.index',[
           'cartProducts'=>ShoppingCart::all(),
       ]);
   }
}
