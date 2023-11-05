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
    public function category(){
        return $this->belongsTo(Category::class);
    }
}
