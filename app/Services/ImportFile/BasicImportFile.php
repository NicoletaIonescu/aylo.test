<?php

namespace App\Services\ImportFile;

use App\Services\ImportFile\AbstractClasses\LocationClass;
use App\Services\ImportFile\Interfaces\GetFileContent;
use App\Services\ImportFile\Interfaces\StoreContentToLocation;

class BasicImportFile
{
    /**
     * For knowing from where to get the file
     * @var LocationClass
     */
    protected LocationClass $getFileContentClass;

    /**
     * For knowing from where to put the file
     * @var LocationClass
     */
    protected LocationClass $storeToLocationClass;

    /**
     * @param GetFileContent $getFileContentClass
     * @param StoreContentToLocation $storeToLocationClass
     */
    public function __construct(GetFileContent $getFileContentClass, StoreContentToLocation $storeToLocationClass)
    {
        $this->getFileContentClass = $getFileContentClass;
        $this->storeToLocationClass = $storeToLocationClass;
    }


    public function run()
    {
        $content = $this->getFileContentClass->from();
        $this->storeToLocationClass->to($content);
        $location = $this->storeToLocationClass->location;
        return $location;
    }

    public function getLocationSaved()
    {
        return $this->storeToLocationClass->getAbsolutLocation();
    }

}
