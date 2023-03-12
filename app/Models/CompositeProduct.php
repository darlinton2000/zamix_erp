<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CompositeProduct extends Model
{
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'sule_price', 'amount', 'product_id', 'cost_price', 'subtotal'
    ];

    public function product() {
        return $this->belongsTo(Product::class);
    }
}
