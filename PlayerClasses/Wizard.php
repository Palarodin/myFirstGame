<?php
//Класс наследует содержимое класса PlayerClass
class Wizard extends PlayerClass {

    public function __construct()
    {
        $this->setName('Маг');
        $this->setMaxHealth(2000);
        $this->setMaxMana(4000);
        $this->setMaxStamina(2500);

        $this->setStrength(2);
        $this->setArmor(2);
        $this->setAgility(2);
        $this->setIntelligence(5);
        $this->setEndurance(3);
        $this->setSpeed(2);
        $this->setLuck(4);
    }
}