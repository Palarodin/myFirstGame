<?php

namespace App\Controllers\Http\Web;

use App\Controllers\Http\Controller;
use App\Modules\Player;

class ProfileController extends Controller {
    public function get() {
        $player = new Player('Ikarus', 'Human', 'Warrior');

        $player->useSkill();
        var_dump($player->skills->getDamage());


        echo $this->views->make('profile.characteristics', [
            'player' => $player
        ])->render();
    }

    public function inventory() {
        echo $this->views->make('profile/inventory')->render();
    }
}