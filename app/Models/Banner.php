<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $fillable = [
        'title_en',
        'title_ne',
        'description_en',
        'description_ne',
        'image',
        'sort_order',
        'status',
    ];

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('id');
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
