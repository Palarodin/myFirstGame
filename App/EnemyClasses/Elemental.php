<?php

namespace App\EnemyClasses;

class Elemental extends EnemyClass {

    public function __construct()
    {
        $this->setName('Элементаль');
        $this->setMaxHealth(3000);
        $this->setMaxMana(2000);
        $this->setMaxStamina(2000);

        $this->setStrength(3);
        $this->setArmor(5);
        $this->setAgility(3);
        $this->setIntelligence(2);
        $this->setEndurance(3);
        $this->setSpeed(4);
        $this->setLuck(2);
    }
}