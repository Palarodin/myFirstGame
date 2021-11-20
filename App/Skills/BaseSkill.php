<?php
namespace App\Skills;

class BaseSkill {

    protected $name;
    protected $type;
    protected $manaCost;
    protected $damage;

    public function getName() {
        return $this->name;
    }

    public function setName(string $name) {
        $this->name = $name;
    }

    public function getType() {
        return $this->type;
    }

    public function setType(string $type) {
        $this->type = $type;
    }

    public function getManaCost()
    {
        return $this->manaCost;
    }

    public function setManaCost(int $manaCost)
    {
        $this->manaCost = $manaCost;
    }

    public function getDamage()
    {
        return $this->damage;
    }

    public function setDamage(int $damage)
    {
        $this->damage = $damage;
    }
}
