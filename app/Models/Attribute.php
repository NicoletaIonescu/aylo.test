<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Attribute extends Model
{
    use HasFactory;

    protected $fillable = ['item_id','hairColor', 'ethnicity', 'tattoos', 'piercings', 'breastSize', 'breastType', 'gender', 'orientation', 'age'];

    /**
     * Get the item that owns the attributes.
     */
    public function item(): BelongsTo
    {
        return $this->belongsTo(Item::class);
    }

    /**
     * Get the stats associated with the attribute.
     */
    public function stats(): HasOne
    {
        return $this->hasOne(Stats::class);
    }


}
