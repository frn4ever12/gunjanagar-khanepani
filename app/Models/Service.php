<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'title_en',
        'title_ne',
        'description_en',
        'description_ne',
        'icon',
        'image',
        'required_documents_en',
        'required_documents_ne',
        'process_en',
        'process_ne',
        'fee',
        'processing_time',
        'attachment',
        'sort_order',
        'status',
    ];

    protected $casts = [
        'fee' => 'decimal:2',
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

    public function getRequiredDocumentsAttribute()
    {
        return app()->getLocale() === 'ne' ? $this->required_documents_ne : $this->required_documents_en;
    }

    public function getProcessAttribute()
    {
        return app()->getLocale() === 'ne' ? $this->process_ne : $this->process_en;
    }
}
