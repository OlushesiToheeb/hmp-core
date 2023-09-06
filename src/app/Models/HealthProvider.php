<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HealthProvider extends Model
{
    use HasFactory;
    protected $guarded = [
        'id'
    ];

    protected $casts = [
        'qualifications' => 'array', // Will convarted to (Array)
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
