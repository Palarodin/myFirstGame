<?php

namespace App\Controllers\Http\Web;

use App\Controllers\Http\Controller;
use App\Models\User;
use App\Modules\Database;
use App\Modules\Player;
use App\Modules\PlayerClass;

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

    public function show($request) {

        $user = new Player(User::factory()->find(1));

        echo $this->views->make('profile.characteristics', [
            'player' => $user
        ])->render();

    }
}