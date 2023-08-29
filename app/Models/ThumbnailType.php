<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ThumbnailType extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    /**
     * Get the thumbnail that owns the thumbnailtype.
     */
    public function thumbnail(): BelongsTo
    {
        return $this->belongsTo(Thumbnail::class);
    }
}
