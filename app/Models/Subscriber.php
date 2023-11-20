<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use NunoMaduro\Collision\Adapters\Phpunit\Subscribers\Subscriber as SubscribersSubscriber;

class subscriber extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function user(){
        return $this->belongsTo(User::class);
    }


    public function scopeSendNotification($_,$type){
       
        $subscribers = $this->all();
      
        foreach($subscribers as $subscriber){
         
            Notification::create([
                'user_id' => $subscriber->user_id,
                'noti_type' => $type,
                'recipent_id'=>auth()->user()->id
            ]);
        }
    }
}
