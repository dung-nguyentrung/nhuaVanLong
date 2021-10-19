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
        'description_vi',
        'description_en',
        'description_jp',
        'email',
        'phone',
        'fax',
        'address_vi',
        'address_en',
        'address_jp',
        'open_time',
    ];

    protected $dates = [
        'created_at', 'updated_at'
    ];
}
