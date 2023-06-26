<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{

    public function index()
    {
        return view('admin.brand.index', ['brands' => Brand::all()]);
    }
    public function create()
    {
       return view('admin.brand.create');
    }

    public function store(Request $request)
    {
       Brand::updateOrStoreBrand($request);
       return back()->with('msg','Brands Added Successfully');
    }

    public function edit(string $id)
    {
        return view('admin.brand.edit',['brand'=>Brand::find($id)]);
    }

    public function update(Request $request, string $id)
    {
        Brand::updateOrStoreBrand($request,$id);
        return back()->with('msg','Brand  Updated Successfully');
    }

    public function destroy(string $id)
    {
        $brand = Brand::find($id);
        $brand->delete();
        return back()->with('msg','Brand Deleted Successfully');
    }
    public function updateStatus(string $id)
    {
       Brand::updateStatus($id);
       return back()->with('msg','Brand Status Updated Successfully');
    }
}
