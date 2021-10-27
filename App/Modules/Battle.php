<?php

namespace App\Modules;

class Battle
{
    protected $player1;
    protected $player2;

    public function rollDice(int $min, int $max)
    {
        return random_int($min, $max);
    }

    public function checkInitiative()
    {
        $result = [
            $this->rollDice(1, 20),
            $this->rollDice(1, 20)
        ];

        $maxResult = max($result);

        // Если выпадут одинаковые значения кубиков, мы делаем переброс
        if ($result[0] === $result[1]) {
            $this->checkInitiative();
        }

        if ($result[0] === $maxResult) {
            $this->turn($this->player1, $this->player2);
        } else {
            $this->turn($this->player2, $this->player1);
        }
    }

    public function turn(Actor $player1, Actor $player2)
    {
        $result = [
            $this->rollDice(1, 20),
            $this->rollDice(1, 20)
        ];

        if ($player1->isDead() === true) {
            echo $player1->getName() . " помер";
        }

        if ($player2->isDead() === true) {
            echo $player2->getName() . " помер";
        }

        if($player1->isDead() === true || $player2->isDead() === true) {
            return;
        }

        if ($result[0] >= 5) {
            $player1Damage = $player1->getStrength() * $this->rollDice(1, 8);

            $player2->damage($player1Damage);

            echo $player1->getName() . ' наносит урон ' . $player1Damage . ' игроку ' . $player2->getName() . "<br>";
        }

        if ($result[0] >= 5) {
            $player2Damage = $player2->getStrength() * $this->rollDice(1, 8);
            $player1->damage($player2Damage);

            echo $player2->getName() . ' наносит урон ' . $player2Damage . ' игроку ' . $player1->getName() . "<br>";
        }

        $this->turn($this->player1, $this->player2);
    }

    public function __construct(Actor $player1, Actor $player2)
    {
        $this->player1 = $player1;
        $this->player2 = $player2;

        $this->checkInitiative();
    }
}