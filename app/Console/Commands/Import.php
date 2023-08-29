<?php

namespace App\Console\Commands;

use App\Services\ImportFile\ImportFileManager;
use App\Services\ProcessImport\ImportManager;
use Illuminate\Console\Command;

class Import extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:import {web_location} {local_import_location}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Gets file from the location and imports it in the db';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Got the location from where I want to take the file and where I whant to save it
        $web_location = $this->argument('web_location');
        $store_location = $this->argument('local_import_location');

        //Makeing the actual save of the file
        try{
            $importFileManager = new ImportFileManager($web_location, $store_location);
            $importFileManager->importer->run();
            $file_path = $importFileManager->importer->getLocationSaved();
            $this->info("Your file was saved to ".$file_path);

        } catch (\Exception $e)
        {
            print $e->getMessage();
        }


        $importManager = new ImportManager($file_path);
        $importManager->run();


    }
}
