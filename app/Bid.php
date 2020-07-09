<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bid extends Model
{
    protected $guarded = [];

    public function User()
    {
        return $this->belongsTo('App\User');
    }

    public function Product()
    {
        return $this->belongsTo('App\Buyer\Product');
    }
    public function Procurement()
    {
        return $this->belongsTo('App\Buyer\Procurement');
    }
}
