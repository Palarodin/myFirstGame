<?php

namespace App\Modules;

use App\Traits\Characteristic;

class Actor
{
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

    public function regenerateHealth(int $health)
    {
        $this->health = $this->health + $health;

        if ($health > $this->maxHealth) {
            $this->health = $this->maxHealth;
        } else {
            $this->health = $health;
        }
    }

    public function regenerateMana(int $mana)
    {
        $this->mana += $mana;

        if ($mana > $this->maxMana) {
            $this->mana = $this->maxMana;
        } else {
            $this->mana = $mana;
        }
    }

    public function regenerateStamina(int $stamina)
    {
        $this->stamina += $stamina;

        if ($stamina > $this->maxStamina) {
            $this->stamina = $this->maxStamina;
        } else {
            $this->stamina = $stamina;
        }
    }

    public function levelUp()
    {
        $this->level++;

        $this->maxHealth += 500;
        $this->maxMana += 500;
        $this->maxStamina += 500;

        $this->maxExpirience *= 2;

        $this->regenerateHealth($this->maxHealth);
        $this->regenerateMana($this->maxMana);
        $this->regenerateStamina($this->maxStamina);

        $this->addStrength(2);
        $this->addAgility(2);
        $this->addArmor(2);
        $this->addIntelligence(2);
        $this->addEndurance(2);
        $this->addSpeed(2);
        $this->addLuck(2);
    }

    public function kill()
    {
        $this->health = 0;
        $this->mana = 0;
        $this->isDead = true;
    }

    public function damage(int $damage)
    {
        $this->health = $this->health - $damage;

        if ($this->health <= 0) {
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
            $this->expirience = 0;
            $this->levelUp();
        }
    }

    public function setExpirience(int $value)
    {
        $this->expirience = $value;
    }

    public function spendMana(int $spend)
    {
        $this->mana = $this->mana - $spend;

        if ($this->mana < 0) {
            $this->mana = 0;
        }
    }

    public function setMaxHealth(int $value)
    {
        $this->maxHealth = $value;
    }

    public function setMaxMana(int $value)
    {
        $this->maxMana = $value;
    }

    public function setMaxStamina(int $value)
    {
        $this->maxStamina = $value;
    }

    public function setHealth(int $value)
    {
        $this->health = $value;
    }

    public function setMana(int $value)
    {
        $this->mana = $value;
    }

    public function setStamina(int $value)
    {
        $this->stamina = $value;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }
}