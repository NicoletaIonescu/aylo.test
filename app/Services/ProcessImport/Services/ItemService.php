<?php

namespace App\Services\ProcessImport\Services;



use App\Models\Item;

class ItemService
{
    public static function insertFromStdObjectToDb($data, $licenseId)
    {
        $item = Item::firstOrCreate(['id'=>$data->id]);
        $item->fill([
            'name' => $data->name,
            'wlStatus' => $data->wlStatus,
            'link' => $data->link,
            'license_id' => $licenseId
        ]);
        $item->save();
        return $item;
    }

    protected static function arrayFill($data, $licenseId)
    {
        if (!$data->name) $data->name='';
        if (!$data->wlStatus) $data->wlStatus = '';
        if (!$data->link) $data->link = '';
        return [ 'name' => $data->name,
                 'wlStatus' => $data->wlStatus,
                 'link' => $data->link,
                 'license_id' => $licenseId];
    }
}
