<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Alias extends Model
{
    use HasFactory;

    protected $fillable = ['item_id', 'name'];

    /**
     * Get the item that owns the aliases.
     */
    public function item(): BelongsTo
    {
        return $this->belongsTo(Item::class);
    }

}
