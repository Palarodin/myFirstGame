<?php

class Item
{
    // Эта переменная создана / объявлена статическим образом
    protected $name;
    protected $endurance;
    protected $minLevel = 1;
    protected $type;
    protected $characteristics;

    // Функция для вывода защищенной переменной $characteristics

    public function __construct(string $name, string $type, array $characteristics)
    {
        $this->setEndurance(100);
        $this->name = $name;
        $this->type = $type;

        $this->characteristics = $characteristics;

        // $characteristics - это аргумент, как массив

        // $key - ключи массива
        // $value = значение массиво

//        foreach($characteristics as $key => $value) {
//            // Так как у класса нет stamina, agilty и так далее
//            // Эти переменые класса будут созданы динамически
//
//            // Если мы укажем значение в фигурных скобках, то мы скажем:
//            // Переменной класса Item в качестве названия переменной возьмем из ключа $key
//            // Если напишем без {}, то это обозначен ссылку на указанную переменную в нашем случае это $key
//            $this->{$key} = $value;
//        }
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