<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'cat_id', 'image', 'description', 'status','name'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'cat_id');
    }

    static function storeOrUpdateSubCategory($req, $id = null)
    {
        SubCategory::updateOrCreate(['id' => $id], [
            'cat_id' => $req->cat_id,
            'name' => $req->subcategory_name,
            'description' => $req->subcategory_description,
            'status' => $req->subcategory_status,
        ]);
    }

    static function updateStatus($id)
    {
        $subCategory = SubCategory::find($id);
        if ($subCategory->status == 1) {
            $subCategory->update(['status' => 0]);
        } else {
            $subCategory->update(['status' => 1]);
        }
    }
}
