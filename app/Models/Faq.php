<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    protected $fillable = [
        'question_en',
        'question_ne',
        'answer_en',
        'answer_ne',
        'category',
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

    public function getQuestionAttribute()
    {
        return app()->getLocale() === 'ne' ? $this->question_ne : $this->question_en;
    }

    public function getAnswerAttribute()
    {
        return app()->getLocale() === 'ne' ? $this->answer_ne : $this->answer_en;
    }
}
