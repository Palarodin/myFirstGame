<?php
namespace App\Modules;

use App\Models\Enemy as EnemyModel;

class Enemy extends Actor {

    protected $data;
    protected $level;

    public function __construct($level) {
        $this->randomEnemy();

        $this->isDead = false;
        $this->level = (int) $level;

        $this->setName($this->data['name']);
        $this->setCharacteristics();
    }

    public function randomEnemy() {
        $this->data = EnemyModel::factory()->table('enemies')
            ->orderBy('RAND()')
            ->limit(1)
            ->first();
    }
    
    public function setCharacteristics() {
        $this->setStrength($this->data['strength'] * $this->level);
        $this->setArmor($this->data['armor'] * $this->level);
        $this->setAgility($this->data['agility'] * $this->level);
        $this->setIntelligence($this->data['intelligence'] * $this->level);
        $this->setEndurance($this->data['endurance'] * $this->level);
        $this->setSpeed($this->data['speed'] * $this->level);
        $this->setLuck($this->data['luck'] * $this->level);

        $this->setHealth($this->data['health'] * $this->level);
        $this->setMana($this->data['mana'] * $this->level);
        $this->setStamina($this->data['stamina'] * $this->level);

        $this->setExpirience($this->data['expirience'] * $this->level);

        $this->setMaxHealth($this->data['max_health'] * $this->level);
        $this->setMaxMana($this->data['max_mana'] * $this->level);
        $this->setMaxStamina($this->data['max_stamina'] * $this->level);
    }
}
