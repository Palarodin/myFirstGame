<?php

namespace App\EnemyClasses;

class Ogre extends EnemyClass {

    public function __construct()
    {
        $this->setName('Огр');
        $this->setMaxHealth(3500);
        $this->setMaxMana(1000);
        $this->setMaxStamina(3000);

        $this->setStrength(5);
        $this->setArmor(4);
        $this->setAgility(2);
        $this->setIntelligence(1);
        $this->setEndurance(4);
        $this->setSpeed(1);
        $this->setLuck(1);
    }
}