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

    public function scopeFilter($query,$requests){
        if($status_id = $requests['status']??null){
            $query->where('order_status_id',$status_id);
        }
        if($track = $requests['input_track']??null){
            $query->where('order_number',$track);
        }
        if($last_day = $requests['last-day']??null){

            $query->where('created_at',$last_day);
        }
        if($seven_day = $requests['7-days']?? null){
            $query->where('created_at',">=",$seven_day);
        }
        if($last_month = $requests['last-month']?? null){
            $query->whereMonth('created_at',$last_month);
        }
        if($last_year = $requests['last-year']?? null){
            $query->whereYear('created_at',$last_year);
        }
    }

    public function scopeUserFilter($query,$request){
        if($request){
            $query->where('order_date',$request);
        }
    }
}
