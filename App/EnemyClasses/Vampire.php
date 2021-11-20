<?php

namespace App\EnemyClasses;

class Vampire extends EnemyClass {

    public function __construct()
    {
        $this->setName('Вампир');
        $this->setMaxHealth(2500);
        $this->setMaxMana(2000);
        $this->setMaxStamina(3000);

        $this->setStrength(4);
        $this->setArmor(2);
        $this->setAgility(3);
        $this->setIntelligence(4);
        $this->setEndurance(4);
        $this->setSpeed(3);
        $this->setLuck(3);
    }
}