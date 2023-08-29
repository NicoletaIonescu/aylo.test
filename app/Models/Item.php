<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Item extends Model
{
    use HasFactory;

    protected $fillable = ['name','license_id','wlStatus','link'];

    /**
     * Get the attribute associated with the item.
     */
    public function attribute(): HasOne
    {
        return $this->hasOne(Attribute::class);
    }

    /**
     * Get the license associated with the item.
     */
    public function license(): BelongsTo
    {
        return $this->belongsTo(License::class);
    }

    /**
     * Get the aliases associated with the item.
     */
    public function aliases(): HasMany
    {
        return $this->hasMany(Alias::class);
    }

    /**
     * Get the thumbnails associated with the item.
     */
    public function thumbnails(): HasMany
    {
        return $this->hasMany(Thumbnail::class);
    }





}
