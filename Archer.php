<?php

class Archer extends PlayerClass {
    public function __construct()
    {
        $this->setName('Лучник');
        $this->setMaxHealth(3000);
        $this->setMaxMana(1000);
        $this->setMaxStamina(2500);
    }
}