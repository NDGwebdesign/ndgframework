<?php

$router->get('/', [HomeController::class, 'index']);
$router->get('/blog', [HomeController::class, 'blog']);