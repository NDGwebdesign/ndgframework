<?php

$router = require __DIR__.'/../app.php';

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$router->dispatch($uri, $_SERVER['REQUEST_METHOD']);
