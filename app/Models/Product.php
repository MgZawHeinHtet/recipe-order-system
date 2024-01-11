<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\File;

class Product extends Model
{
    
    use HasFactory,SoftDeletes;

    public static function boot(){
        parent::boot();
        static::deleted(function($item) { 
            // if(File::exists($file = public_path($item->photo)) ){
            //     File::delete($file);
            // }
            CartItem::where('product_id',$item->id)->delete();
        });
    }

    protected $fillable = [
        'title',
        'description',
        'photo',
        'price',
        'category_id',
        'country_id',
        'ingredients',
        'stock',
        'is_publish'
    ];
      
    private $ratingCount ;

    public function category(){
        return $this->belongsTo(Category::class)->withTrashed();
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

    public function totalPrice($q){
        return $this->price * $q;
    }

    public function cart_items(){
        return $this->hasMany(CartItem::class);
    }

    public function getProductFromCart(){
        return $this->cart_items()->where('cart_id',auth()->user()->cart->id)->first();
    }

    public function country(){
        return $this->belongsTo(Country::class)->withTrashed();
    }

    public function scopeFilter($query,$requests){


        if($type = $requests['type']?? null){
            $query->where('title','LIKE','%'.$type.'%');
        }

        if($country = $requests['country']?? null){
            $query->where('country_id',$country);
        }

        
        if($category = $requests['category']?? null){
            $query->where('category_id',$category);
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

}
