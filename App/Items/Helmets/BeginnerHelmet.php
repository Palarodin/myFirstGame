<?php

namespace App\Items\Helmets;

class BeginnerHelmet extends BaseHelmet {
    public function __construct()
    {
        parent::__construct('Шлем Новичка');
        $this->setArmor(5);
        $this->setMaxHealth(100);
    }
}