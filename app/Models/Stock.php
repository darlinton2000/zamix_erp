<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_id', 'amount_entry', 'amount_exit', 'cost_price', 'sule_price', 'date_entry', 'date_exit'
    ];

    public function product() {
        return $this->belongsTo(Product::class);
    }
}
