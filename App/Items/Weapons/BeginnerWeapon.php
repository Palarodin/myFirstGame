<?php

namespace App\Items\Weapon;

class BeginnerWeapon extends BaseWeapon {
    public function __construct()
    {
        parent::__construct('Меч Грома');
        $this->setStrength(5);
    }
}