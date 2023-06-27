<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'headline',
        'description',
        'start_date',
        'location',
        'duration',
    ];

    protected $casts = [
        'start_date' => 'date',
    ];

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}
