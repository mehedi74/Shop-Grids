<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OtherImage extends Model
{
    use HasFactory;

    public static function createOrUpdateOtherImage($images, $ProductId)
    {
        if ($images) {
            //while update if existing images occurs...delete/unlink from here...
            if ($oldOhterImages = OtherImage::where('product_id', $ProductId)->get()) {
                foreach ($oldOhterImages as $otherImage) {
                    $otherImage->delete();
                    if (file_exists($otherImage->other_image)) {
                        unlink($otherImage->other_image);
                    }
                }
            }
            //create new other Images...
            foreach ($images as $image) {
                $otherImage = new OtherImage();
                $otherImage->product_id = $ProductId;
                $otherImage->other_image = self::imageUrl($image);
                $otherImage->save();
            }
            //while updating if file has no images...
        } else {
            $oldOhterImages = OtherImage::where('product_id', $ProductId)->get();
            foreach ($oldOhterImages as $otherImage) {
                $oldimg = $otherImage->other_image;
                $otherImage->product_id = $ProductId;
                $otherImage->other_image = $oldimg;
                $otherImage->save();
            }
        }
    }

    public static function imageUrl($otherImage)
    {
        $file = $otherImage;
        $imageOriginalExtention = $file->getClientOriginalExtension();
        $imageName = rand(0, 5000) . '.' . time() . '.' . $imageOriginalExtention;
        $directory = "admin/assests/image/product/other-image/";
        $file->move($directory, $imageName);
        $imagePath = $directory . $imageName;
        return $imagePath;
    }
}
