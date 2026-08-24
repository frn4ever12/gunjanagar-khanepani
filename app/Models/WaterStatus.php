<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WaterStatus extends Model
{
    protected $fillable = [
        'status',
        'affected_area',
        'expected_restoration',
        'remarks_en',
        'remarks_ne',
    ];

    protected $casts = [
        'expected_restoration' => 'datetime',
    ];

    public function getRemarksAttribute()
    {
        return app()->getLocale() === 'ne' ? $this->remarks_ne : $this->remarks_en;
    }

    public function getStatusLabelAttribute()
    {
        return match($this->status) {
            'normal' => __('messages.normal'),
            'low_pressure' => __('messages.low_pressure'),
            'maintenance' => __('messages.maintenance'),
            'temporarily_suspended' => __('messages.temporarily_suspended'),
            default => $this->status,
        };
    }
}
