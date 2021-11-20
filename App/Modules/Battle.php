<?php

namespace App\Modules;

class Battle
{
    protected $player1;
    protected $player2;
    protected $log;

    public function __construct(Actor $player1, Actor $player2)
    {
        $this->player1 = $player1;
        $this->player2 = $player2;

        $this->start();
    }

    //Функция броска кубика с аргументами мин и макс числа
    public function rollDice(int $min, int $max)
    {
        return random_int($min, $max);
    }

    public function start()
    {
        $result = $this->checkInitiative();

        // TODO: Переделать хранение порядка игрока, в общей переменной класса

        if ($result[0] > $result[1]) {
            $this->turn($this->player1, $this->player2);
        } else {
            $this->turn($this->player2, $this->player1);
        }
    }

    //Функция проверки первого хода
    public function checkInitiative()
    {
        $result = [
            $this->rollDice(1, 20),
            $this->rollDice(1, 20)
        ];

        if ($result[0] === $result[1]) {
            $this->checkInitiative();
        }

        return $result;
    }

    public function criticalDamage(Actor $player1, Actor $player2)
    {
        $player1Damage = $player1->getStrength() * $this->rollDice(1, 8) * 4;
        $player2->damage($player1Damage);

        $this->log .= $player1->getName() . ' наносит критический урон ' . $player1Damage . ' игроку ' . $player2->getName() . "<br>";
    }

    public function damage(Actor $player1, Actor $player2)
    {
        $player1Damage = $player1->getStrength() * $this->rollDice(1, 8);
        $player2->damage($player1Damage);

        $this->log .= $player1->getName() . ' наносит урон ' . $player1Damage . ' игроку ' . $player2->getName() . "<br>";
    }

    public function miss(Actor $player1, Actor $player2)
    {
        $player2->damage(0);
        $this->log .= $player1->getName() . ' промахнулся ' . "<br>";
    }

    public function calculateDamage(Actor $player1, Actor $player2)
    {
        $result = $this->rollDice(1, 20);

        if ($result >= 17) {
            $this->criticalDamage($player1, $player2);
        } elseif ($result >= 5) {
            $this->damage($player1, $player2);
        } else {
            $this->miss($player1, $player2);
        }


        // TODO: Выяснит ьпочему в функции помимо булев значения возвращает еще NULL

    }

    public function turn(Actor $player1, Actor $player2)
    {
        $this->calculateDamage($player1, $player2);
        $this->calculateDamage($player2, $player1);

        var_dump($player1->isDead());
        var_dump($player2->isDead());

        if ($player1->isDead() === true || $player2->isDead() === true) {
            $this->log .= $player2->getName() . " погиб на поле брани";
        }

//        var_dump($player1->isDead());
//        var_dump($player2->isDead()); // Вместо TRUE выпадает NULL

//        if($player1->isDead() === false && $player2->isDead() === false) {
//            $this->turn($this->player1, $this->player2);
//        }
    }

    public function log()
    {
        return $this->log;
    }
}