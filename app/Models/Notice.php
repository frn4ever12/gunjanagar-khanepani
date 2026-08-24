<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    protected $fillable = [
        'title_en',
        'title_ne',
        'description_en',
        'description_ne',
        'category',
        'publish_date',
        'expiry_date',
        'attachment',
        'featured',
        'status',
        'show_in_ticker',
        'display_order',
    ];

    protected $casts = [
        'publish_date' => 'date',
        'expiry_date' => 'date',
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

    public function scopeCurrent($query)
    {
        return $query->where('publish_date', '<=', now())
            ->where(function ($q) {
                $q->whereNull('expiry_date')->orWhere('expiry_date', '>=', now());
            });
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('publish_date', 'desc')->orderBy('id', 'desc');
    }

    public function getTitleAttribute()
    {
        return app()->getLocale() === 'ne' ? $this->title_ne : $this->title_en;
    }

    public function getDescriptionAttribute()
    {
        return app()->getLocale() === 'ne' ? $this->description_ne : $this->description_en;
    }
}
