<?php

namespace App\Services\ImportFile\ImportClasses;

use App\Services\ImportFile\AbstractClasses\GetFileClass;

class GetFileContentClass extends GetFileClass
{
    public function from(): string
    {
        $content = file_get_contents($this->location);
        return $content;
    }
}
