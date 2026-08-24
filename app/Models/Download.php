<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Download extends Model
{
    protected $fillable = [
        'title_en',
        'title_ne',
        'description_en',
        'description_ne',
        'category',
        'file',
        'file_type',
        'file_size',
        'publish_date',
        'sort_order',
        'status',
    ];

    protected $casts = [
        'publish_date' => 'date',
    ];

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('publish_date', 'desc');
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
