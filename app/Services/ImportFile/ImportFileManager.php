<?php

namespace App\Services\ImportFile;

use App\Services\ImportFile\Enums\GetFileContentTypes;
use App\Services\ImportFile\Enums\StoreContentToLocationType;
use App\Services\ImportFile\ImportClasses\GetFileContentClass;
use App\Services\ImportFile\ImportClasses\GuzzleWithGetClass;
use App\Services\ImportFile\ImportClasses\StoreToLocalStorageClass;

class ImportFileManager
{
    public $from, $to;
    public BasicImportFile $importer;

    public function __construct(
         $from, $to,
         GetFileContentTypes $typeToGetFile=null,
         StoreContentToLocationType $typeToStoreFile=null,
    )
    {
        $getFileObject = null;
        $storeFileObject = null;

        //Get the class to take the file
        switch($typeToGetFile)
        {
            case GetFileContentTypes::GUZZLE:
                $getFileObject = new GuzzleWithGetClass($from);
                break;
            case GetFileContentTypes::GET_FILE_CONTENT:
                $getFileObject = new GetFileContentClass($from);
                break;

            default:
                $getFileObject = new GuzzleWithGetClass($from);
                break;
        }

        //Get the class to make the file
        switch($typeToStoreFile)
        {
            case GetFileContentTypes::GUZZLE:
                $storeFileObject = new StoreToLocalStorageClass($to);
                break;

            default:
                $storeFileObject = new StoreToLocalStorageClass($to);
                break;
        }

        $this->importer = new BasicImportFile($getFileObject, $storeFileObject);
    }

}
