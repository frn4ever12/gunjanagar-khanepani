<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{
    protected $fillable = [
        'title_en',
        'title_ne',
        'description_en',
        'description_ne',
        'history_en',
        'history_ne',
        'mission_en',
        'mission_ne',
        'vision_en',
        'vision_ne',
        'image',
    ];

    public function getTitleAttribute()
    {
        return app()->getLocale() === 'ne' ? $this->title_ne : $this->title_en;
    }

    public function getDescriptionAttribute()
    {
        return app()->getLocale() === 'ne' ? $this->description_ne : $this->description_en;
    }

    public function getHistoryAttribute()
    {
        return app()->getLocale() === 'ne' ? $this->history_ne : $this->history_en;
    }

    public function getMissionAttribute()
    {
        return app()->getLocale() === 'ne' ? $this->mission_ne : $this->mission_en;
    }

    public function getVisionAttribute()
    {
        return app()->getLocale() === 'ne' ? $this->vision_ne : $this->vision_en;
    }
}
