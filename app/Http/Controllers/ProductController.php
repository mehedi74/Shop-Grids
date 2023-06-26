<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\OtherImage;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\Unit;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getSubCategory()
    {
        return response()->json(SubCategory::where('cat_id', $_GET['id'])->get());
    }

    public function updateStatus(string $id)
    {
        Product::updateStatus($id);
        return back()->with('msg', 'Status updated Successfully');
    }

    public function index()
    {
        return view('admin.product.index', ['products' => Product::all()]);
    }

    public function create()
    {
        return view('admin.product.create', [
            'categories' => Category::all(),
            'subCategories' => SubCategory::all(),
            'brands' => Brand::all(),
            'units' => Unit::all()
        ]);
    }

    public function store(Request $request)
    {
        //form validation will be added here...
        $newProductId = Product::storeOrUpdateProduct($request);
        OtherImage::createOrUpdateOtherImage($request->product_other_image, $newProductId);
        return back()->with('msg', 'Congrats! Product Uploaded Successfully');
    }

    public function show(string $id)
    {
        return view('admin.product.show-details', ['product' => Product::find($id), 'otherImages' => OtherImage::where('product_id', $id)->get()]);
    }

    public function edit(string $id)
    {
        return view('admin.product.edit', [
            'product' => Product::find($id),
            'categories' => Category::all(),
            'subCategories' => SubCategory::all(),
            'brands' => Brand::all(),
            'units' => Unit::all(),
        ]);
    }

    public function update(Request $request, string $id)
    {
        Product::storeOrUpdateProduct($request, $id);
        OtherImage::createOrUpdateOtherImage($request->product_other_image, $id);
        return back()->with('msg', 'Congrats! Product Updated Successfully');
    }

    public function destroy(string $id)
    {
        $product = Product::find($id);

        //delete feature image....
        if (file_exists($product->feature_image)) {
            unlink($product->feature_image);
        }
        // //delete other images...
        foreach ($product->otherImages as $otherImage) {
            $otherImage->delete();
            if (file_exists($otherImage->other_image)) {
                unlink($otherImage->other_image);
            }
        }
        $product->delete();
        return back()->with('msg', 'Product deleted successfully');
    }
}
