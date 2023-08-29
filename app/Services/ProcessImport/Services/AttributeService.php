<?php

namespace App\Services\ProcessImport\Services;

use App\Models\Attribute;
use App\Models\License;

class AttributeService
{
    public static function insertFromStdObjectToDb($data, $itemId)
    {
        $attribute = Attribute::firstOrNew(['item_id' => $itemId]);
        $attribute->fill(self::arrayFill($data, $itemId));
        $attribute->save();
        return $attribute;
    }

    protected static function arrayFill($data, $itemId)
    {
        $attributes = ['hairColor', 'ethnicity' , 'tattoos' , 'piercings' , 'breastSize' , 'breastType' , 'gender' , 'orientation' , 'age'];
        $result=[];
        foreach($attributes as $atr) {
            if (!isset($data->$atr)) $data->$atr='';
            $result[$atr] = $data->$atr;
        }

        $result['item_id'] = $itemId;
        return $result;
    }
}
