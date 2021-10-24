<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Wildside\Userstamps\Userstamps;

class Setting extends Model
{
    use HasFactory;

    protected $table = 'settings';

    protected $fillable = [
        'description',
        'email',
        'phone',
        'fax',
        'address',
        'open_time',
    ];

    protected $dates = [
        'created_at', 'updated_at'
    ];
}
