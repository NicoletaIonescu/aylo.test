<?php

namespace App\Services\ImportFile\AbstractClasses;

abstract class LocationClass
{
    public $location;
    public $content;

    public function __construct($location, $content=null)
    {
        $this->location = $location;
        $this->content = $content;
    }

}
