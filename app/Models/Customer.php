<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'mobile', 'password', 'address', 'date_of_birth', 'nid', 'image', 'blood_group'];

    public function order()
    {
        return $this->hasMany(Order::class, 'customer_id');
    }

    //while checkout instant register...
    public static function newCustomer($request)
    {
        $customer = new Customer();
        $customer->name = $request->customer_name;
        $customer->email = $request->customer_email;
        $customer->mobile = $request->customer_mobile;
        $customer->password = bcrypt($request->customer_mobile);
        $customer->save();
        return $customer;
    }


    // register manually by customer...
    public static function registerOrUpdateCustomer($request, $id = null)
    {
        if ($id) {
            $CustomerOld = Customer::find('$id');
            if ($request->has('customer_image')) {
                if (file_exists($CustomerOld->image)) {
                    unlink($CustomerOld->image);
                }
            }
        }

        Customer::updateOrCreate(['id' => $id], [
            'name' => $request->customer_name,
            'email' => $request->customer_email,
            'mobile' => $request->customer_mobile,
            'password' => bcrypt($request->customer_password),
            'address' => $request->customer_address,
            'date_of_birth' => $request->customer_birth,
            'nid' => $request->customer_nid,
            'blood_group' => $request->customer_blood,
            'image' => $request->has('customer_image') ? self::imageuRL($request) : $CustomerOld->image,
        ]);
    }

    public static function imageuRL($request)
    {
        $file = $request->file('customer_image');
        $ImageOriginalExtension = $file->getClientOriginalExtension();
        $imageName = rand(50, 4000040) . '.' . time() . '.' . $ImageOriginalExtension;
        $directory = "website/assets/images/customer/";
        $file->move($directory, $imageName);
        $imagePath = $directory . $imageName;
        return $imagePath;
    }
}
