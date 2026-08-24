<?php

$router->get('/', [HomeController::class, 'index']);
$router->get('/blog', [HomeController::class, 'blog']);
$router->get('/users', [UserController::class, 'index']);
$router->post('/users', [UserController::class, 'store']);
$router->get('/register', [AuthController::class, 'showRegister']);
$router->post('/register', [AuthController::class, 'register']);
$router->get('/login', [AuthController::class, 'showLogin']);
$router->post('/login', [AuthController::class, 'login']);
$router->post('/logout', [AuthController::class, 'logout']);
$router->get('/docs', function () {
    return view('docs');
});
$router->get('/contact', function () {
    return view('contact');
});
$router->post('/sendmail', [ContactController::class, 'send']);
$router->get('/contact-success', function () {
    return view('contact-success');
});
$router->get('/table-demo', [TableDemoController::class, 'index']);