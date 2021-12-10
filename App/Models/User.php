<?php

namespace App\Models;

use PhpOrm\DB;

class User extends DB
{
    protected $table = 'users';

    protected $attributes = [
        'name',

        'level',
        'isDead',
        'expirience',

        'mana',
        'health',

        'raceId',
        'classId',

        'max_mana',
        'max_health',
        'max_stamina',
        'max_expirience',

    ];

    public static function factory()
    {
        return new self();
    }
}