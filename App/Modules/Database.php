<?php

namespace App\Modules;

use PDO;

class Database
{
    protected $database;

    public function __construct()
    {
        $this->database = new PDO('mysql:host=localhost;dbname=game', 'root', 'root');
    }

    protected function toArray()
    {
    }

    /*
     * TODO
     * Find должен принимать в качестве аргумента число
     * Число обозначает ID игрока
     *
     * Получить игрока из базы данных по IDшнику и вывести его строки
     * Вызвать метод в тестовом контроллере
     */


    public function find($table, $id)
    {
        $data = $this->database->query('SELECT * from '. $table .' WHERE id = ' . $id);
        $array = [];

        foreach ($data as $value) {
            array_push($array, $value);
        }

        return $array[0];
    }

    /* public function get() {
         $data = $this->database->query('SELECT * from users');
         $array = [];

         foreach ($data as $value) {
             array_push($array, $value);
         }

         return $array;
     }*/
}