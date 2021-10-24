<?php
//Класс наследует содержимое класса Race
class Elf extends Race {
    use Characteristic;

    public function __construct()
    {
        $this->setName('Эльф');

        $this->setStrength(3);
        $this->setArmor(3);
        $this->setAgility(5);
        $this->setIntelligence(3);
        $this->setEndurance(5);
        $this->setSpeed(5);
        $this->setLuck(3);
    }

}