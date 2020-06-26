<?php

namespace App\Buyer;

use Illuminate\Database\Eloquent\Model;

class Procurement extends Model
{
    public function Suppliers(){
        return $this->belongsToMany('App\User')->withPivot('product_id')->withTimestamps();
    }
    public function Product(){
        return $this->belongsTo('App\Buyer\Product');
    }
    protected $guarded = [];
}
