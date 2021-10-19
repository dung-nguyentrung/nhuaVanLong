<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Str;

class Tag extends Model
{
    use HasFactory;

    protected $table = 'tags';

    protected $fillable = [
        'name_vi', 'name_en', 'name_jp',
        'slug',
        'created_at', 'updated_at'
    ];

    protected $dates = [
        'created_at', 'updated_at'
    ];

    /**
     * The posts that belong to the Tag
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function posts(): BelongsToMany
    {
        return $this->belongsToMany(Post::class);
    }

    public function setNameViAttribute($name) {
        $this->attributes['name_vi'] = $name;
        $this->attributes['slug'] = Str::slug($name);
    }
}
