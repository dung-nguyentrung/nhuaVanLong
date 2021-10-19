<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Wildside\Userstamps\Userstamps;

class Order extends Model
{
    use HasFactory, SoftDeletes, Userstamps;

    protected $table = 'orders';

    protected $fillable = [
        'name',
        'phone',
        'address',
        'ward',
        'subtotal',
        'tax',
        'shipping',
        'total',
    ];

    protected $dates = [
        'created_at', 'updated_at', 'deleted_at'
    ];
    
}
