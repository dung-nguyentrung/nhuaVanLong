<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class PostCategory extends Model
{
    use HasFactory;

    protected $table = 'post_categories';

    protected $fillable = [
        'name_vi', 'name_en', 'name_jp',
        'slug',
        'created_at', 'updated_at'
    ];

    protected $dates = [
        'created_at', 'updated_at'
    ];

    /**
     * Get all of the posts for the PostCategory
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }

    public function setNameViAttribute($name) {
        $this->attributes['name_vi'] = $name;
        $this->attributes['slug'] = Str::slug($name);
    }
}
