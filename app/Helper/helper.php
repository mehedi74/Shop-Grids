<?php
use App\Models\Product;
function totalProductBySubcatId($id){
    $products=Product::where('subcat_id',$id)->get();
    $total=count($products);
    return $total;
}
function totalProductByBrandId($id){
    $products=Product::where('brand_id',$id)->get();
    $total=count($products);
    return $total;
}
function totalProductByCategoryId($id){
    $products=Product::where('cat_id',$id)->get();
    $total=count($products);
    return $total;
}

function getAllCartProduct(){
   $all= ShoppingCart::all();
   return $all;
}


