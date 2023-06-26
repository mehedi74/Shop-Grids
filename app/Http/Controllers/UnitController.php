<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Unit;

class UnitController extends Controller
{

    public function index()
    {
        return view('admin.unit.index', ['units' => Unit::all()]);
    }
    public function create()
    {
        return view('admin.unit.create');
    }

    public function store(Request $request)
    {
        Unit::updateOrStoreUnit($request);
        return back()->with('msg','Units Added Successfully');
    }

    public function edit(string $id)
    {
        return view('admin.unit.edit',['unit'=>Unit::find($id)]);
    }

    public function update(Request $request, string $id)
    {
        Unit::updateOrStoreUnit($request,$id);
        return back()->with('msg','Unit  Updated Successfully');
    }

    public function destroy(string $id)
    {
        $unit = Unit::find($id);
        $unit->delete();
        return back()->with('msg','Unit Deleted Successfully');
    }
    public function updateStatus(string $id)
    {
        Unit::updateStatus($id);
        return back()->with('msg','Unit Status Updated Successfully');
    }
}
