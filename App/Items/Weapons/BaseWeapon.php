<?php

namespace App\Items\Weapon;

use App\Items\BaseItem;

class BaseWeapon extends BaseItem {
    public function __construct(string $name)
    {
        parent::__construct($name, 'weapon');

    }
}