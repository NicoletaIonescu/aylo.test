<?php

namespace App\Services\ProcessImport\Services;

use App\Models\License;

class LicenseService
{
    public static function insertFromStdObjectToDb($data)
    {
        $license = License::firstOrNew(['name'=>$data->license]);
        $license->fill(self::arrayFill($data));
        $license->save();
        return $license;
    }

    protected static function arrayFill($data)
    {
        if (!$data->license) $data->license='';
        return ['name'=> $data->license ];
    }
}
