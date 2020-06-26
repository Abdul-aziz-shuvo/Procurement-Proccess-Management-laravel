<?php

namespace App\Buyer;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function Procurements(){
        return $this->hasMany('App\Buyer\Procurement')->withTimestamps();
    }
    public function Bids(){
        return $this->hasMany('App\Bid');
    }
}
