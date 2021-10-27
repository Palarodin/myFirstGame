<?php

namespace App\Items\Body;

use App\Items\BaseItem;
class BaseBodyArmor extends BaseItem {
    public function __construct(string $name)
    {
        parent::__construct($name, 'body');
    }
}