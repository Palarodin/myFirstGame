<?php

namespace App\PlayerClasses;

//Класс наследует содержимое класса PlayerClass
class Archer extends PlayerClass {

    public function __construct()
    {
        $this->setName('Лучник');
        $this->setMaxHealth(3000);
        $this->setMaxMana(1000);
        $this->setMaxStamina(2500);

        $this->setStrength(2);
        $this->setArmor(3);
        $this->setAgility(5);
        $this->setIntelligence(3);
        $this->setEndurance(5);
        $this->setSpeed(5);
        $this->setLuck(3);
    }
}