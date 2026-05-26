<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Portfolio extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = ['name', 'description', 'category', 'url', 'is_featured', 'sort_order'];

    protected $casts = [
        'is_featured' => 'boolean',
    ];

    public function techStacks(): BelongsToMany
    {
        return $this->belongsToMany(TechStack::class);
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('screenshots')
             ->acceptsMimeTypes(['image/jpeg', 'image/png', 'image/webp']);
    }
}
