<?php

namespace App\Models;

use PhpOrm\DB;

class UserRace extends DB
{
    protected $table = 'races';

    protected $attributes = [
        'name',

        'strength',
        'armor',
        'agility',
        'intelligence',
        'endurance',
        'speed',
        'luck',

        'max_mana',
        'max_health',
        'max_stamina',
    ];

    public static function factory()
    {
        return new self();
    }
}