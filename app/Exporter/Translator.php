<?php

namespace App\Exporter;

class Translator {
    public $language;
    
    public function __construct(string $language)
    {
        $this->language = $language;
    }
}