<?php

namespace App\Items\Pants;

use App\Items\BaseItem;

class BasePants extends BaseItem {
    public function __construct(string $name)
    {
        parent::__construct($name, 'pants');

    }
}