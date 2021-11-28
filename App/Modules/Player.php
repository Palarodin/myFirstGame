<?php

namespace App\Modules;

use App\Items\Body\BeginnerBodyArmor;
use App\Items\Helmets\BeginnerHelmet;
use App\Races\Human;
use App\Skills\BaseSkill;
use App\Skills\Fireball;

class Player extends Actor {
    public $skills;

    protected $classId;
    protected $raceId;

    public function __construct(array $data) {

//        echo '<pre>';
//        var_dump($data);
//        echo '</pre>';

        $this->name = $data['name'];

        $this->class_id = $data['class_id'];

        $this->playerClass = new PlayerClass();
        $this->race_id = $data['race_id'];

        $this->race = new Human();

        $this->equipment = new Equipment();
        $this->inventory = new Inventory();

        $this->equipment->setHelmet(new BeginnerHelmet());
        $this->equipment->setArmor(new BeginnerBodyArmor());

        $this->skills = new BaseSkill();

        $this->skills->setName('Атака');
        $this->skills->setType('fireball');
        $this->skills->setManaCost(2000);
        $this->skills->setDamage(100);

        $equipCharacteristics = $this->equipment->getSumCharacheristics();

        $this->addStrength(
            $this->playerClass->getStrength() + $this->race->getStrength() + $equipCharacteristics['strength']
        );

        $this->addArmor(
            $this->playerClass->getArmor() + $this->race->getArmor() + $equipCharacteristics['armor']
        );

        $this->addAgility(
            $this->playerClass->getAgility() + $this->race->getAgility() + $equipCharacteristics['agility']
        );

        $this->addIntelligence(
            $this->playerClass->getIntelligence() + $this->race->getIntelligence() + $equipCharacteristics['intelligence']
        );

        $this->addEndurance(
            $this->playerClass->getEndurance() + $this->race->getEndurance() + $equipCharacteristics['endurance']
        );

        $this->addSpeed(
            $this->playerClass->getSpeed() + $this->race->getSpeed() + $equipCharacteristics['speed']
        );

        $this->addLuck(
            $this->playerClass->getLuck() + $this->race->getLuck() + $equipCharacteristics['luck']
        );

        $this->maxHealth = 500 + $this->playerClass->getMaxHealth() + $equipCharacteristics['maxHealth'];
        $this->maxMana = 500 + $this->playerClass->getMaxMana();
        $this->maxStamina = 500 + $this->playerClass->getMaxStamina();

        $this->expirience = $data['expirience'];
        $this->maxExpirience = $data['max_expirience'];

        $this->isDead = $data['isDead'];
        $this->level = $data['level'];

        $this->regenerateHealth(10000);
        $this->regenerateStamina(10000);
        $this->regenerateMana(10000);
    }

    public function getClassId() {
        return $this->classId;
    }

    public function getRaceId() {
        return $this->raceId;
    }

    public function useSkill() {
        if($this->skills->getManaCost() > $this->getMana()) {
            echo "Не хватает маны";
            return null;
        }

        $this->skills->setDamage($this->intelligence * $this->skills->getDamage());
        $this->spendMana($this->skills->getManaCost());

        return $this->skills->getDamage();
    }
}
