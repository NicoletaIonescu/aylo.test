<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;

class CacheService
{
    public function __construct()
    {

    }

    public static function cacheImage($url, $imageNameMd5 ,$image_id){
        $b64img = base64_encode(file_get_contents($url));
        Cache::put($image_id. '_' . $imageNameMd5,  $b64img, 100000000);
    }
}
