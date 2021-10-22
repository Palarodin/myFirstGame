<?php

class Warrior extends PlayerClass
{
    public function __construct()
    {
        $this->setName('Варвар');
        $this->setMaxHealth(5000);
        $this->setMaxMana(2000);
        $this->setMaxStamina(1000);

        $this->setStrength(3);
        $this->setArmor(5);
        $this->setAgility(5);
        $this->setIntelligence(1);
        $this->setEndurance(5);
        $this->setSpeed(2);
        $this->setLuck(1);
    }
}