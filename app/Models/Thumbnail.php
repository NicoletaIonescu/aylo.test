<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Thumbnail extends Model
{
    use HasFactory;

    protected $fillable = ['item_id', 'height', 'width', 'thumbnail_type_id'];

    /**
     * Get the item that owns the thumbnails.
     */
    public function item(): BelongsTo
    {
        return $this->belongsTo(Item::class);
    }

    /**
     * Get the thumnailtype associated with the thumbnail.
     */
    public function thumnailtype(): HasOne
    {
        return $this->hasOne(ThumbnailType::class);
    }

    /**
     * The images that belong to thumbnail.
     */
    public function images()
    {
        return $this->belongsToMany(Image::class, 'thumbnails_images');
    }

}
