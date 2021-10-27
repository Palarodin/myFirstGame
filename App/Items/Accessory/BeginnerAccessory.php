<?php

namespace App\Items\Accessory;

class BeginnerAccessory extends BaseAccessory{
    public function __construct()
    {
        parent::__construct('Кулон Исиды');
        $this->setLuck(3);
        $this->setIntelligence(4);
    }
}