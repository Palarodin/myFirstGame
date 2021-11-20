<?php

namespace App\Modules;

use App\Controllers\ProfileController;
use ReflectionClass;

class Route {
    protected $routes;

    public function __construct() {
        $this->routes = [
            '/profile' => 'ProfileController@get'
        ];
    }

    public function getRoute(string $route) {
        foreach ($this->routes as $path => $controller) {
            if(array_key_exists($route, $this->routes)) {
                return $this->getController($this->routes[$path]);
            }
        }

        return $this->abort(404);
    }

    protected function getController(string $controller, $args = []) {
//        var_dump(::class);
        $regexp = '/^([A-Za-z]+)@([A-Za-z]+)$/';
        preg_match($regexp, $controller, $matches);


//
    //
    //        $r = new ReflectionClass($matches[1]);
    //        $id = $r->getConstant('class');

//        $test = ProfileController::class;

        var_dump(ProfileController::class);
//        if(method_exists($test, $matches[2])) {
//            call_user_func_array([$test, $matches[2]], $args);
//        }
    }

    public function abort(int $code) {
        return '404';
    }
}