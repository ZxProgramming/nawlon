<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
            'category',
            'image',
            'user_id',
    ];


      function cars(){
     return  $this->hasMany(Car::class);

      }
}
