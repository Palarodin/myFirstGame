<?php

namespace App\Items;

use App\Traits\Characteristic;

class BaseItem
{
    use Characteristic;

    protected $name;
    protected $type;
    protected $maxHealth;

    public function __construct(string $name, string $type)
    {
        $this->name = $name;
        $this->type = $type;
    }

    public function getType()
    {
        return $this->type;
    }

    public function getName()
    {
        return $this->name;
    }
}
