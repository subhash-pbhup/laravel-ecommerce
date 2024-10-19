<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['user_id',
        'subtotal',
        'payment_method',
        'tax',
        'shipping_cost',
        'total_price',
        'shipping_address',
        'order_items',
        'order_number',
    ];

}
