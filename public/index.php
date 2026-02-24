<?php

require __DIR__.'/../core/Autoloader.php';
require __DIR__.'/../core/helpers.php';

Autoloader::register();

$router = new Router();

require __DIR__.'/../routes/web.php';

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_SERVER['REQUEST_METHOD'];

$router->dispatch($uri, $method);