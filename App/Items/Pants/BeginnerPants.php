<?php

namespace App\Items\Pants;

class BeginnerPants extends BasePants{
    public function __construct()
    {
        parent::__construct('Штаны следопыта');
        $this->setArmor(2);
        $this->setEndurance(4);
    }
}