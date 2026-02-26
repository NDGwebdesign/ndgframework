<?php

$router->get('/', [HomeController::class, 'index']);
$router->get('/blog', [HomeController::class, 'blog']);
$router->get('/users', [UserController::class, 'index']);
$router->get('/docs', function () {
    return view('docs');
});
$router->get('/contact', function () {
    return view('contact');
});
