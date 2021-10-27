<?php

namespace App\Items\Accessory;

use App\Items\BaseItem;

class BaseAccessory extends BaseItem {
    public function __construct(string $name)
    {
        parent::__construct($name, 'accessory');
    }
}