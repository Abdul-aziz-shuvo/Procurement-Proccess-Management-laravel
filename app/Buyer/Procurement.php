<?php

namespace App\Buyer;

use Illuminate\Database\Eloquent\Model;

class Procurement extends Model
{
    public function Suppliers()
    {
        return $this->belongsToMany('App\User')->withPivot('product_id', 'bided', 'is_approved')->withTimestamps();
    }
    public function Product()
    {
        return $this->belongsTo('App\Buyer\Product');
    }

    public function Bids()
    {
        return $this->hasMany('App\Bids');
    }

    protected $guarded = [];
}
