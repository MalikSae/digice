<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class TechStack extends Model
{
    protected $fillable = ['name', 'category', 'icon', 'color'];

    public function portfolios(): BelongsToMany
    {
        return $this->belongsToMany(Portfolio::class);
    }
}
