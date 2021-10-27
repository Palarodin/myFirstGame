<?php

namespace App\Races;

class Human extends Race {
    public function __construct()
    {
        $this->setName('Человек');

        $this->setStrength(3);
        $this->setArmor(2);
        $this->setAgility(2);
        $this->setIntelligence(5);
        $this->setEndurance(3);
        $this->setSpeed(2);
        $this->setLuck(5);
    }
}