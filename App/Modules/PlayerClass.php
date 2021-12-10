<?php

namespace App\Modules;

use App\Models\UserClass;
use App\Traits\Characteristic;

class PlayerClass
{
    use Characteristic;

    protected $name;

    protected $maxMana;
    protected $maxHealth;
    protected $maxStamina;

    /**
     * 1. Передать ID
     * 2. Получить класс по ID
     * 3. Установить все характеристики из базы данных
     */

    public function __construct(int $id)
    {
        $class = UserClass::factory()->find($id);

        $this->setName($class['name']);

        $this->setStrength($class['strength']);
        $this->setArmor($class['armor']);
        $this->setAgility($class['agility']);
        $this->setIntelligence($class['intelligence']);
        $this->setEndurance($class['endurance']);
        $this->setSpeed($class['speed']);
        $this->setLuck($class['luck']);

        $this->setMaxHealth($class['max_health']);
        $this->setMaxMana($class['max_mana']);
        $this->setMaxStamina($class['max_stamina']);
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }
}