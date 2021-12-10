<?php

namespace App\Modules;

use App\Models\UserRace;
use App\Traits\Characteristic;

class PlayerRace {
    use Characteristic;

    protected $name;

    public function __construct(int $id)
    {
        $race = UserRace::factory()->find($id);

        $this->setName($race['name']);

        $this->setStrength($race['strength']);
        $this->setArmor($race['armor']);
        $this->setAgility($race['agility']);
        $this->setIntelligence($race['intelligence']);
        $this->setEndurance($race['endurance']);
        $this->setSpeed($race['speed']);
        $this->setLuck($race['luck']);

        $this->setMaxHealth($race['max_health']);
        $this->setMaxMana($race['max_mana']);
        $this->setMaxStamina($race['max_stamina']);
    }

    public function getName() {
        return $this->name;
    }

    public function setName(string $name) {
        $this->name = $name;
    }
}