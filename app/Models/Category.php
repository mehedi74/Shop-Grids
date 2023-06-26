<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'status', 'description', 'image'];

    public function subcategories(){
        return $this->hasMany(SubCategory::class,'cat_id');
    }


    public static function imageUrl($req)
    {
        if ($req->hasfile('category_image')) {
            $file = $req->file('category_image');
            $imageOrginalName = $file->getClientOriginalName();
            $directory = "admin/assests/image/view_by_module/";
            $file->move($directory, $imageOrginalName);
            return $directory . $imageOrginalName;
        }
    }

    public static function updateOrStoreCategory($req, $id = null)
    {
        if ($id) {
            $category = Category::find($id);
            if($req->hasFile('category_image')){
                if (file_exists($category->image)) {
                    unlink($category->image);
                }
            }
        }
        Category::updateOrCreate(['id' => $id], [
            'name' => $req->category_name,
            'description' => $req->category_description,
            'status' => $req->category_status,
            'image' => $req->hasFile('category_image') ? self::imageUrl($req) : $category->image,
        ]);
    }

    public static function updateStatus($id)
    {
        $data = Category::find($id);
        if ($data->status == 1) {
            $data->update(['status' => 0]);
        } else {
            $data->update(['status' => 1]);
        }
        $data->save();
    }

    public static function deleteCategory($id)
    {
        $data = Category::find($id);
        if (file_exists($data->image)) {
            unlink($data->image);
        }
        $data->delete();
    }
}


