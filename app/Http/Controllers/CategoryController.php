<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        return view('admin.category.index', ['categories' => Category::all()]);
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        Category::updateOrStoreCategory($request);
        return redirect('/categories')->with('msg', 'Category Added Successfully');
    }

    public function edit(string $id)
    {
        $category = Category::find($id);
        return view('admin.category.edit', compact('category'));
    }

    public function update(Request $request, string $id)
    {
        Category::updateOrStoreCategory($request, $id);
        return redirect('/categories')->with('msg', 'Category Updated Successfully');
    }


    public function destroy(string $id)
    {
        Category::deleteCategory($id);
        return back()->with('msg', 'Category deleted successfully');
    }

    public function updateStatus(string $id)
    {
        Category::updateStatus($id);
        return back()->with('msg', 'Category status updated successfully');
    }

}
