<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;

    protected $fillable = ['name','status', 'description'];

    public static function updateOrStoreUnit($req, $id = null)
    {
        Unit::updateOrCreate(['id' => $id], [
            'name' => $req->unit_name,
            'description' => $req->unit_description,
            'status' => $req->unit_status,
        ]);

    }

    static function updateStatus($id)
    {
        $unit = Unit::find($id);
        if ($unit->status == 1) {
            $unit->update([
                'status' => 0,
            ]);
        } else {
            $unit->update([
                'status' => 1,
            ]);
        }
    }
}
