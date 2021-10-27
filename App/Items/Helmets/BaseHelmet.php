<?php

namespace App\Items\Helmets;

use App\Items\BaseItem;

class BaseHelmet extends BaseItem {
    public function __construct(string $name)
    {
        parent::__construct($name, 'helmet');
    }
}