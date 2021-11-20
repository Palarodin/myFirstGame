<?php

namespace App\Controllers\Http\Web;

use App\Controllers\Http\Controller;

class MainController extends Controller {
    public function get() {
        echo $this->views->make('index', ['name' => 'John Doe'])->render();
    }
}