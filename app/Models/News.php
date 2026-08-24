<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = [
        'title_en',
        'title_ne',
        'content_en',
        'content_ne',
        'image',
        'category',
        'publish_date',
        'featured',
        'status',
        'show_in_ticker',
        'display_order',
    ];

    protected $casts = [
        'publish_date' => 'date',
        'featured' => 'boolean',
        'show_in_ticker' => 'boolean',
    ];

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function scopeFeatured($query)
    {
        return $query->where('featured', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('publish_date', 'desc')->orderBy('id', 'desc');
    }

    public function getTitleAttribute()
    {
        return app()->getLocale() === 'ne' ? $this->title_ne : $this->title_en;
    }

    public function getContentAttribute()
    {
        return app()->getLocale() === 'ne' ? $this->content_ne : $this->content_en;
    }
}
