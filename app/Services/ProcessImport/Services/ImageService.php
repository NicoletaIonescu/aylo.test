<?php

namespace App\Services\ProcessImport\Services;

use App\Models\Image;
use App\Services\CacheService;

class ImageService
{
    public static function insertFromStdObjectToDb($data, $thumbnailId)
    {
        $image = Image::where(['link_for_picture'=>$data])->first();
        if (!$image){
            $image = new Image();
            $image->save();
            self::checkForUrlAndImageType($data, $image);

        }
        $image->link_for_picture= $data;
        $image->save();

        $image->thumbnails()->attach($thumbnailId);

        return $image;
    }

    private static function checkForUrlAndImageType($url, $image)
    {
        $imageTypes = [ 'image/png' , 'image/jpg' , 'image/jpeg', 'image/jpe', 'image/gif', 'image/tif', 'image/tiff', 'image/svg', 'image/ico', 'image/icon', 'image/x-icon'];
        //check if url is valid
        if (filter_var($url, FILTER_VALIDATE_URL)) {
            //get headers from url and check if content-type is a image
            if (self::urlExists($url)) {

                $url_headers = get_headers($url, 1);
                if (isset($url_headers['Content-Type'])) {
                    $type = strtolower($url_headers['Content-Type']);
                    if (in_array($type, $imageTypes)) {
                        $imageNameMd5 = md5(pathinfo($url, PATHINFO_FILENAME));
                        CacheService::cacheImage($url, $imageNameMd5, $image->id);
                        $image->image = $image->id . '_' . $imageNameMd5;
                    }
                }

            }
        }

    }

    private static function urlExists($url) {
        $handle = curl_init($url);
        curl_setopt($handle,  CURLOPT_RETURNTRANSFER, TRUE);

        $response = curl_exec($handle);
        $httpCode = curl_getinfo($handle, CURLINFO_HTTP_CODE);

        if($httpCode >= 200 && $httpCode <= 400) {
            return true;
        } else {
            return false;
        }

        curl_close($handle);
    }
}
