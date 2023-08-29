<?php

namespace App\Services\ProcessImport\Services;

use App\Models\ThumbnailType;

class ThumbnailTypeService
{
    public static function insertFromStdObjectToDb($data)
    {
        $thumbnailType = ThumbnailType::firstOrNew(['name' => $data->type]);
        $thumbnailType->fill(self::arrayFill($data));
        $thumbnailType->save();
        return $thumbnailType;
    }

    protected static function arrayFill($data)
    {
        if (!$data->type) $data->type='';
        return ['name'=> $data->type ];
    }
}
