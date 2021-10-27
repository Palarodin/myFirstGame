<?php

namespace App\Items\Boots;

use App\Items\BaseItem;

class BaseBoots extends BaseItem {
    public function __construct(string $name)
    {
        parent::__construct($name, 'boots');

    }
}