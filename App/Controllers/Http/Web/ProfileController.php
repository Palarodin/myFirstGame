<?php

namespace App\Controllers\Http\Web;

use App\Controllers\Http\Controller;
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
        $database = new Database();

        $player = new Player($database->find('users', $request['id']));
        $class = $database->find('classes', $player->getClassId());
        var_dump($class);
//        $class = new PlayerClass();

        echo $this->views->make('profile.characteristics', [
            'player' => $player
        ])->render();

    }
}