<?php

namespace App\Services\ImportFile\AbstractClasses;

use App\Services\ImportFile\Interfaces\GetAbsolutLocation;
use App\Services\ImportFile\Interfaces\StoreContentToLocation;

abstract class SetFileClass extends LocationClass implements StoreContentToLocation, GetAbsolutLocation
{
    public $absolut_location;
}
