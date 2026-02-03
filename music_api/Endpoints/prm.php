<?php

namespace Music\Endpoints;

class prm {
    public $valNames = [];
    public $prms = [];
    public function __construct($vals, $prms){
        $this->valNames = $vals;
        $this->prms = $prms;
    }
}