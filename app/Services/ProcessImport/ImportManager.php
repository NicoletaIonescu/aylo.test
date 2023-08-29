<?php

namespace App\Services\ProcessImport;

use App\Jobs\InsertDataItemIntoDbJob;
use JsonMachine\Items;

class ImportManager
{
    public $file_path;

    public function __construct($file_path)
    {
        $this->file_path = $file_path;
    }

    public function run()
    {
        $items = Items::fromFile( $this->file_path, ['pointer'=> '/items']);
        foreach ($items as $data) {
            InsertDataItemIntoDbJob::dispatch($data);
        }
    }

}
