<?php

namespace App\Items;

class Axe extends BaseItem {
    public function __construct()
    {
        parent::__construct('Топор', 'weapon');

        $this->setAgility(10);
        $this->setStrength(15);
    }
}