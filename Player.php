<?php

// Объявляем (создаем) класс
class Player
{
    // (public/private/protected) - Область видимости, это можно указать переменной и функции

    // public - Публичная переменная
    // private - приватная переменная
    // protected - защищенная переменная

    public $nickname; //Публичная переменная класса никнейм, по умолчанию NULL
    public $health;

    public $maxHealth;
    public $maxExp;
    public $maxMana = 2000; // По умолчанию присваиваем числовой тип со значением 2000

    public $characteristics;
    public $playerClass;
    public $equipment;

    public $isDead = false; // Присваиваем булев(true/false) тип со значением false
    public $level = 1;
    public $expirience = 0;

    public $mana;

    //__construct - магическая функция вызываемая при инициализации объекта
    // $nickname и $playerClass - является передаваемым аргументом функции

    function __construct($nickname, $playerClass)
    {
        // Записываем переменной класса($this)->nickname аргумент
        $this->nickname = $nickname;
        $this->playerClass = $playerClass;

        $this->characteristics = $this->setCharacteristicsPlayer();

        // Вызов функции класса Player
        $this->setDefaultEquipment();
        $this->setCharacteristicsEquipment();

        // Вызываем цикл, где обращаемся к переменной через содержимое функции как значение
        // Аргументу item присваиваем callback-функцию, где указываем значение переменной

        //Первый вариант цикл в цикле
//        foreach ($this->equipment->getBodyParts() as $value) {
//            $item = call_user_func_array([$this->equipment, 'get' . ucfirst($value)], []);
//
//            foreach ($item->getCharacteristics() as $key => $characteristic_value) {
//                // Нам нужна проверка, что такая динамическая функция существует
//                $method = 'add' . ucfirst($key);
//
//                if(method_exists($this->characteristics, $method)) {
//                    call_user_func_array([
//                    $this->characteristics, $method
//                ], [$characteristic_value]);
//                }
//            }
//        }

        $this->health = $this->maxHealth;
        $this->mana = $this->maxMana;

        $this->maxExp = $this->level * 1000;
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


        // $this->equipment - инициализирован класс / объект equipment
        // Мы обращаемся к функции объекта setWeapon
        // И передаем локальную переменную $weapon с объектом Item

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

    // = - Это знак присвоения переменной
    // == - Не строгая проверка (можно сравнивать между разными типами)
    // === - Строгая проверка (проверять можно только между одинаковыми типами)
    // if - условие ЕСЛИ
    // else - условие ИНАЧЕ

    function setCharacteristicsPlayer()
    {
        // Проверяем строгое условие, что класс игрока равен значению warrior
        if ($this->playerClass === 'warrior') {
            $this->maxHealth = 5000;
            $this->maxMana = 2000;

            // Возращаем (return) инициализированный объект Characteristic
            return new Characteristic(3, 5, 5, 1, 5, 2, 1);
        }

        if ($this->playerClass === 'archer') {
            $this->maxHealth = 3000;
            $this->maxMana = 2500;
            return new Characteristic(2, 1, 3, 2, 3, 3, 1);
        }

        if ($this->playerClass === 'wizard') {
            $this->maxHealth = 2500;
            $this->maxMana = 5000;
            return new Characteristic(1, 1, 2, 5, 2, 2, 1);
        }

        if ($this->playerClass === 'assasin') {
            $this->maxHealth = 2500;
            $this->maxMana = 3000;
            return new Characteristic(2, 1, 5, 2, 5, 5, 1);
        }

        if ($this->playerClass === 'berserk') {
            $this->maxHealth = 6000;
            $this->maxMana = 2000;
            return new Characteristic(5, 1, 2, 1, 5, 5, 1);
        }

        $this->maxHealth = 500;
        $this->maxMana = 500;
        return new Characteristic(1, 1, 1, 1, 1, 1, 1);
    }

    // Если написано просто function без области видимости (public/private/protected)
    // То по умолчанию стоит public, но по правилам хорошего тона, нужно указывать область видимости

    function getPlayerClass()
    {
        return $this->playerClass;
    }

    function getNickname()
    {
        return $this->nickname;
    }

    function getHealth()
    {
        return $this->health;
    }

    function isDead()
    {
        return $this->isDead;
    }

    function regenerateHealth($health)
    {
        // Короткая версия $this->health += $health;
        $this->health = $this->health + $health;

        if ($health > $this->maxHealth) {
            $this->health = $this->maxHealth;
        } else {
            $this->health = $health;
        }
    }

    function regenerateMana($mana)
    {
        $this->mana += $mana;

        if ($mana > $this->maxMana) {
            $this->mana = $this->maxMana;
        } else {
            $this->mana = $mana;
        }
    }

    function kill()
    {
        $this->health = 0;
        $this->isDead = true;
        $this->characteristics = $this->setCharacteristicsPlayer();
        $this->expirience = 0;
        $this->maxExp = 0;
        $this->level = 1;
        $this->mana = 0;

    }

    function damage($damage)
    {
        $this->health = $this->health - $damage;

        if ($this->health < 1) {
            $this->kill();
        }
    }

    function getLevel()
    {
        echo $this->level . "\n";
    }

    function getExpirience()
    {
        echo $this->expirience . "\n";
    }

    function getMaxExpirience()
    {
        echo $this->maxExp . "\n";
    }

    function levelUp()
    {
        // ++ Инкремент (+1), прибавляем 1 и записываем в level
        // -- Декремент  (-1), убавляем 1 и записываем в level

        $this->level++;
        $this->expirience = 0;

        $this->maxHealth += 500;
        $this->maxMana += 500;

        $this->regenerateHealth($this->maxHealth);
        $this->regenerateMana($this->maxMana);

        $this->characteristics->addStrength(2);
        $this->characteristics->addAgility(2);
        $this->characteristics->addArmor(2);
        $this->characteristics->addIntelligence(2);
        $this->characteristics->addStamina(2);
        $this->characteristics->addSpeed(2);
        $this->characteristics->addLuck(2);
    }


    function takeExpirience($expirience)
    {
        $this->expirience = $this->expirience + $expirience;

        if ($this->expirience >= $this->maxExp) {
            $this->levelUp();
        }
    }

    function getMana()
    {
        echo $this->mana . "\n";
    }

    function takeMana($mana)
    {
        $mana = $this->mana + $mana;

        if ($this->mana > $this->maxMana) {
            $this->mana = $this->maxMana;
        } else {
            $this->mana = $mana;
        }
    }

    public function addMaxHealth(int $value)
    {
        var_dump($value * ($this->level * 100));
        $this->maxHealth += $value * ($this->level * 100);
    }
}