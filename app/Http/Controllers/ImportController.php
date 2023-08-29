<?php

namespace App\Http\Controllers;

use App\Jobs\InsertDataItemIntoDbJob;
use JsonMachine\Items;

class ImportController extends Controller
{
    public function index()
    {
//        $getJson = new GuzzleWithGetClass('https://www.pornhub.com/files/json_feed_pornstars.json');
//        $toFile = new StoreToLocalStorageClass('import/files/jsonNew-import.json');
//        $importer = new ImportFileGenerator($getJson, $toFile);
//        $importer->run();

        $items = Items::fromFile('/var/www/storage/app/import/files/jsonNew-import.json', ['pointer'=> '/items']);
        foreach ($items as $data) {
            InsertDataItemIntoDbJob::dispatch($data);
        }
    }
}
