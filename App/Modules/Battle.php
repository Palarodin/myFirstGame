<?php

namespace App\Modules;

class Battle
{
    protected $player;
    protected $enemy;

    protected $isCritical = false;
    protected $damage = 0;

    protected $hasTurnPlayer;

    protected $log;

    public function __construct(Actor $player, Actor $enemy)
    {
        $this->player = $player;
        $this->enemy = $enemy;

        $result = $this->checkInitiative();
        $this->hasTurnPlayer = $result[0] > $result[1];

        $this->turn();
    }

    public function rollDice(int $min, int $max): int
    {
        return random_int($min, $max);
    }

    /**
     * Возвращает массив с результатами кубиков, кто первый ходит
     * @return int[]
     */

    public function checkInitiative(): array
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

    /**
     * Возвращает критический урон
     * @param string $var - передаем с какой переменной берем силу
     * @return int
     */

    public function criticalDamage(string $var): int
    {
        $this->isCritical = true;
        return $this->{$var}->getStrength() * $this->rollDice(1, 8) * 4;
    }

    /**
     * Возращает обычный урон
     * @param string $var - передаем с какой переменной берем силу
     * @return int
     */
    public function damage(string $var): int
    {
        $this->isCritical = false;
        return $this->{$var}->getStrength() * $this->rollDice(1, 8);
    }

    /**
     * Считает сколько дамага нанесет один участник другому
     * И записывает в лог
     * @param string $type
     */

    public function calculateDamage(string $type)
    {
        $result = $this->rollDice(1, 20);

        $this->damage = 0;

        if ($result >= 17) {
            $this->damage = $this->criticalDamage($type);
        } elseif ($result >= 5) {
            $this->damage = $this->damage($type);
        }

        if ($type === 'player') {
            $this->enemy->damage($this->damage);
            $this->writeLog($type, 'enemy');
        } else {
            $this->player->damage($this->damage);
            $this->writeLog($type, 'player');
        }
    }

    /**
     * В зависимости от проверки совершается ход
     */

    public function turn()
    {
        if ($this->hasTurnPlayer === true) {
            $this->calculateDamage('player');
            $this->calculateDamage('enemy');
        } else {
            $this->calculateDamage('enemy');
            $this->calculateDamage('player');
        }

        $this->checkDead();
    }

    /**
     * Проверяем смерть одного из участников, если кто-то умер, останавливаем бой
     * @return bool|void
     */
    public function checkDead() {
        if($this->player->getHealth() <= 0) {
            $this->player->kill();
            $this->log .= $this->player->getName() . ' погиб на поле боя';
            return true;
        }

        if($this->enemy->getHealth() <= 0) {
            $this->player->addExpirience($this->enemy->getExpirience());
            $this->log .= 'Вы победили ' . $this->enemy->getName() . ' и получили ' . $this->enemy->getExpirience() . ' опыта';
            return true;
        }

        $this->turn();
    }

    /**
     * Записываем в лог тип дамага и кто кому сколько нанес
     * @param string $given
     * @param string $taken
     */

    public function writeLog(string $given, string $taken): void
    {
        if ($this->isCritical === true) {
            $this->log .= $this->{$given}->getName() . ' наносит критический урон ' . $this->damage . ' игроку ' . $this->{$taken}->getName() . "<br>";
        } elseif ($this->isCritical === false && $this->damage > 0) {
            $this->log .= $this->{$given}->getName() . ' наносит урон ' . $this->damage . ' игроку ' . $this->{$taken}->getName() . "<br>";
        } else {
            $this->log .= $this->{$given}->getName() . ' промахнулся' . "<br>";
        }
    }

    /**
     * Получаем лог
     * @return string
     */

    public function getLog(): string
    {
        return $this->log;
    }
}