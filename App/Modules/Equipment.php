<?php

namespace App\Modules;
use App\Items\BaseItem;

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
    public function setWeapon(BaseItem $value)
    {
        // обращаемся к функции getType() класса Item
        // Потому что в аргументе $value мы передаем класс / объект Item
        // И поэтому мы можем работать с публичными функциями класса Item

        if ($value->getType() === 'weapon') {
            $this->weapon = $value;
        }
    }

    public function setHelmet(BaseItem $value)
    {
        if ($value->getType() === 'helmet') {
            $this->helmet = $value;
        }
    }

    public function setArmor(BaseItem $value)
    {
        if ($value->getType() === 'armor') {
            $this->armor = $value;
        }

        $this->armor = $value;
    }

    public function setPants(BaseItem $value)
    {
        if ($value->getType() === 'pants') {
            $this->pants = $value;
        }

        $this->pants = $value;
    }

    public function setBoots(BaseItem $value)
    {
        if ($value->getType() === 'boots') {
            $this->boots = $value;
        }

        $this->boots = $value;
    }

    public function setAccessory(BaseItem $value)
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

            if($item === null) {
                return null;
            }

            return $item->getCharacteristics();
        }

        return null;
    }

    public function getSumCharacheristics() {
        $array = [];

        foreach ($this->bodyParts as $part) {
            $item = $this->getItemCharacteristics($part);

            if ($item === null) {
                continue;
            }

            array_push($array, $item);
        }

        return [
            'strength' => array_sum(array_column($array, 'strength')),
            'armor' => array_sum(array_column($array, 'armor')),
            'agility' => array_sum(array_column($array, 'agility')),
            'intelligence' => array_sum(array_column($array, 'intelligence')),
            'endurance' => array_sum(array_column($array, 'endurance')),
            'speed' => array_sum(array_column($array, 'speed')),
            'luck' => array_sum(array_column($array, 'luck')),
            'maxHealth' => array_sum(array_column($array, 'maxHealth'))
        ];
    }

}