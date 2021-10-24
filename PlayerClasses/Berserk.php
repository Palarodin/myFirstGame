<?php
//Класс наследует содержимое класса PlayerClass
class Berserk extends PlayerClass
{

    public function __construct()
    {
        $this->setName('Берсерк');
        $this->setMaxHealth(5000);
        $this->setMaxMana(1500);
        $this->setMaxStamina(4000);

        $this->setStrength(5);
        $this->setArmor(5);
        $this->setAgility(1);
        $this->setIntelligence(2);
        $this->setEndurance(4);
        $this->setSpeed(2);
        $this->setLuck(2);
    }
}