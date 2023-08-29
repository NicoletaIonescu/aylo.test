<?php

namespace App\Jobs;

use App\Services\ProcessImport\Services\AliasService;
use App\Services\ProcessImport\Services\AttributeService;
use App\Services\ProcessImport\Services\ImageService;
use App\Services\ProcessImport\Services\ItemService;
use App\Services\ProcessImport\Services\LicenseService;
use App\Services\ProcessImport\Services\StatsService;
use App\Services\ProcessImport\Services\ThumbnailService;
use App\Services\ProcessImport\Services\ThumbnailTypeService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class InsertDataItemIntoDbJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var
     */
    public $data;
    /**
     * Create a new job instance.
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Execute the job. Must Do reactor
     */
    public function handle(): void
    {
        $data= $this->data;

        //License
        $license = LicenseService::insertFromStdObjectToDb($data);

        //Item
        $item = ItemService::insertFromStdObjectToDb($data, $license->id);

        //Attribute
        $attribute = AttributeService::insertFromStdObjectToDb($data->attributes, $item->id);

        //Stats
        $stats = StatsService::insertFromStdObjectToDb($data->attributes->stats, $attribute->id);

        //Alias
        foreach($data->aliases as $alias_name){
           $alias = AliasService::insertFromStdObjectToDb($item->id, $alias_name);
        }

        //Thumbnails
        foreach($data->thumbnails as $thumbnail_data){
            //Thumbnails Type
            $thumbnailType = ThumbnailTypeService::insertFromStdObjectToDb($thumbnail_data);

            //Thumbnail
            $thumbnail = ThumbnailService::insertFromStdObjectToDb($thumbnail_data, $item->id, $thumbnailType->id);

            foreach($thumbnail_data->urls as $image_data){
                //Image
                $image = ImageService::insertFromStdObjectToDb($image_data, $thumbnail->id);
            }
        }

        print("Done $item->name with item id =$item->id. \n");
    }
}
