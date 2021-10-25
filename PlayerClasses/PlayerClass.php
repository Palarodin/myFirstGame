<?php

class PlayerClass
{
    //Вставляем содержимое класса в PlayerClass
    use Characteristic;

    protected $name;

    protected $maxMana;
    protected $maxHealth;
    protected $maxStamina;

    public function getName()
    {
        return $this->name;
    }

    public function getMaxHealth()
    {
        return $this->maxHealth;
    }

    public function getMaxMana()
    {
        return $this->maxMana;

    }

    public function getMaxStamina()
    {
        return $this->maxStamina;
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

    public function setName(string $name)
    {
        $this->name = $name;
    }
}