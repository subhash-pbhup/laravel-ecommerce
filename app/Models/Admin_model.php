<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin_model extends Model
{
    use HasFactory;

    // Define the table if it's different from the plural of the model name
    protected $table = 'admin';

    // Define fillable fields for mass assignment
    protected $fillable = [
        'id',
        'name',
        'mobile',
        'address',
        'password',
        'status',
        'store_name',
    ];
}
