<?php
namespace App\Skills;

class Fireball extends BaseSkill {

    public function __construct()
    {
        $this->setName ('Огненный шар');
        $this->setType('Урон огнем');
    }
}



