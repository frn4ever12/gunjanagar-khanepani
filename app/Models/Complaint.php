<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    protected $fillable = [
        'reference_number',
        'full_name',
        'mobile',
        'email',
        'ward',
        'address',
        'category',
        'subject',
        'description',
        'attachment',
        'status',
        'admin_remarks',
        'assigned_to',
    ];

    public function assignedUser()
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }

    public function getStatusLabelAttribute()
    {
        return match($this->status) {
            'submitted' => __('messages.submitted'),
            'under_review' => __('messages.under_review'),
            'assigned' => __('messages.assigned'),
            'in_progress' => __('messages.in_progress'),
            'resolved' => __('messages.resolved'),
            'closed' => __('messages.closed'),
            default => $this->status,
        };
    }

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            if (empty($model->reference_number)) {
                $year = date('Y');
                $last = static::whereYear('created_at', $year)->orderBy('id', 'desc')->first();
                $sequence = $last ? (int)substr($last->reference_number, -6) + 1 : 1;
                $model->reference_number = 'KWS-' . $year . '-' . str_pad($sequence, 6, '0', STR_PAD_LEFT);
            }
        });
    }
}
