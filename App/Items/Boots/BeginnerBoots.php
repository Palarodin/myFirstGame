<?php

namespace App\Items\Boots;

class BeginnerBoots extends BaseBoots {
    public function __construct()
    {
        parent::__construct('Тапки Диониса');
        $this->setAgility(4);
        $this->setSpeed(3);
    }
}