<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
     protected $table = 'order';
     protected $primaryKey = 'id';
     protected $guarded = [];
      public function products()
     {
     	return $this->belongsTo(products::class,'product_id');
     }
}
