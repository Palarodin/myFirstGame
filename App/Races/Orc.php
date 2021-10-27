<?php

namespace App\Races;

class Orc extends Race {
    public function __construct()
    {
        $this->setName('Орк');

        $this->setStrength(5);
        $this->setArmor(4);
        $this->setAgility(2);
        $this->setIntelligence(2);
        $this->setEndurance(4);
        $this->setSpeed(3);
        $this->setLuck(2);
    }

}