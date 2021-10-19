<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Testimonial extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $table = 'testimonials';

    protected $fillable = [
        'name',
        'mission',
        'testimonial'
    ];

    protected $dates = [
        'created_at', 
        'updated_at'
    ];

    public function handleUploadFile($image) {
        if (!is_null($image)) {
            $this->addMedia($image)->toMediaCollection('testimonials');
        }
    }

    public function handleUpdateFile($image) {
        if (!is_null($image)) {
            if ($this->getFirstMedia('testimonials')) {
                $this->getFirstMedia('testimonials')->delete();
            }
            $this->addMedia($image)->toMediaCollection('testimonials');
        }
    }

    // public function registerMediaConversions(Media $media = null): void
    // {
    //     $this->addMediaConversion('thumb')
    //         ->width(400)
    //         ->height(240);
    // }
}
