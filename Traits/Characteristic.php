<?php

// Копируем содержимое класса
trait Characteristic
{
    // Переменные
    protected $strength = null;
    protected $armor = null;
    protected $agility = null;
    protected $intelligence = null;
    protected $endurance = null;
    protected $speed = null;
    protected $luck = null;

    public function getCharacteristics()
    {
        $array = [];

        if ($this->strength !== null) {
            $array['strength'] = $this->strength;
        }

        if ($this->armor !== null) {
            $array['armor'] = $this->armor;
        }

        if ($this->agility !== null) {
            $array['agility'] = $this->agility;
        }

        if ($this->intelligence !== null) {
            $array['intelligence'] = $this->intelligence;
        }
        if ($this->endurance !== null) {
            $array['endurance'] = $this->endurance;
        }

        if ($this->speed !== null) {
            $array['speed'] = $this->speed;
        }

        if ($this->luck !== null) {
            $array['luck'] = $this->luck;
        }

        return $array;
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

    public function setEndurance(int $value)
    {
        $this->endurance = $value;
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

    public function getEndurance()
    {
        return $this->endurance;
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

    public function addEndurance(int $value)
    {
        $this->endurance += $value;
    }

    public function addSpeed(int $value)
    {
        $this->speed += $value;
    }

    public function addLuck(int $value)
    {
        $this->luck += $value;
    }

    public function addCharacteristics(array $array)
    {
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