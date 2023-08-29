<?php

namespace App\Services\ImportFile\ImportClasses;

use App\Services\ImportFile\AbstractClasses\GetFileClass;
use App\Services\ImportFile\AbstractClasses\LocationClass;
use App\Services\ImportFile\Interfaces\GetFileContent;

class GuzzleWithGetClass extends GetFileClass
{
    public function from(): string
    {
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', $this->location);
        //TODO response validation
        return $response->getBody();
    }

}
