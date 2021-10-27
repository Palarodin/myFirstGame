<?php

namespace App\Modules;

class Inventory {
    public $items = ['Молот Бога', 'Зелье здоровья'];

    function getItems() {
        return $this->items;
    }

    function repair() {

    }
}