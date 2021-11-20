<?php

namespace App\Controllers\Http\Web;

use App\Controllers\Http\Controller;
use App\EnemyClasses\Ghost;
use App\Modules\Battle;
use App\Modules\Enemy;
use App\Modules\Player;

class DungeonController extends Controller
{
    public function dungeons() {
        echo $this->views->make('dungeons')->render();
    }

    public function level($request) {
        $player = new Player('Ikarus', 'Human', 'Warrior');
        $enemy = new Ghost($request['level']);

        $battle = new Battle($player, $enemy);

        echo $this->views->make('dungeon_level', [
            'level' => $request['level'],
            'player' => $player,
            'enemy' => $enemy,
            'battle' => $battle
        ])->render();

        echo '<pre>';
        //var_dump($test);
        echo '</pre>';
    }
}