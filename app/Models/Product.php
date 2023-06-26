<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['cat_id', 'subcat_id', 'brand_id', 'unit_id', 'name', 'code', 'model', 'stock_amount', 'regular_price', 'selling_price',
        'short_description', 'long_description', 'feature_image', 'hit_count', 'sales_count', 'featured_status', 'product_status'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'cat_id');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class, 'unit_id');
    }

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class, 'subcat_id');
    }
    public function otherImages()
    {
        return $this->hasMany(OtherImage::class,'product_id');
    }


    public static function storeOrUpdateProduct($request, $id = null)
    {
        if ($id) {
            $product = Product::find($id);
            if ($request->hasFile('product_feature_image')) {
                if (file_exists($product->feature_image)) {
                    unlink($product->feature_image);
                }
            }
        }
        $newProduct = Product::updateOrCreate(['id' => $id], [
            'cat_id' => $request->cat_id,
            'subcat_id' => $request->subcat_id,
            'brand_id' => $request->brand_id,
            'unit_id' => $request->unit_id,
            'name' => $request->product_name,
            'code' => $request->product_code,
            'model' => $request->product_model,
            'stock_amount' => $request->product_stock_ammount,
            'regular_price' => $request->product_regular_price,
            'selling_price' => $request->product_selling_price,
            'short_description' => $request->p_short_description,
            'long_description' => $request->p_long_description,
            'product_status' => $request->product_status,
            'feature_image' => $request->hasfile('product_feature_image') ? self::imageUrl($request) : $product->feature_image,
        ]);

        return !$id ? $newProduct->id  : '';
    }

    public static function imageUrl($request)
    {
        $file = $request->file('product_feature_image');
        $imageOriginalExtention = $file->getClientOriginalExtension();
        $imageName = rand(0, 5000) . '.' . time() . '.' . $imageOriginalExtention;
        $directory = "admin/assests/image/product/feature-image/";
        $file->move($directory, $imageName);
        $imagePath = $directory . $imageName;
        return $imagePath;
    }

    public static function updateStatus($id)
    {
        $product = Product::find($id);
        if ($product->product_status == 1) {
            $product->update([
                'product_status' => 0,
            ]);
        } else {
            $product->update([
                'product_status' => 1,
            ]);
        }
    }
}
