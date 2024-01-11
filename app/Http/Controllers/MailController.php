<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactFormRequest;
use App\Mail\ContactMail;
use App\Mail\CouponMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Models\Coupons;
use App\Models\Notification;

class MailController extends Controller
{
    public function contact(ContactFormRequest $request)
    {   
        $cleanData = $request->validated();
        
        $name = $cleanData['name'];
        $email = $cleanData['email'];
        $description = $cleanData['message'];
      
        Mail::to('zawheinhtet1223@gmail.com')->send(new ContactMail($cleanData));
        return back();
    }

    public function generateToken()
    {
        return md5(rand(1, 10) . microtime());
    }

    public function sendCoupon(User $user)
    {
        $coupon_code = 'NatureCoupon-' . $this->generateToken();

        $discount = rand(10,20);

        Coupons::create([
            'coupon_code'=>$coupon_code,
            'discount'=> $discount,
            'valid' => 1
        ]);

        Notification::create([
            'user_id' => $user->id,
            'noti_type' => 'recive-coupon',
            'is_read' => false,
            'recipent_id' => 1
        ]);

        Mail::to($user->email)->send(new CouponMail($user->name,$coupon_code,$discount));

        return back();
    }
}
