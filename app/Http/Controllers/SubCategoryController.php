<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{

    public function index()
    {
        return view('admin.sub-category.index',['subCategories'=> SubCategory::all()]);
    }

    public function create()
    {
        return view('admin.sub-category.create', ['categories'=>Category::all()]);
    }

    public function store(Request $request)
    {
        SubCategory::storeOrUpdateSubCategory($request);
        return redirect('/subcategories')->with('msg', 'Sub Category added successfully');
    }

    public function edit(string $id)
    {
        $subcategory=SubCategory::find($id);
        $categories=Category::all();
        return view('admin.sub-category.edit',compact('categories','subcategory'));
    }

    public function update(Request $request, string $id)
    {
        SubCategory::storeOrUpdateSubCategory($request,$id);
        return redirect('/subcategories')->with('msg','Updated successfully');
    }

    public function destroy(string $id)
    {
        $data = SubCategory::find($id);
        $data->delete();
        return back()->with('msg', 'Subcategory deleted Successfully');
    }

    public function updateStatus($id)
    {
        SubCategory::updateStatus($id);
        return back()->with('msg', 'Subcategory deleted Successfully');
    }
}
