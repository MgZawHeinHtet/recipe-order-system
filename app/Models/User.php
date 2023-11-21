<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Cart;
use App\Models\Subscriber;
use App\Models\Notification;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'is_admin'
    ];

    protected $guarded = [
        'id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($user) {
            $user->username = Str::replace(' ','-',$user->name) ;
            $user->img = asset('assets/nav_logo.png');
            $user->gender = 'none';
            $user->dob = '?/?/?';
           
        });
    }

    public function ratedProducts()
    {
        return $this->belongsToMany(Product::class);
    }

    public function userRatingOnProduct($id)
    {
        return $this->ratedProducts()->withPivot('rate')->where('product_id', $id)->first()?->pivot->rate;
    }

    public function isRating($product)
    {
        return $this->ratedProducts->contains('id', $product->id);
    }

    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

    public function reviews(){
        return $this->hasMany(Review::class);
    }
    
    public function subscriber(){
        return $this->belongsTo(Subscriber::class);
    }

    public function notifications(){
        return $this->hasMany(Notification::class);
    }

    public function unreadNoti(){
        return $this->notifications()->where('is_read',false);
    }

}
