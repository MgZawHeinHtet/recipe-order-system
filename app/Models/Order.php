<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function customer(){
        return $this->belongsTo(Customer::class);
    }

    public function order_items(){
        return $this->hasMany(OrderItems::class);
    }

    public function payment(){
        return $this->belongsTo(Payment::class);
    }

    public function order_status(){
        return $this->belongsTo(OrderStatus::class);
    }

    public function scopeFilter($query,$request){
        if($status_id = $request['status']??null){
            $query->where('order_status_id',$status_id);
        }
    }
}
