<?php

require_once __DIR__.'/core/Router.php';
require_once __DIR__.'/core/Route.php';
require_once __DIR__.'/core/RouteDefinition.php';
require_once __DIR__.'/core/helpers.php';

// controllers laden (later composer autoload)

$router = new Router();
Route::setRouter($router);

// routes laden
require __DIR__.'/routes/web.php';

return $router;
