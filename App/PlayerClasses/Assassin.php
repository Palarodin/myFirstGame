<?php

namespace App\PlayerClasses;

//Класс наследует содержимое класса PlayerClass
class Assassin extends PlayerClass
{

    public function __construct()
    {
        $this->setName('Убийца');
        $this->setMaxHealth(3000);
        $this->setMaxMana(2500);
        $this->setMaxStamina(3500);

        $this->setStrength(3);
        $this->setArmor(2);
        $this->setAgility(5);
        $this->setIntelligence(3);
        $this->setEndurance(4);
        $this->setSpeed(5);
        $this->setLuck(2);
    }
}