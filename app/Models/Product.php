<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;


    // Define the table if it's different from the plural of the model name
    protected $table = 'products';

    // Define fillable fields for mass assignment
    protected $fillable = [
        'id',
        'categories_id',
        'name',
        'sku',
        'description',
        'image',
        'multi_image',
        'price',
        'stock'
    ];
}
