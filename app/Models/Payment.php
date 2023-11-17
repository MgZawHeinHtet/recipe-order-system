<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'old_values' => 'json',
        'new_values' => 'json',
    ];

    public function orders(){
        return $this->hasMany(Order::class);
    }
}
