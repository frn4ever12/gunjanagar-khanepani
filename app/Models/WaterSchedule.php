<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WaterSchedule extends Model
{
    protected $fillable = [
        'area',
        'ward',
        'day',
        'start_time',
        'end_time',
        'status',
        'remarks_en',
        'remarks_ne',
    ];

    protected $casts = [
        'start_time' => 'datetime',
        'end_time' => 'datetime',
    ];

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function getRemarksAttribute()
    {
        return app()->getLocale() === 'ne' ? $this->remarks_ne : $this->remarks_en;
    }
}
