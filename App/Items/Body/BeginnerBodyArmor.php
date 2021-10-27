<?php

namespace App\Items\Body;

class BeginnerBodyArmor extends BaseBodyArmor{
    public function __construct()
    {
        parent::__construct('Броня Новичка');
        $this->setArmor(10);
        $this->setMaxHealth(100);
    }
}