<?php


namespace App\Repositories\instructor;

use App\Models\Coupon;

class CouponRepository
{



    public function saveCoupon($data)
    {

        return Coupon::create($data);

    }

    public function updateCoupon($data, $id){

        $coupon = Coupon::find($id);
        $coupon->update($data);
        return $coupon;

    }






}


