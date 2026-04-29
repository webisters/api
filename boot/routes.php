<?php
/*
 * This file is part of API Project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
use Framework\Routing\RouteCollection;

App::router()->serve(
    null,
    static function (RouteCollection $routes): void {
        $routes->namespace('Api\\Controllers', [
            $routes->get('/', 'Home::index', 'api.home.index'),
            $routes->get('/about', 'Home::about', 'api.home.about'),
        ]);
        $routes->notFound(static fn () => respond_not_found());
    }
);