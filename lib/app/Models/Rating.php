<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\USer;


class Rating extends Model
{
     protected $table = 'rating';
     protected $primaryKey = 'id';
     protected $guarded = [];
     public function user()
     {
     	return $this->belongsTo(User::class,'user_id');
     }
}
