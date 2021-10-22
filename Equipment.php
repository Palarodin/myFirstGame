<?php

class Equipment
{
    protected $weapon;
    protected $helmet;
    protected $armor;
    protected $pants;
    protected $boots;
    protected $accessory;

    protected $bodyParts = [
        'weapon', 'helmet', 'armor',
        'pants', 'boots', 'accessory'
    ];

    public function getBodyParts()
    {
        return $this->bodyParts;
    }

    public function getWeapon()
    {
        return $this->weapon;
    }

    public function getHelmet()
    {
        return $this->helmet;
    }

    public function getArmor()
    {
        return $this->armor;
    }

    public function getPants()
    {
        return $this->pants;
    }

    public function getBoots()
    {
        return $this->boots;
    }

    public function getAccessory()
    {
        return $this->accessory;
    }

    // В качестве аргумента $value функция ожидает объект Item
    public function setWeapon(Item $value)
    {
        // обращаемся к функции getType() класса Item
        // Потому что в аргументе $value мы передаем класс / объект Item
        // И поэтому мы можем работать с публичными функциями класса Item

        if ($value->getType() === 'weapon') {
            $this->weapon = $value;
        }
    }

    public function setHelmet(Item $value)
    {
        if ($value->getType() === 'helmet') {
            $this->helmet = $value;
        }
    }

    public function setArmor(Item $value)
    {
        if ($value->getType() === 'armor') {
            $this->armor = $value;
        }

        $this->armor = $value;
    }

    public function setPants(Item $value)
    {
        if ($value->getType() === 'pants') {
            $this->pants = $value;
        }

        $this->pants = $value;
    }

    public function setBoots(Item $value)
    {
        if ($value->getType() === 'boots') {
            $this->boots = $value;
        }

        $this->boots = $value;
    }

    public function setAccessory(Item $value)
    {
        if ($value->getType() === 'accessory') {
            $this->accessory = $value;
        }
        $this->accessory = $value;
    }

    public function getItemCharacteristics($part) {
        $method = 'get' . ucfirst($part);

        if(method_exists($this, $method)) {
            $item = call_user_func_array([$this, $method], []);
            return $item->getCharacteristics();
        }

        return null;
    }
}