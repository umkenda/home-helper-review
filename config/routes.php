<?php

/**
 * Routes configuration.
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 */

use Cake\Routing\Route\DashedRoute;
use Cake\Routing\RouteBuilder;

return function (RouteBuilder $routes): void {
    $routes->setRouteClass(DashedRoute::class);

    $routes->scope('/', function (RouteBuilder $builder): void {
        // Home page
        $builder->connect('/', ['controller' => 'Pages', 'action' => 'display', 'home']);

        // Pages controller
        $builder->connect('/pages/*', 'Pages::display');

        // UsersController login/logout
        //$builder->connect('/users/login', ['controller' => 'Users', 'action' => 'login']);
        $builder->connect('/users/login', ['controller' => 'Users', 'action' => 'login'], ['_name' => 'login']);
        $builder->connect('/users/logout', ['controller' => 'Users', 'action' => 'logout']);

        // Fallbacks
        $builder->fallbacks(DashedRoute::class);
    });
};
