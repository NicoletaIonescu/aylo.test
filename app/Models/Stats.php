<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Stats extends Model
{
    use HasFactory;

    protected $fillable = ['attribute_id', 'subscriptions', 'monthlySearches', 'views', 'videosCount', 'rankWl', 'premiumVideosCount', 'whiteLabelVideoCount', 'rank', 'rankPremium'];

    /**
     * Get the attribute that owns the stats.
     */
    public function attribute(): BelongsTo
    {
        return $this->belongsTo(Attribute::class);
    }
}
