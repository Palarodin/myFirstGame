<?php

// Класс
class Characteristic
{
    // Переменные
    protected $strength;
    protected $armor;
    protected $agility;
    protected $intelligence;
    protected $stamina;
    protected $speed;
    protected $luck;

    public function __construct($strength, $armor, $agility, $intelligence, $stamina, $speed, $luck)
    {
        $this->setStrength($strength);
        $this->setAgility($agility);
        $this->setArmor($armor);
        $this->setIntelligence($intelligence);
        $this->setStamina($stamina);
        $this->setSpeed($speed);
        $this->setLuck($luck);
    }

    // Функции
    public function getCharacteristics()
    {
        return [
            'strength' => $this->strength,
            'agility' => $this->agility,
            'armor' => $this->armor,
            'intelligence' => $this->intelligence,
            'stamina' => $this->stamina,
            'speed' => $this->speed,
            'luck' => $this->luck
        ];
    }

    public function getStrength()
    {
        return $this->strength;
    }

    public function setStrength(int $value)
    {
        $this->strength = $value;
    }

    public function setAgility(int $value)
    {
        $this->agility = $value;
    }

    public function setArmor(int $value)
    {
        $this->armor = $value;
    }

    public function setIntelligence(int $value)
    {
        $this->intelligence = $value;
    }

    public function setStamina(int $value)
    {
        $this->stamina = $value;
    }

    public function setSpeed(int $value)
    {
        $this->speed = $value;
    }

    public function setLuck(int $value)
    {
        $this->luck = $value;
    }

    public function getAgility()
    {
        return $this->agility;
    }

    public function getArmor()
    {
        return $this->armor;
    }

    public function getIntelligence()
    {
        return $this->intelligence;
    }

    public function getStamina()
    {
        return $this->stamina;
    }

    public function getSpeed()
    {
        return $this->speed;
    }

    public function getLuck()
    {
        return $this->luck;
    }

    public function addStrength(int $value)
    {
        $this->strength += $value;
    }

    public function addAgility(int $value)
    {
        $this->agility += $value;
    }

    public function addArmor(int $value)
    {
        $this->armor += $value;
    }

    public function addIntelligence(int $value)
    {
        $this->intelligence += $value;
    }

    public function addStamina(int $value)
    {
        $this->stamina += $value;
    }

    public function addSpeed(int $value)
    {
        $this->speed += $value;
    }

    public function addLuck(int $value)
    {
        $this->luck += $value;
    }

    public function addCharacteristics(array $array) {
       foreach ($array as $key => $value) {
           $method = 'add' . ucfirst($key);

           if (method_exists($this, $method)) {
               call_user_func_array([
                   $this, $method
               ], [$value]);
           }
        }
    }
}