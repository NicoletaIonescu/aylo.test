<?php

namespace App\Services\ProcessImport\Services;

use App\Models\Attribute;
use App\Models\Thumbnail;

class ThumbnailService
{
    public static function insertFromStdObjectToDb($data, $itemId, $thumbnailTypeId)
    {
        $thumbnail = Thumbnail::firstOrNew(self::arrayFill($data, $itemId, $thumbnailTypeId));
        $thumbnail->fill(self::arrayFill($data, $itemId, $thumbnailTypeId));
        $thumbnail->save();
        return $thumbnail;
    }

    protected static function arrayFill($data, $itemId, $thumbnailTypeId)
    {
        $attributes = ['item_id', 'height', 'width' ];
        $result=[];
        foreach($attributes as $atr) {
            if (!isset($data->$atr)) $data->$atr='';
            $result[$atr] = $data->$atr;
        }

        $result['item_id'] = $itemId;
        $result['thumbnail_type_id'] = $thumbnailTypeId;
        return $result;
    }
}
