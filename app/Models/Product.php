<?php

namespace App\Models;

use App\Casts\MoneyCast;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Wildside\Userstamps\Userstamps;

class Product extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, Userstamps, SoftDeletes;

    protected $table = 'products';

    protected $fillable = [
        'category_id',
        'name_vi', 'name_en','name_jp',
        'slug', 'weight', 'color',
        'capacity', 'cycle', 'quantity', 'price',
        'image', 'drawing',
        'short_description_vi', 'short_description_en', 'short_description_jp',
        'description_vi', 'description_en', 'description_jp',
        'created_by', 'updated_by', 'deleted_by',
        'created_at', 'updated_at', 'deleted_at'
    ];

    protected $dates = [
        'created_at', 'updated_at', 'deleted_at'
    ];

    protected $casts = [
        // 'price' => MoneyCast::class,
    ];

    public function scopeSearchProduct($query, $keyword, $category) {
        return $query->when($category, function($query) use ($category) {
            return $query->where('category_id', $category);
        })->where('name_vi', 'LIKE', '%'.$keyword.'%')
        ->orWhere('name_en', 'LIKE', '%'.$keyword.'%')
        ->orWhere('name_jp', 'LIKE', '%'.$keyword.'%');
    }

    public function scopeSortByCategory($query, $category) {
        return $query->where('category_id', $category);
    }

    public function scopeGetProductByCategory($query, $category) {
        return $query->where('category_id', $category)->inRandomOrder()->limit(3);
    }

    public function scopeGetRandomProduct($query) {
        return $query->inRandomOrder()->limit(3);
    }

    public function setNameViAttribute($name) {
        $this->attributes['name_vi'] = $name;
        $this->attributes['slug'] = Str::slug($name);
    }

    /**
     * Get the category that owns the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function handleUploadFile($image, $drawing) {
        if (!is_null($image)) {
            $this->addMedia($image)
                ->usingFileName($this->slug)
                ->toMediaCollection('products');
        }

        if (!is_null($drawing)) {
            $this->addMedia($drawing)
                ->usingFileName($this->slug)
                ->toMediaCollection('product_drawing');
        }
    }

    public function handleUpdateFile($image, $drawing) {
        if (!is_null($image)) {
            if ($this->getFirstMedia('products')) {
                $this->getFirstMedia('products')->delete();
            }
            $this->addMedia($image)
                ->usingFileName($this->slug)
                ->toMediaCollection('products');
        }

        if (!is_null($drawing)) {
            if($this->getFirstMedia('product_drawing')) {
                $this->getFirstMedia('product_drawing')->delete();
            }
            $this->addMedia($drawing)
                ->usingFileName($this->slug)
                ->toMediaCollection('product_drawing');
        }
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width(400)
            ->height(240);
    }
}
