<?php

// Объявляем (создаем) класс
class Player
{
    public $equipment;

    function __construct($nickname, $playerClass)
    {
        // Вызов функции класса Player
        $this->setDefaultEquipment();
        $this->setCharacteristicsEquipment();
    }

    function setDefaultEquipment()
    {
        // Переменной класса equipment мы записываем созданный объект Equipment
        // Переменной класса equipment мы инициализируем объект Equipment

        $this->equipment = new Equipment();

        // $weapon локальная переменная, и не может использоваться за пределами
        // функции setDefaultEquipment()

        // [] - массив, короткий синтаксис
        // array() - массив, полный синтаксис
        // Массивы бывают ассоциативные с ключами и одноуровневые без ключей
        // Если у массива нет ключей, то в качестве ключа используется индекс с 0 (он по-умолчанию скрыт, но к нему можно обратиться)

        $weapon = new Item(
            'Молот Тора', 'weapon',
            [
                'strength' => 5
            ]);

        $helmet = new Item(
            'Рога Балрога', 'helmet',
            [
                'armor' => 2
            ]);

        $armor = new Item(
            'Нагрудник Осириса', 'armor',
            [
                'armor' => 3,
                'health' => 3
            ]);

        $pants = new Item(
            'Подгузники Ловкости', 'pants',
            [
                'stamina' => 2,
                'agility' => 3
            ]);

        $boots = new Item(
            'Тапки Диониса', 'boots',
            [
                'speed' => 3,
            ]);

        $accessory = new Item(
            'Шпилька Афродиты', 'accessory',
            [
                'luck' => 3,
                'intelligence' => 3
            ]);

        $this->equipment->setWeapon($weapon);
        $this->equipment->setHelmet($helmet);
        $this->equipment->setArmor($armor);
        $this->equipment->setPants($pants);
        $this->equipment->setBoots($boots);
        $this->equipment->setAccessory($accessory);
    }


    public function setCharacteristicsEquipment()
    {
        $this->characteristics->addCharacteristics(
            $this->equipment->getItemCharacteristics('weapon')
        );

        $this->characteristics->addCharacteristics(
            $this->equipment->getItemCharacteristics('helmet')
        );

        $this->characteristics->addCharacteristics(
            $this->equipment->getItemCharacteristics('armor')
        );

        $this->characteristics->addCharacteristics(
            $this->equipment->getItemCharacteristics('pants')
        );

        $this->characteristics->addCharacteristics(
            $this->equipment->getItemCharacteristics('boots')
        );

        $this->characteristics->addCharacteristics(
            $this->equipment->getItemCharacteristics('accessory')
        );
    }
}