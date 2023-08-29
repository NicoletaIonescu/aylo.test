<?php

namespace App\Services\ProcessImport\Services;

use App\Models\Alias;
use App\Models\License;

class AliasService
{
    public static function insertFromStdObjectToDb($itemId, $alias_name)
    {
        $alias = Alias::firstOrNew(['item_id' => $itemId, 'name'=>$alias_name]);
        $alias->name = $alias_name;
        $alias->save();
        return $alias;
    }

}
