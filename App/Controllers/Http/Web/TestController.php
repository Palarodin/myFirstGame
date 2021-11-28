<?php

namespace App\Controllers\Http\Web;

use App\Controllers\Http\Controller;
use App\Modules\Database;
use App\Modules\Player;

class TestController extends Controller {
    public function get() {
//        $database = new Database();
//
////        $data = $database->get();
//
//        var_dump($data);

        $database = new Database();

        $data = $database->find();

        var_dump($data);
    }

    public function find() {
        $database = new Database();

        $data = $database->find();

        var_dump($data);
    }
}