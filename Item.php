<?php

class Item
{
    protected $name;
    protected $endurance;
    protected $minLevel = 1;
    protected $type;
    protected $characteristics;

    public function __construct(string $name, string $type, array $characteristics)
    {
        $this->setEndurance(100);
        $this->name = $name;
        $this->type = $type;

        $this->characteristics = $characteristics;
    }

    public function getCharacteristics()
    {
        return $this->characteristics;
    }

    public function setMinLevel(int $value)
    {
        $this->minLevel = $value;
    }

    public function getEndurance()
    {
        return $this->endurance;
    }

    public function getType()
    {
        return $this->type;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setEndurance(int $value)
    {
        $this->endurance = $value;
    }
}