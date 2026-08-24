<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Statistic extends Model
{
    protected $fillable = [
        'key',
        'label_en',
        'label_ne',
        'value',
        'unit',
        'icon',
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

    public function getLabelAttribute()
    {
        return app()->getLocale() === 'ne' ? $this->label_ne : $this->label_en;
    }
}
