<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Category extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $table = 'categories';

    protected $fillable = [
        'name_vi', 
        'name_en', 
        'name_jp', 
        'description_vi', 
        'description_en', 
        'description_jp', 
        'slug',
        'created_at',
        'updated_at',
    ];

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    public function setNameViAttribute($name) {
        $this->attributes['name_vi'] = $name;
        $this->attributes['slug'] = Str::slug($name);
    }

    /**
     * Get all of the products for the Category
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    public function handleUploadFile($image) {
        if (!is_null($image)) {
            $this->addMedia($image)
                ->usingFileName($this->slug)
                ->toMediaCollection('categories');
        }
    }

    public function handleUpdateFile($image) {
        if (!is_null($image)) {
            if ($this->getFirstMedia('categories')) {
                $this->getFirstMedia('categories')->delete();
            }
            $this->addMedia($image)
            ->usingFileName($this->slug)
            ->toMediaCollection('categories');
        }
    }
}
