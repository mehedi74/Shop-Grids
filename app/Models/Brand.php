<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'image', 'status', 'description'];

    public static function imageUrl($req)
    {
        $file = $req->file('brand_image');
        $imageOriginalName = $file->getClientOriginalName();
        $directory = 'admin/assests/image/brand/';
        $file->move($directory, $imageOriginalName);
        return $directory . $imageOriginalName;
    }

    public static function updateOrStoreBrand($req, $id = null)
    {
        if ($id) {
            $brand = Brand::find($id);
            if ($req->hasFile('brand_image')) {
                if (file_exists($brand->image)) {
                    unlink($brand->image);
                }
            }
        }
        Brand::updateOrCreate(['id' => $id], [
            'name' => $req->brand_name,
            'description' => $req->brand_description,
            'status' => $req->brand_status,
            'image' => $req->hasFile('brand_image') ? self::imageUrl($req) : $brand->image,
        ]);

    }

    static function updateStatus($id)
    {
        $brand = Brand::find($id);
        if ($brand->status == 1) {
            $brand->update([
                'status' => 0,
            ]);
        } else {
            $brand->update([
                'status' => 1,
            ]);
        }
    }

}
