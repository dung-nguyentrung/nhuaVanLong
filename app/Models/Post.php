<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Wildside\Userstamps\Userstamps;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Post extends Model implements HasMedia
{
    use HasFactory, SoftDeletes, InteractsWithMedia, Userstamps;

    const ACTIVE = 1;
    const IS_ACTIVE = 0;

    protected $table = 'posts';    

    protected $fillable = [
        'post_category_id',
        'name_vi', 'name_en', 'name_jp',
        'slug', 'view', 'status',
        'short_description_vi', 'short_description_en', 'short_description_jp',
        'description_vi', 'description_en', 'description_jp',
        'created_at', 'updated_at', 'deleted_at'
    ];

    protected $dates = [
        'created_at', 'updated_at', 'deleted_at'
    ];

    public function setNameViAttribute($name) {
        $this->attributes['name_vi'] = $name;
        $this->attributes['slug'] = Str::slug($name);
    }

    public function scopeSearchByName($query, $keyword) {
        return $query->where('name_vi', 'LIKE', '%'.$keyword.'%')
                ->orWhere('name_en', 'LIKE', '%'.$keyword.'%')
                ->orWhere('name_jp', 'LIKE', '%'.$keyword.'%');
    }

    public function scopeSortByCategory($query, $category) {
        return $query->where('post_category_id', $category);
    }

    public function scopeGetRandomPost($query) {
        return $query->inRandomOrder()->limit(3);
    }

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::addGlobalScope('status', function (Builder $builder) {
            $builder->where('status', static::ACTIVE);
        });
    }

    /**
     * Get the postCategory that owns the Post
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function postCategory(): BelongsTo
    {
        return $this->belongsTo(PostCategory::class, 'post_category_id');
    }

    /**
     * The tags that belong to the Post
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

    public function handleUploadFile($image) {
        if (!is_null($image)) {
            $this->addMedia($image)
                ->usingFileName($this->slug)
                ->toMediaCollection('posts');
        }
    }

    public function handleUpdateFile($image) {
        if (!is_null($image)) {
            if ($this->getFirstMedia('posts')) {
                $this->getFirstMedia('posts')->delete();
            }
            $this->addMedia($image)
                ->usingFileName($this->slug)
                ->toMediaCollection('posts');            
        }
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width(400)
            ->height(240);
    }
}
