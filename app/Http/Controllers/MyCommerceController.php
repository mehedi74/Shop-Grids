<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use ShoppingCart;
class MyCommerceController extends Controller
{
    public function index()
    {
        return view('website.home.index', [
            'products' => Product::all()->take(8),
        ]);
    }

    public function category($id)
    {
        return view('website.category.index',[
            'products'=>Product::where('cat_id',$id)->get(),
            'subcategories'=>SubCategory::where('cat_id',$id)->get(),
            'brands'=>Brand::all(),
        ]);
    }

    public function subCategory($id)
    {
        return view('website.sub-category.index',['products'=>Product::where('subcat_id',$id)->get()]);
    }

    public function detail($id)
    {
        return view('website.detail.index', ['product' => Product::find($id)]);
    }

    public function addToCart(Request $request,$id)
    {
       $product=Product::find($id);
       ShoppingCart::add($product->id,$product->name,$request->product_qty,$product->selling_price,['image'=>$product->feature_image]);
       return redirect('/show-cart');
    }
    public function deleteFromCart($id)
    {
        ShoppingCart::remove($id);
        return back();
    }
    public function updateCart(Request $request,$id)
    {
        ShoppingCart::update($id,['qty'=>$request->product_qty]);
        return back();
    }
}
