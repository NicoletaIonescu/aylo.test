<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = ['link_to_picture', 'image'];

    /**
     * The thumbnails that belong to image.
     */
    public function thumbnails()
    {
        return $this->belongsToMany(Thumbnail::class, 'thumbnails_images');
    }
}
