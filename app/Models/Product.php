<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'cost_price', 'sule_price', 'amount',
    ];

    public function requisitions(){
        return $this->hasMany(Requisition::class);
    }

    public function stocks(){
        return $this->hasMany(Stock::class);
    }

    public function compositeProducts(){
        return $this->hasMany(CompositeProduct::class);
    }
}
