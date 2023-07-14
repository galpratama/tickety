<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

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
        'category_id',
        'photos',
        'is_popular',
    ];

    protected $casts = [
        'start_date' => 'date',
    ];

    /**
     * Get the tickets for the event.
     */
    public function tickets(): HasMany
    {
        return $this->hasMany(Ticket::class);
    }

    /**
     * Get the category that owns the event.
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the lowest price ticket for the event.
     */
    public function getStartFromAttribute()
    {
        return $this->tickets()->orderBy('price')->first()->price;
    }

    /**
     * Get the first photo as a thumbnail from the photos attribute, if not exist return default image.
     */
    public function getThumbnailAttribute()
    {
        $photos = json_decode($this->photos);

        if ($photos && !empty($photos)) {
            return Storage::url($photos[0]);
        }

        return asset('assets/images/event-1.webp');
    }

    /**
     * Scope a query to only include events with certain category.
     */
    public function scopeWithCategory($query, $category)
    {
        return $query->where('category_id', $category);
    }

    /**
     * Scope a query to only include upcoming events.
     */
    public function scopeUpcoming($query)
    {
        return $query->orderBy('start_date', 'asc')->where('start_date', '>=', now());
    }
}
