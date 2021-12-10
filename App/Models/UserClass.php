<?php

namespace App\Models;

use PhpOrm\DB;

class UserClass extends DB
{
    protected $table = 'classes';

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