<?php

namespace App\Controllers\Http\Web;

use App\Controllers\Http\Controller;
use App\Models\User;
use App\Modules\Battle;
use App\Modules\Enemy;
use App\Modules\Player;

class DungeonController extends Controller
{
    //TODO: Создать переменные куда ты запишешь player и enemy

    public function dungeons() {
        echo $this->views->make('dungeons')->render();
    }

    // TODO: Переименовать в battle
    public function level($request) {
        $player = new Player(User::factory()->find(1));
        $enemy = new Enemy($request['level']);
        $battle = new Battle($player, $enemy);

        echo $this->views->make('dungeon_level', [
            'level' => $request['level'],
            'player' => $player,
            'enemy' => $enemy,
            'battle' => $battle
        ])->render();
    }

    // TODO: Создать функцию где getInformation, где просто подгружаются данные из базы данных
}