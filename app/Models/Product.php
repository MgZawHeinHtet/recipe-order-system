<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Product extends Model
{
    
    use HasFactory;

    public static function boot(){
        parent::boot();
        static::deleted(function($item) { 
            if(File::exists($file = public_path($item->photo)) ){
                File::delete($file);
            }
        });
    }

    protected $fillable = [
        'title',
        'description',
        'photo',
        'price',
        'category_id'
    ];
    private $ratingCount ;
    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function ratedUsers(){
        return $this->belongsToMany(User::class);
    }

    public function oldRating()
    {
        return $this->belongsToMany(User::class)->withPivot('rate')->first()->pivot->rate;
    }

    public function addRating($value){
        $this->rating += $value;
        $this->avg_rating = $this->getAvgRating();
    }

    public function reduceRating($value){
        $this->rating-= $value;
        $this->avg_rating = $this->getAvgRating();
    }

    public function reduceAndAddRating($old,$new){
        $this->reduceRating($old);
        $this->addRating($new);
    }
    public function getAvgRating(){
        //plus 1 for count defaut 
        return $this->rating / ($this->ratedUsers->count()+1);
    }

    public function cart_items(){
        return $this->hasMany(CartItem::class);
    }

    public function getProductFromCart(){
        return $this->cart_items()->where('cart_id',auth()->user()->cart->id)->first();
    }
}
