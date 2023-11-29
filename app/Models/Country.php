<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Country extends Model
{
    use HasFactory,SoftDeletes;

    protected $guraded = ['id'];

    protected $fillable = ['name','citizen','postal_code'];

    public function products(){
        return $this->hasMany(Product::class);
    }
}
