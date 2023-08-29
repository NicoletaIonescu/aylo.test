<?php

namespace App\Services\ImportFile\ImportClasses;

use App\Services\ImportFile\AbstractClasses\LocationClass;
use App\Services\ImportFile\AbstractClasses\SetFileClass;
use App\Services\ImportFile\Interfaces\StoreContentToLocation;
use Illuminate\Support\Facades\Storage;

class StoreToLocalStorageClass extends SetFileClass
{
    public function to($content)
    {
        Storage::disk('local')->put($this->location, $content);
    }

    public function getAbsolutLocation()
    {
        return '/var/www/storage/app/'.$this->location;
    }
}
