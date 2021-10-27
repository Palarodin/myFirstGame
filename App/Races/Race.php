<?php

namespace App\Races;

use App\Traits\Characteristic;

class Race {
    use Characteristic;

    protected $name;

    public function getName() {
        return $this->name;
    }

    public function setName(string $name) {
        $this->name = $name;
    }
}