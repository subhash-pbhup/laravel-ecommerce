<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;

    // Define the table if it's different from the plural of the model name
    protected $table = 'categories';

    // Define fillable fields for mass assignment
    protected $fillable = [
        'id',
        'name',
        'description',
        'status'
    ];
}
