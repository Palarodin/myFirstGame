<?php

namespace App\Modules;

use App\Items\Body\BeginnerBodyArmor;
use App\Items\Helmets\BeginnerHelmet;
use App\Skills\BaseSkill;
use PhpOrm\DB;

class Player extends Actor
{
    protected $id;
    protected $db;

    public $skills;

    protected $maxExpirience;

    protected $equipment;
    protected $inventory;
    protected $playerClass;
    protected $race;

    public function __construct(array $data)
    {
        $this->db = new DB();

        $this->id = $data['id'];
        $this->name = $data['name'];

        $this->playerClass = new PlayerClass($data['class_id']);
        $this->race = new PlayerRace($data['race_id']);

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

        $this->maxHealth = (500 * $data['level']) + $this->playerClass->getMaxHealth() + $this->race->getMaxHealth() + $equipCharacteristics['maxHealth'];
        $this->maxMana = (500 * $data['level']) + $this->playerClass->getMaxMana() + $this->race->getMaxMana();
        $this->maxStamina = (500 * $data['level']) + $this->playerClass->getMaxStamina() + $this->race->getMaxStamina();

        $this->expirience = $data['expirience'];
        $this->maxExpirience = $data['max_expirience'];

        $this->isDead = $data['isDead'];
        $this->level = $data['level'];

        $this->regenerateHealth(10000);
        $this->regenerateStamina(10000);
        $this->regenerateMana(10000);
    }

    public function regenerateHealth(int $health)
    {
        parent::regenerateHealth($health);

        $this->db->table('users')->where('id', $this->id)->update(['health' => $this->health]);
    }

    public function regenerateMana(int $mana)
    {
        parent::regenerateMana($mana);

        $this->db->table('users')->where('id', $this->id)->update(['mana' => $this->mana]);
    }

    public function regenerateStamina(int $stamina)
    {
        parent::regenerateStamina($stamina);
        $this->db->table('users')->where('id', $this->id)->update(['stamina' => $this->stamina]);
    }

    public function addExpirience($expirience)
    {
        parent::addExpirience($expirience);

        $this->db->table('users')->where('id', $this->id)->update(['expirience' => (string)$this->expirience]);
    }

    public function levelUp()
    {
        parent::levelUp();

        $user = $this->db
            ->table('users')
            ->where('id', $this->id);

        $this->db->begin();

        $user->update(['level' => $this->level]);
        $user->update(['max_expirience' => $this->maxExpirience]);

        $this->db->commit();
    }

    public function kill()
    {
        parent::kill();

        $this->expirience = 0;
        $this->maxExpirience = 0;
        $this->level = 1;

        $this->db->table('users')->where('id', $this->id)->update(['isDead' => 1]);
    }

    public function useSkill()
    {
        if ($this->skills->getManaCost() > $this->getMana()) {
            echo "Не хватает маны";
            return null;
        }

        $this->skills->setDamage($this->intelligence * $this->skills->getDamage());
        $this->spendMana($this->skills->getManaCost());

        return $this->skills->getDamage();
    }
}
