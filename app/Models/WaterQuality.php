<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WaterQuality extends Model
{
    protected $fillable = [
        'parameter',
        'standard',
        'result',
        'status',
        'testing_date',
        'remarks_en',
        'remarks_ne',
    ];

    protected $casts = [
        'testing_date' => 'date',
    ];

    public function getRemarksAttribute()
    {
        return app()->getLocale() === 'ne' ? $this->remarks_ne : $this->remarks_en;
    }
}
