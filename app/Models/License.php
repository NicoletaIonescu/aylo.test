<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class License extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    /**
     * Get the item that owns the attributes.
     */
    public function item(): HasOne
    {
        return $this->hasOne(Item::class);
    }
}
