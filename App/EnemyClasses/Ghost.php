<?php

namespace App\EnemyClasses;

use App\Modules\Actor;

class Ghost extends Actor {
    public function __construct($dungeonLevel = 1)
    {
        $this->setName('Призрак');
        $this->setMaxHealth(2000 * $dungeonLevel);
        $this->setMaxMana(1500 * $dungeonLevel);
        $this->setMaxStamina(2500 * $dungeonLevel);

        $this->regenerateHealth(2000 * $dungeonLevel);
        $this->regenerateMana(1500 * $dungeonLevel);

        $this->isDead = false;

        $this->setStrength(3 * $dungeonLevel);
        $this->setArmor(3 * $dungeonLevel);
        $this->setAgility(4 * $dungeonLevel);
        $this->setIntelligence(2 * $dungeonLevel);
        $this->setEndurance(5 * $dungeonLevel);
        $this->setSpeed(1 * $dungeonLevel);
        $this->setLuck(2 * $dungeonLevel);
    }
}