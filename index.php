<?php

use App\Controllers\Http\Web\DungeonController;
use App\Controllers\Http\Web\MainController;
use App\Controllers\Http\Web\ProfileController;
use Jenssegers\Blade\Blade;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

require './bootstrap.php';

$routes = new RouteCollection();

$routes->add('index', new Route('/', [
    'controller' => [MainController::class, 'get'],
    'method' => ['GET', 'HEAD'],
]));

$routes->add('profile', new Route('/profile', [
    'controller' => [ProfileController::class, 'get'],
    'method' => ['GET', 'HEAD']
]));

$routes->add('profile.inventory', new Route('/profile/inventory', [
    'controller' => [ProfileController::class, 'inventory'],
    'method' => ['GET', 'HEAD']
]));

$routes->add('dungeons', new Route ('/dungeons', [
    'controller' => [DungeonController::class, 'dungeons']
]));

$routes->add('dungeons.level', new Route('/dungeons/{level}', [
    'controller' => [DungeonController::class, 'level']
]));

$matcher = new UrlMatcher($routes, new RequestContext());

try {
    $parameters = $matcher->match($_SERVER['REQUEST_URI']);
    echo '<pre>';
//    var_dump($parameters);
    echo '</pre>';

    if (method_exists($parameters['controller'][0], $parameters['controller'][1])) {
        $controller = new $parameters['controller'][0];

        $request = $parameters;
        unset($request['controller']);
        unset($request['_route']);

        call_user_func_array(array($controller, $parameters['controller'][1]), [
            $request
        ]);
    } else {
        throw new Exception('Method not exists');
    }
} catch (Exception $e) {
    echo $e;
}