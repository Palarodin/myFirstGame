<?php

namespace App\Modules;
use App\Items\Helmets\BaseHelmet;
use App\PlayerClasses\Berserk;
use App\Races\Human;
use App\Traits\Characteristic;

use App\Items\Helmets\BeginnerHelmet;
use App\Items\Body\BeginnerBodyArmor;
//use App\PlayerClasses\Berserk;

class Actor {
    use Characteristic;

    protected $name;
    protected $level;
    protected $isDead;

    protected $mana;
    protected $health;
    protected $stamina;
    protected $expirience;

    protected $maxMana;
    protected $maxHealth;
    protected $maxStamina;
    protected $maxExpirience;

    protected $equipment;
    protected $inventory;
    protected $playerClass;
    protected $race;

    public function __construct($name, $race, $class) {
        $this->name = $name;

        $this->playerClass = new Berserk();
        $this->race = new Human();

        $this->equipment = new Equipment();
        $this->inventory = new Inventory();

        $this->equipment->setHelmet(new BeginnerHelmet());
        $this->equipment->setArmor(new BeginnerBodyArmor());

        $equipCharacteristics = $this->equipment->getSumCharacheristics();

        $this->addStrength(
            $this->playerClass->getStrength() + $this->race->getStrength() + $equipCharacteristics['strength']
        );


        $this->addArmor(
            $this->playerClass->getArmor() + $this->race->getArmor() + $equipCharacteristics['armor']
        );

        $this->addAgility(
            $this->playerClass->getAgility() + $this->race->getAgility() + $equipCharacteristics['agility']
        );

        $this->addIntelligence(
            $this->playerClass->getIntelligence() + $this->race->getIntelligence() + $equipCharacteristics['intelligence']
        );

        $this->addEndurance(
            $this->playerClass->getEndurance() + $this->race->getEndurance() + $equipCharacteristics['endurance']
        );

        $this->addSpeed(
            $this->playerClass->getSpeed() + $this->race->getSpeed() + $equipCharacteristics['speed']
        );

        $this->addLuck(
            $this->playerClass->getLuck() + $this->race->getLuck() + $equipCharacteristics['luck']
        );

        $this->maxHealth = 500 + $this->playerClass->getMaxHealth() + $equipCharacteristics['maxHealth'];
        $this->maxMana = 500 + $this->playerClass->getMaxMana();
        $this->maxStamina = 500 + $this->playerClass->getMaxStamina();

        $this->expirience = 0;
        $this->maxExpirience = 1000;

        $this->isDead = false;
        $this->level = 1;

        $this->regenerateHealth(10000);
        $this->regenerateStamina(10000);
        $this->regenerateMana(10000);
    }

    public function regenerateHealth(int $health) {
        $this->health = $this->health + $health;

        if ($health > $this->maxHealth) {
            $this->health = $this->maxHealth;
        } else {
            $this->health = $health;
        }
    }

    public function regenerateMana(int $mana) {
        $this->mana += $mana;

        if ($mana > $this->maxMana) {
            $this->mana = $this->maxMana;
        } else {
            $this->mana = $mana;
        }
    }

    public function regenerateStamina(int $stamina) {
        $this->stamina += $stamina;

        if ($stamina > $this->maxStamina) {
            $this->stamina = $this->maxStamina;
        } else {
            $this->stamina = $stamina;
        }
    }

    public function levelUp() {
        $this->level++;

        $this->expirience = 0;
        $this->maxHealth += 500;
        $this->maxMana += 500;

        $this->maxExpirience *= 2;

        $this->regenerateHealth($this->maxHealth);
        $this->regenerateMana($this->maxMana);

        $this->addStrength(2);
        $this->addAgility(2);
        $this->addArmor(2);
        $this->addIntelligence(2);
        $this->addEndurance(2);
        $this->addSpeed(2);
        $this->addLuck(2);
    }

    public function kill() {
        $this->health = 0;
        $this->isDead = true;
        $this->expirience = 0;
        $this->maxExpirience = 0;
        $this->level = 1;
        $this->mana = 0;
    }

    public function damage(int $damage) {
        $this->health = $this->health - $damage;

        if ($this->health < 1) {
            $this->kill();
        }
    }

    public function getExpirience()
    {
        return $this->expirience;
    }

    public function getMaxExpirience()
    {
        return $this->maxExpirience;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getClassName()
    {
        return $this->playerClass->getName();
    }

    public function getRaceName()
    {
        return $this->race->getName();
    }

    public function getHealth()
    {
        return $this->health;
    }

    public function getMaxHealth()
    {
        return $this->maxHealth;
    }

    public function getStamina()
    {
        return $this->stamina;
    }

    public function getMaxStamina()
    {
        return $this->maxStamina;
    }

    public function isDead()
    {
        return $this->isDead;
    }

    public function getLevel()
    {
        return $this->level;
    }

    public function getMana()
    {
        return $this->mana;
    }

    public function getMaxMana()
    {
        return $this->maxMana;
    }

    public function addExpirience($expirience)
    {
        $this->expirience = $this->expirience + $expirience;

        if ($this->expirience >= $this->maxExpirience) {
            $this->levelUp();
        }
    }
}