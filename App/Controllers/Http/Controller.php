<?php

namespace App\Controllers\Http;

use Jenssegers\Blade\Blade;

class Controller {
    public $views;

    public function __construct() {
        $this->views = new Blade('Resources/Views', 'Resources/Cache');
    }
}