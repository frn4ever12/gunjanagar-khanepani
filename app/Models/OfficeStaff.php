<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OfficeStaff extends Model
{
    protected $fillable = [
        'name',
        'designation',
        'department',
        'description',
        'email',
        'phone',
        'mobile',
        'image',
        'bio',
        'display_order',
        'status',
    ];

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('display_order', 'asc')->orderBy('id', 'asc');
    }
}
